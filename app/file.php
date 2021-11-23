<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
  protected $table = "file";
  public $timestamps = false;
  public function surat()
  {
    return $this->belongsTo('App\surat');
  }
}
