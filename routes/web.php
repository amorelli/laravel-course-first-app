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
  return view('about');
});

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

// Using a controller
Route::get('/posts/{post}', 'PostController@show');
