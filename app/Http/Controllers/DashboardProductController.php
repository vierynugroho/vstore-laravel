<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use App\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(['galleries', 'category'])->where('users_id', Auth::user()->id)->get();

        return view('pages.dashboard-products', [
            'products' => $products,
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $product = Product::create($data);
        $gallery = [
            'products_id' => $product->id,
            'photo' => $request->file('photo')->store('assets/products', 'public'),

        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }

    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);

        $categories = Category::all();

        return view('pages.dashboard-products-details', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function uploadGallery(Request $request)
    {

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $data['photo'] = $request->file('photo')->store('assets/products', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        if ($item->photo) {
            Storage::disk('public')->delete($item->photo);
        }

        $item->delete();

        return redirect()->route('dashboard-product-details', $item->products_id);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($data['name']);

        $item->update($data);

        return redirect()->route('dashboard-product');
    }
}
