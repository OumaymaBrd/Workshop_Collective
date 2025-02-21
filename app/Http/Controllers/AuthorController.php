<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AuthorController extends Controller
{
    public function index(){
      $articles = Article::all();
      return view('articles.index', compact('articles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'article' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $post = new Article();
        // $post->userID = Auth->id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->article = $request->article;
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $post->photo = $photoPath;
        }
    
        $post->save();
    
        return redirect()->route('articles.index');
    }
    
    public function create(){
      return view('articles.create');
    }
}
