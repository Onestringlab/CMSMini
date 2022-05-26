<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;
use App\Models\Categories;

class ContentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contentdata = Contents::all();
        return view('contents/contentdata', ['contentdata' => $contentdata]);
    }

    public function create()
    {
        $categoriesdata = Categories::all();
        return view('contents/contentcreate', ['categoriesdata' => $categoriesdata]);
    }

    public function store(Request $request)
    {
        $content = new Contents;
        $content->title = $request->title;
        $content->cat_id = $request->category;
        $content->content = $request->content;
        $content->picture = $request->picture;
        $content->save();
        return redirect('/contents');
    }

    public function show($id)
    {
        $content = Contents::find($id);
        return view('contents/contentshow', ['content' => $content]);
    }

    public function edit($id)
    {
        $content = Contents::find($id);
        return view('contents/contentdelete', ['content' => $content]);
    }

    public function update(Request $request, $id)
    {
        $content = Contents::find($id);
        $content->title = $request->title;
        $content->cat_id = $request->category;
        $content->content = $request->content;
        $content->picture = $request->picture;
        $content->save();
        return redirect('/contents');
    }

    public function destroy($id)
    {
        $content = Contents::find($id);
        $content->delete();
        return redirect('/contents');
    }
}
