<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article = new Article($request->all());
        $article->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('article_images', 'public');
            $article->image = $imagePath;
        }

        $article->save();

        return redirect()->route('articles.my_articles')->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function like(Article $article)
    {
        $article->increment('likes');
        return back();
    }

    public function dislike(Article $article)
    {
        $article->increment('dislikes');
        return back();
    }

    public function myArticles()
    {
        $articles = Auth::user()->articles()->latest()->get();
        return view('articles.my_articles', compact('articles'));
    }
}
