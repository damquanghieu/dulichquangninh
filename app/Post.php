<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public $table = 'posts';
   
   public function categories(){

      return $this->belongsTo('App\Category','category_id','id');
   }
}
