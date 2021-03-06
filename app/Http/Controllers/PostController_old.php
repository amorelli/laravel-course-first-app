<?php

namespace App\Http\Controllers;

class PostController
{
  public function show($post) {
      $posts = [
        'my-first-post' => 'This is my first post.',
        'my-second-post' => 'This is my second post.'
      ];

      if (! array_key_exists($post, $posts)) {
        abort(404, 'Sorry that post was not found');
      }

      return view('post', [
        'post' => $posts[$post]
      ]);
  }
}
