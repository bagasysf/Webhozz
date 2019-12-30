<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // index, create, store, edit, edit, update, show, destroy

    public function index()
    {
        $title = 'Category Page';
        $rows = Category::all();
        return view('category.index', [
            'title' => $title,
            'categories' => $rows

        ]);
    }

    public function create()
    {
        $title = 'Create Category';
        return view('category.create', [
            'title' => $title,
        ]);
    }

    public function store()
    {
        // dapetin request dari form
        // dd(request()->all());

        // insert ke database
        Category::create([
            'name' => request('name'),
            'description' => request('description')
        ]);


        return redirect('/category');
    }
}
