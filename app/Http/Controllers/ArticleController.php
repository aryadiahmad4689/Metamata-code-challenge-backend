<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index',compact('articles'));
    }

    public function  create()
    {
        return view('articles.create');
    }

    public function show($id)
    {

        $article = Article::with('like')->find($id);;

        $likes = Like::all();

        return view('articles.show',compact('article','likes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required|min:3',
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->desc;

        $article->save();

        return redirect('/articles');
    }

}
