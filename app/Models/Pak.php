<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pak extends Model
{
  protected $fillable = [
    'name',
  ];

  public function addons()
  {
    return $this->hasMany('App\Models\Addon');
  }

}
