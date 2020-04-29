<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Idk what this is for

use App\Post;
// use DB;  // We can import DB class instead of using the backslash infront of the class declaration

class PostController extends Controller
{
  public function show($slug) {

    // We use backslash so we can access DB class from global namespace root.
    // If we dont have backslash, will try to access App\Http\Controllers\DB which is not a class
    // Alternatively, we could import DB class with 'use DB', and remove the backslash
    // $post = \DB::table('posts')->where('slug', $slug)->first();

    // Use eloquent model
    $post = Post::where('slug', $slug)->firstOrFail();

    // We don't need this, when using firstOrFail() - it does the same thing
    // if (! $post) {
    //   abort(404);
    // }

    return view('post', [
      'post' => $post
    ]);
}
}
