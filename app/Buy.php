<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
  public function usuario(){
    return $this->belongsTo(User::class,'buyer_id');
  }

  public function aplicaciones(){
    return $this->hasMany(Application::class,'application_id');
  }

}
