<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\surat;
use App\file;
class arsipController extends Controller
{
    public function insertArsip(){
      return view('arsip');
    }

    //<!--ambil request file-->
    public function datapost(Request $request){ //<!--Create Data-->
      $files = $request->file('file');
      $files->getClientOriginalName();
		  $files->getClientOriginalExtension();
		  $files->getRealPath();
		  $files->getSize();
		  $files->getMimeType();
		  $tujuan_upload = 'file';
		  $files->move($tujuan_upload,$files->getClientOriginalName());
    //<!--input file surat ke db, sesuai atribut tabel-->
      $surat = new surat();
      $surat->nomor_surat= $request->nomor_surat;
      $surat->kategori= $request->kategori;
      $surat->judul= $request->judul_surat;
      $surat->created_at = date('Y-m-d');
      $surat->save();
    //<!--ambil app file sambung ke tabel file-->
      $file= new file();
      $file->file = $files->getClientOriginalName(); //<!--ambil file dari kolom file sesuai dengan original name-->
      $file->surat()->associate($surat);
      $file->save(); //<!--simpan data file-->
      return redirect('home');
    }
    public function getData(Request $request){ //<!--fungsi untuk read/menampilkan data-->
      $data = [];
      $draw = $request["draw"];
      $limit = !empty($request["length"]) ? $request->length : 10;
      $offset = !empty($request["start"]) ? $request->start : 0;
      // dd($limit);
      $rn = 1;
      $search = $request->searchbox;
      //<!--ambil data surat dg file-->
      $get = surat::with('file');
        if (!empty($search)) { //<!--search-->
          $get = $get->where('nomor_surat','like','%'.$search.'%') 
          ->orWhere('kategori','like','%'.$search.'%')
          ->orWhere('judul','like','%'.$search.'%');
        }
    $read = $get->get(); //<!--ambil data dlm bentuk array-->
    $get = $get
    ->limit($limit)
    ->offset($offset)
    ->orderBy('id', 'DESC')
    ->get();
    $get_count = $read->count();
    if (count($get) > 0) {
      foreach ($get as $value) { 
        $data[] = array( //<!--isi data yang ditampilkan-->
          'rn' => $rn++,
          'id' => $value->id,
          'nomor_surat' => $value->nomor_surat,
          'kategori' => $value->kategori,
          'judul' => $value->judul,
          'created_at' => date('d-M-Y',strtotime($value->created_at)),
          'file' => $value->file->file,
          );
        }
    }
    $recordsTotal = is_null($get_count) ? 0 : $get_count;
    $recordsFiltered = is_null($get_count) ? 0 : $get_count;
          return response()->json(compact('data','draw','recordsTotal','recordsFiltered')); //<!--menampilkan file array-->
    }
    public function delete(Request $request){ //<!--delete data-->
      DB::table('surat')->where('id',$request->id)->delete(); //<!--delete by id-->
      return redirect('home');
    }
    public function detail($id){ //<!--fungsi utk melihat-->
      $get = surat::with('file')->where('id',$id) //<!--mengambil tampilan surat dan file by id-->
          ->orderBy('id', 'DESC')->get();
      return view('show')->with(compact('get')); //<!--untuk menampilkan surat dan file by id-->
    }
    public function update(Request $request){ //<!--fungsi update data-->
      if (!empty($request->file('file'))) {
        $files = $request->file('file');
        $files->getClientOriginalName();
  		  $files->getClientOriginalExtension();
  		  $files->getRealPath();
  		  $files->getSize();
  		  $files->getMimeType();
  		  $tujuan_upload = 'file';
  		  $files->move($tujuan_upload,$files->getClientOriginalName()); //<!--memindah tujuan file-->
        $name_file = $files->getClientOriginalName();
      }
      else {
        $files = surat::with('file')->where('id',$request->id)->first(); //<!--cek data apakah file diperbarui atau tidak-->
        $name_file = $files->file->file;
      }
      $surat = surat::find($request->id);
      $file = $surat->file()->update([
        'file' => $name_file
      ]);
      $surat->update([ //<!--update file surat-->
        'nomor_surat' => $request->nomor_surat,
        'kategori' => $request->kategori,
        'judul' => $request->judul,
        'created_at' => $request->waktu
      ]);
      return redirect('home');
    }
}
