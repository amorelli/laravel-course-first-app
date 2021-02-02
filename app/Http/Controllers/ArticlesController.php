<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
  public function index()
  {
    // Render a list of a resource
    if (request('tag')) {
      $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
    } else {
      $articles = Article::latest()->get();
    }

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
    Article::create($this->validateArticle());

    return redirect(route('articles.index'));
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
    $article->update($this->validateArticle());

    return redirect($article->path());
  }

  public function destroy()
  {
    // Delete the resource
  }

  protected function validateArticle()
  {
    return request()->validate([
      'title' => ['required', 'min:3', 'max:255'],
      'excerpt' => 'required',
      'body' => 'required',
    ]);
  }
}
