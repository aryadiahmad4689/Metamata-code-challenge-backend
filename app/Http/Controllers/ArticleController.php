<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        $article = Article::find($id);

        return view('articles.show',compact('article'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'desc' => 'required|min:3',
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->desc;

        $article->save();

        return redirect('/articles');
    }

}
