<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ArticleController extends Controller
{

    public function create(){
        $title="Membuat Artikel";

        return view('article.create', compact('title'));
    }

    public function store(Request $request)
    {
        // $id = $request->session()->get('id');
        $id = Auth::user()->id;
        $request->validate([
            'topic' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|max:2000|mimes:jpeg,png,jpg,doc,docx,xls,xlsx,ppt,pptx,pdf',
        ]);

        $gambar = $request->file('gambar');
        $new_gambar = rand().'.'.$gambar->getClientOriginalExtension();

        $data_artikel = array(
            'user_id' => $id,
            // 'topic' => $request->topic,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'total_like' => 0,
            'gambar' => $new_gambar,
        );

        $gambar->move(public_path('gambar'), $new_gambar);
        $savedData = Article::create($data_artikel);

        return response()->json([
            'success' => 'data berhasil disimpan',
            'data' => $savedData
        ]);

        // return redirect('/')->with('success', 'data has been created');
    }

    public function show($id)
    {
        $title = 'preview';
        $data = Article::find($id);
        $getEx = $data->gambar;
        $ext = substr($getEx, strpos($getEx, ".") + 1);

        
        $like = Like::where('article_id',$id)->count();
        
        $data->total_like = $like;
        
        return view('article.detail', compact('data','title','ext','like'));
    }

    public function edit($id)
    {
        $data = Article::find($id);
        $title = 'Edit';
        return view('edit', compact('data','title'));
    }

   
    public function update(Request $request, $id)
    {
        $gambar_lama = $request->hidden_gambar;
        $gambar = $request->file('gambar');
        if($gambar != ''){
            $request->validate([
                'topic' => 'required',
                'judul' => 'required',
                'isi' => 'required',
                'gambar' => 'required|max:2000|mimes:jpeg,png,jpg,doc,docx,xls,xlsx,ppt,pptx,pdf',
            ]);

            $new_gambar = $gambar_lama;
            $gambar->move(public_path('gambar'), $new_gambar);
        }else{
            $request->validate([
                'topic' => 'required',
                'judul' => 'required',
                'isi' => 'required'
            ]);
            $new_gambar = $gambar_lama;
        }

        $data_artikel = array(
            'topic' => $request->topic,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $new_gambar,
        );

        $data = Article::find($id);
        $data->update($data_artikel);

        return redirect('/preview/'.$id);
    }

    public function destroy($id)
    {
        $data = Article::find($id);
        File::delete('gambar/'.$data->gambar);

        $data->delete($data);

        return redirect('/')->with('Success','data berhasil dihapus');
    }

    public function search()
    {

        $search_text = $_GET['search'];
        $data = Article::where('topic', 'LIKE','%'.$search_text.'%')->orWhere('judul', 'LIKE','%'.$search_text.'%')->latest()->simplepaginate(5);
        $title = 'search';
        return view('search', compact('data','title','search_text'));
    }

    public function komentar(Request $request, $article_id){
        $request->validate([
            'komentar' => 'required',
        ]);

        $data_komentar = array(
            'article_id' => $article_id,
            'user_id' => Auth::user()->id,
            'komentar' => $request->komentar,
        );

        $savedData = Komentar::create($data_komentar);

        return back();
    }
}