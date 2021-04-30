<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);

    }

    public function add()
    {
        return view('articles.add');
    }

    public function create(Request $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = Auth::id();
        $article->slug = $request->title;
        $article->save();

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        if (! Gate::allows('update-article', $article)) {
            abort(403);
        }

        return view('articles.edit', ['article' => $article]);
    }
}
