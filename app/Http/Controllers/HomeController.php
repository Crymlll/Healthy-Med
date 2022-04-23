<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $data = Article::latest()->simplepaginate(5);
        $title="Home";
        $id_latest = Article::latest()->first();

        if($id_latest == null){
            return view('home.index', compact('data','title'));
        }else{
            $id = $id_latest->id;

            return view('home.index', compact('data','title','id'));
        }

        // return view('home.index');
    }
}