<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with(['galleries', 'user'])->paginate(20);

        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
            'category_name' => '',
        ]);
    }

    public function detail($slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::with(['galleries'])->where('categories_id', $category->id)->paginate(20);

        return view('pages.category', [
            'category_name' => ' in ' . $category->name,
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
