<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\FunctionLike;

class Article extends Model
{
  /* 
  * Laravel protects against Mass Assignment vulnerabilities
  *   Protects against requests sending unwanted parameters, if we are updating all parameters from a 
  *   request
  */

  // This specifies the request fields that are valid
  // protected $fillable = ['title', 'excerpt', 'body'];

  // This turns the feature off
  protected $guarded = [];

  public function path()
  {
    return route('articles.show', $this);
  }

  public function author()
  {
    /* The second argument overrides the Foreign Key, because laravel assumes our
    *  method name is the FK (methodname_id)
    */
    return $this->belongsTo(User::class, 'user_id');
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }
}
