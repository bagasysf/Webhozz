<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

// use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Product Page';
        $products = Product::all();
        return view('product.index', [
            'title' => $title,
            'products' => $products
        ]);
    }

    public function create()
    {
        $title = 'Create Product';
        $categories = Category::all();
        return view('product.create', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    public function store()
    {
        #upload file

        $image = request('image');
        $filename = $image->getClientOriginalName(); //nama image yang akan disimpan
        $filenameRandom = \Str::random(20) . '.' . $image->getClientOriginalExtension(); //extension gambar asli
        $image->move(public_path('images/'), $filenameRandom);

        Product::create([
            'category_id' => request('category_id'),
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'image' => $filenameRandom
        ]);

        return redirect('/product');
    }

    public function edit($id)
    {
        $title = 'Create Product';
        $products = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('product.edit', [
            'title' => $title,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $product = Product::where('id', $id)->first();
        $product->update([
            'category_id' => request('category_id'),
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description')
        ]);

        return redirect('/product');
    }

    public function destroy($id)
    {
        $products = Product::where('id', $id)->first();
        $imagePath = public_path() . '/images/' . $products->image;
        unlink($imagePath);
        $products->delete();


        return redirect('/product');
    }
}
