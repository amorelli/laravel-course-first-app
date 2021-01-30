<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  $name = request('name');
  return view('welcome', [
    'name' => $name
  ]);
});

Route::get('/about', function () {
  // $articles = App\Article::all(); // Fetches all entries from table. Not really good practice.
  // $articles = App\Article::take(2)->get(); // Take 2 entries from articles table and return them
  // $articles = App\Article::paginate(2); // Laravel generates a paginator instance in sets of 2
  $articles = App\Article::take(3)->latest()->get(); //  Order by created_at in descending order. Can also pass in variable to latest() to order by a different column. (e.g. published_at, updated_at, etc)
  return view('about', [
    'articles' => $articles
  ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');
// Using a controller
Route::get('/posts/{post}', 'PostController@show');

// Using a closure
// Route::get('/posts/{post}', function ($post) {
//   $posts = [
//     'my-first-post' => 'This is my first post.',
//     'my-second-post' => 'This is my second post.'
//   ];

//   if (! array_key_exists($post, $posts)) {
//     abort(404, 'Sorry that post was not found');
//   }

//   return view('post', [
//     'post' => $posts[$post]
//   ]);
// });
