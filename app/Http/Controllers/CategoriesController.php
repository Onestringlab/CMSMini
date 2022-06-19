<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorydata = Categories::all();
        return view('categories/categorydata', ['categorydata' => $categorydata]);
    }

    public function create()
    {
        return view('categories/categorycreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|min:5'
        ]);

        $category = new Categories;
        $category->category = $request->category;
        $category->save();
        return redirect('/categories');
    }

    public function show($id)
    {
        $category = Categories::find($id);
        return view("categories/categoryshows", ["category" => $category]);
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view("categories/categoryedit", ["category" => $category]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required|min:5'
        ]);

        $category = Categories::find($id);
        $category->category = $request->category;
        $category->save();
        return redirect('/categories');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect('/categories');
    }
}
