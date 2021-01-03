<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  public function categoria(){
      return $this->belongsTo(Category::class,'category_id');
  }

  public function aplicacion(){
      return $this->belongsTo(User::class,'user_id');
  }
}
