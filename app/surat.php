<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
	//<!--koneksi ke tabel surat-->
  protected $table = "surat";
  protected $fillable = ['nomor_surat', 'kategori', 'judul', 'created_at'];
  public $timestamps = false;
  public function file()
  {
    return $this->hasOne('App\file');
  }
}
