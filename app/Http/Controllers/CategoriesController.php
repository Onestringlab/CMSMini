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
        $category = new Categories;
        $category->category = $request->category;
        $category->save();
        return redirect('/categories');
    }

    public function show($id)
    {
        $category = Categories::find($id);
        return view("categories/categoryshow", ["category" => $category]);
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view("categories/categorydelete", ["category" => $category]);
    }

    public function update(Request $request, $id)
    {
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
