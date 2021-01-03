<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function aplicaciones(){
      return $this->hasMany(Application::class,'category_id');
    }
}
