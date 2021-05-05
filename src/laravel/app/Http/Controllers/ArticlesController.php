<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Models\Article;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class ArticlesController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::with('tags')->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function add()
    {
        $tags = Tag::all();
        return view('articles.add', ['tags' => $tags]);
    }

    public function create(ArticlesRequest $request)
    {
        $validated = $request->validated();

        $article = Article::create([
            'title' => $validated->title,
            'body' => $validated->body,
            'user_id' => Auth::id(),
            'slug' => $validated->title,
        ]);

        // 中間テーブルにtagを登録
        $article->tags()->attach($validated->tags);

        return redirect('/articles');
    }

    public function edit(Request $request, Article $article)
    {
        // if ($request->user()->cannot('update', [$article, $request->category])) {
        //     abort(403);
        // }

        // $this->authorize('update', [$article, $request->category, $request->role]);
        $this->authorize('update', [$article, $request->category]);

        $tags = Tag::all();
        $params = [
            'article' => $article,
            'tags' => $tags,
        ];

        return view('articles.edit', $params);
    }

    public function update(Request $request, Article $article)
    {
        $article->fill($request->all())->save();
        $article->tags()->sync($request->tags);
        return redirect('/articles');
    }

    public function delete(Request $request, Article $article)
    {
        $ids = $article->tags->pluck('id');
        Log::info($ids);
        $article->tags()->updateExistingPivot($ids, ['deleted_at' => Carbon::now()]);

        return redirect('/articles');
    }
}
