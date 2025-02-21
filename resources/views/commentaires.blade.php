<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .comment-form {
            margin-bottom: 30px;
        }
        .comment-form input, .comment-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .comment-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .comment-form button:hover {
            background-color: #45a049;
        }
        .comments {
            margin-top: 30px;
        }
        .comment {
            padding: 10px;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .comment .user {
            font-weight: bold;
        }
        .comment .content {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Commentaires</h2>
    
    <!-- Formulaire d'ajout de commentaire -->
    <div class="comment-form">
        <h3>Ajouter un commentaire</h3>
        <form action="{{ url('/annonces/{{ $article->id }}/commentaires') }}" method="POST">
            @csrf
            <textarea name="contenu" placeholder="Écrivez votre commentaire..." rows="4" required></textarea>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> <!-- ID de l'utilisateur connecté -->
            <button type="submit">Ajouter le commentaire</button>
        </form>
    </div>

    <!-- Liste des commentaires -->
    <div class="comments">
        <h3>Commentaires existants</h3>
        @foreach ($article->commentaires as $commentaire)
        <div class="comment">
            <div class="user">{{ $commentaire->user->name }}</div>
            <div class="content">{{ $commentaire->contenu }}</div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
