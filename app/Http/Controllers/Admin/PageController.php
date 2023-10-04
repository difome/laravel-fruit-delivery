<?php

namespace App\Http\Controllers\Admin;

use App\Events\CreatePageEvent;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }


    public function create()
    {
        $parents = Page::where('parent_id', 0)->get();
        return view('admin.page.create', compact('parents'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'parent_id' => 'required|regex:~^[0-9]+$~',
            'slug' => 'required|max:100|unique:pages|regex:~^[-_a-z0-9]+$~i',
            'content' => 'required',
        ]);
        $page = Page::create($request->all());
        return redirect()
            ->route('admin.page.show', ['page' => $page->id])
            ->with('success', 'Новая страница успешно создана');
    }


    public function show(Page $page)
    {
        return view('admin.page.show', compact('page'));
    }


    public function edit(Page $page)
    {
        $parents = Page::where('parent_id', 0)->get();
        return view('admin.page.edit', compact('page', 'parents'));
    }


    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'parent_id' => 'required|regex:~^[0-9]+$~|not_in:' . $page->id,
            'slug' => 'required|max:100|unique:pages,slug,' . $page->id . ',id|regex:~^[-_a-z0-9]+$~i',
            'content' => 'required',
        ]);
        $page->update($request->all());
        return redirect()
            ->route('admin.page.show', ['page' => $page->id])
            ->with('success', 'Страница была успешно отредактирована');
    }


    private function saveImages($content)
    {
        $dom = new \DomDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $html = '<!DOCTYPE html><html><head><meta charset="UTF-8"/></head>';
        $html = $html . '<body>' . $content . '</body></html>';
        $dom->loadHtml($html);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $data = $img->getAttribute('src');
            if (strpos($data, 'data') === false) {
                continue;
            }
            list($type, $data) = explode(';', $data);
            list(, $ext) = explode('/', $type);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $name = md5(uniqid(rand(), true)) . '.' . $ext;
            Storage::disk('public')->put('page/' . $name, $data);
            $url = Storage::disk('public')->url('page/' . $name);
            $img->removeAttribute('data-filename');
            $img->removeAttribute('src');
            $img->setAttribute('src', $url);
        }
        $content = html_entity_decode($dom->saveXML($dom->documentElement));
        $content = str_replace(
            [
                '<html><head><meta charset="UTF-8"/></head><body>',
                '</body></html>',
            ],
            '',
            $content
        );
        $content = trim($content);
        return $content;
    }


    public function uploadImage(Request $request)
    {
        $this->validate($request, ['image' => [
            'mimes:jpeg,png',
            'max:5000'
        ]]);
        $path = $request->file('image')->store('page', 'public');
        $url = Storage::disk('public')->url($path);
        return response()->json(['image' => $url]);
    }


    public function removeImage(Request $request)
    {
        $path = parse_url($request->image, PHP_URL_PATH);
        $path = str_replace('/storage/', '', $path);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return 'Изображение было удалено';
        }
        return 'Не удалось удалить изображение';
    }


    private function removeImages($content)
    {
        $dom = new \DomDocument();
        $dom->loadHtml($content);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            $pattern = '~/storage/page/([0-9a-z]+\.(jpeg|png|gif))~i';
            if (preg_match($pattern, $src, $match)) {
                $name = $match[1];
                if (Storage::disk('public')->exists('page/' . $name)) {
                    Storage::disk('public')->delete('page/' . $name);
                }
            }
        }
    }


    public function destroy(Page $page)
    {
        if ($page->children->count()) {
            return back()->withErrors('Нельзя удалить страницу, у которой есть дочерние');
        }
        $this->removeImages($page->content);
        $page->delete();
        return redirect()
            ->route('admin.page.index')
            ->with('success', 'Страница сайта успешно удалена');
    }
}
