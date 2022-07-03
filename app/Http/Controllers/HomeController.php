<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;

class HomeController extends Controller
{

    public function index()
    {
        $contents = Contents::all();

        return view('home.welcome', ["contents" => $contents]);
    }

    public function read($id)
    {
        $content = Contents::find($id);

        return view('home.read', ["content" => $content]);
    }

    public function category($id)
    {
        $contents = Contents::where("cat_id", $id)->get();

        return view('home.category', ["contents" => $contents]);
    }
}
