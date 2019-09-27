<?php

namespace App\Http\Controllers;

use App\Article;
use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    private $rule = [
        'title' => 'required',
        'description' => 'required',
        'thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'external_link' => 'nullable|required_with:is_external|url',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Board $board)
    {
        $articles = $board->articles()->paginate(10);

        return view('admin.board.article.index', ['board' => $board, 'articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Board $board)
    {
        return view('admin.board.article.create', ['board' => $board]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Board $board)
    {
        request()->validate($this->rule);

        $thumb_path = request()->hasFile('thumb') ? request()->file('thumb')->store('article_thumb') : null;

        $id = Article::create([
            'title' => request('title'),
            'description' => request('description'),
            'thumb' => $thumb_path,
            'is_external' => request('is_external') ? true : false,
            'external_link' => request('external_link'),
            'board_id' => $board->id,
        ]);

        return redirect(route('admin.board.article.index', ['board' => $board]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board, Article $article)
    {
        return view('admin.board.article.show', ['board' => $board, 'article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board, Article $article)
    {
        return view('admin.board.article.edit', ['board' => $board, 'article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board, Article $article)
    {
        request()->validate($this->rule);

        if (request()->hasFile('thumb') && $article->thumb != null) {
            Storage::delete([$article->thumb]);
        }
        $thumb_path = request()->hasFile('thumb') ? request()->file('thumb')->store('article_thumb') : $article->thumb;

        $article->update([
            'title' => request('title'),
            'description' => request('description'),
            'thumb' => $thumb_path,
            'is_external' => (bool) request('is_external'),
            'external_link' => request('external_link'),
        ]);

        return redirect(route('admin.board.article.show', ['board' => $board, 'article' => $article]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board, Article $article)
    {
        if ($article->thumb != null) {
            Storage::delete([$article->thumb]);
        }

        $article->delete();
        return redirect(route('admin.board.article.index', ['board' => $board]));
    }
}
