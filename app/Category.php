<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function application(){
      return $this->hasMany(Application::class,'category_id');
    }
}
