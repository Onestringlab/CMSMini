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
        $categories = Categories::all();
        return view('contents/contentcreate', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'category' => 'required',
                'title' => 'required|min:10',
                'content' => 'required|min:100',
                'picture' => 'required'
            ],
            [
                'title.required' => 'Title harus di isi',
                'title.min' => 'Jumlah karakater minimal 10',
                'content.required' => 'Content harus di isi',
                'picture.required' => 'Picture harus di isi'
            ]
        );


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
        $categories = Categories::all();
        return view('contents/contentedit', ['content' => $content, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'category' => 'required',
                'title' => 'required|min:10',
                'content' => 'required|min:100'
            ],
            [
                'title.required' => 'Title harus di isi',
                'title.min' => 'Jumlah karakater minimal 10',
                'content.required' => 'Content harus di isi'
            ]
        );

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
        $destinationPath = "uploads";
        $picture = $destinationPath . '/' . $content->picture;
        if (file_exists(public_path($picture))) {
            unlink(public_path($picture));
        }
        $content->delete();
        return redirect('/contents');
    }
}
