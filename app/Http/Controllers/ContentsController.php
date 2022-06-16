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

        if ($request->file('picture') != null) {
            $file = $request->file('picture');

            $extfile = $file->getClientOriginalExtension();

            $newname = time() . '.' . $extfile;

            $destinationPath = "uploads";

            $file->move($destinationPath, $newname);
        }

        $content->picture = $newname;
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
        return view('contents/contentedit', ['content' => $content]);
    }

    public function update(Request $request, $id)
    {
        $content = Contents::find($id);
        $content->title = $request->title;
        $content->cat_id = $request->category;
        $content->content = $request->content;

        if ($request->file('picture') != null) {
            $file = $request->file('picture');

            $extfile = $file->getClientOriginalExtension();

            $newname = time() . '.' . $extfile;

            $destinationPath = "uploads";

            $file->move($destinationPath, $newname);

            $pic_old = $destinationPath . '/' . $request->pic_old;
            if (file_exists(public_path($pic_old))) {
                unlink(public_path($pic_old));
            }
        } else {
            $newname =  $request->pic_old;
        }

        $content->picture = $newname;

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
