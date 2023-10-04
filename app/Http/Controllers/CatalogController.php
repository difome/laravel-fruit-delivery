<?php

namespace App\Http\Controllers;

use App\Helpers\ProductFilter;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $roots = Category::where('parent_id', 0)->get();
        return view('catalog.index', compact('roots'));
    }

    public function category(Category $category, ProductFilter $filters)
    {
        $products = Product::categoryProducts($category->id)
            ->filterProducts($filters)
            ->paginate(6)
            ->withQueryString();
        return view('catalog.category', compact('category', 'products'));
    }

    public function brand(Brand $brand, ProductFilter $filters)
    {
        $products = $brand
            ->products() // возвращает построитель запроса
            ->filterProducts($filters)
            ->paginate(6)
            ->withQueryString();
        return view('catalog.brand', compact('brand', 'products'));
    }

    public function product(Product $product)
    {
        $products = Product::categoryProducts($product->category->id)
            ->paginate(6)
            ->withQueryString();


        $existingProductIds = [$product->id];


        $relatedProducts = Product::categoryProducts($product->category->id)
            ->whereNotIn('id', $existingProductIds)
            ->take(6)
            ->get();

        return view('catalog.product', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $search = $request->input('query');
        $query = Product::search($search);
        $products = $query->paginate(6)->withQueryString();
        return view('catalog.search', compact('products', 'search'));
    }
}
