<?php

namespace App\Http\Controllers;

use App\Model\Product;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        return view('welcome', [
            'products' => $products
        ]);
    }
}
