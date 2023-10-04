<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function __invoke(Request $request) {
        $roots = Category::where('parent_id', 0)->get();
        return view('index', compact('roots'));
    }
}
