<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
