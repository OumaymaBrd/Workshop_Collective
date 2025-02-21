<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\articles;

class CommentaireController extends Controller
{
 
    public function store(Request $request, $postID)
    {
        $request->validate([
            'contenu' => 'required|string|max:1000',
            'user_id' => 'required|exists:users,id', 
        ]);

        $articles = articles::findOrFail($postID);

        $commentaire = new Commentaire();
        $commentaire->contenu = $request->input('contenu');
        $commentaire->user_id = $request->input('user_id');
        $commentaire->annonce_id = $articles->id;
        $commentaire->save();
}
}
