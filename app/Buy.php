<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
  public function buyer(){
    return $this->belongsTo(User::class);
  }

  public function application(){
    return $this->belongsTo(Application::class);
  }

}
