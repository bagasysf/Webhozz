<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // index, create, store, edit, edit, update, show, destroy

    public function index()
    {
        $title = 'Category Page';
        return view('category.index', ['title' => $title]);
    }

    public function create()
    {
        $title = 'Create Category';
        return view('category.create', ['title' => $title]);
    }
}
