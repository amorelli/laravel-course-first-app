<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
  public function index()
  {
    // Render a list of a resource
    $articles = Article::latest()->get();

    return view('articles.index', ['articles' => $articles]);
  }

  public function show(Article $article)
  {
    // Show a single resource
    // $article = Article::findOrFail($id);

    return view('articles.show', ['article' => $article]);
  }

  public function create()
  {
    // Shows a view to create a new resource (form)
    return view('articles.create');
  }

  public function store()
  {
    // Persist the resource from the create form
    request()->validate([
      'title' => ['required', 'min:3', 'max:255'],
      'excerpt' => 'required',
      'body' => 'required',
    ]);

    $article = new Article();

    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');

    $article->save();

    return redirect('/articles');
  }

  public function edit(Article $article)
  {
    // Show a view to edit an existing resource
    // $article = Article::find($id);

    return view('articles.edit', ['article' => $article]);
  }

  public function update(Article $article)
  {
    // Persist the edited resource from edit form
    request()->validate([
      'title' => ['required', 'min:3', 'max:255'],
      'excerpt' => 'required',
      'body' => 'required',
    ]);

    $article = Article::find($id);
    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');

    $article->save();

    return redirect('/articles/' . $article->id);
  }

  public function destroy()
  {
    // Delete the resource
  }
}
