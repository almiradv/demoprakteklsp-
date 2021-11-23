@extends('layouts.app')

@section('content')
  <div class="container-fluid px-4">
      <h1 class="mt-4">Arsip Surat | Unggah</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Unggah arsip surat yang telah terbit pada form ini untuk diarsipkan.<br>
            Catatan :
            <ul>
                <div class="alert alert-warning" role="alert">
                  <li>Gunakan file berformat PDF</li>
                </div>
            </ul>
          </li>
      </ol>
      <form class="form" action="{{route('datapost.insertArsip')}}" method="post" enctype="multipart/form-data"> 
                                <!--fungsi post ke route data post arsip-->

        @csrf
        <div class="form-group row" style="margin-top:1%">
          <label for="nomor">Nomor Surat</label>
          <input type="text" class="form-control" id="nomor" name="nomor_surat">
        </div>
        <div class="form-group row" style="margin-top:1%">
          <label for="kategori">Kategori</label>
          <select id="kategori" class="form-control" name="kategori"> <!--menyebutkan nama data kategori-->
            <option value="Undangan">Undangan</option>
            <option value="Pengumuman">Pengumuman</option>
            <option value="Nota Dinas">Nota Dinas</option>
            <option value="Pemberitahuan">Pemberitahuan</option>
          </select>
        </div>
        <div class="form-group row" style="margin-top:1%">
          <label for="judul">Judul Surat</label>
          <input type="text" class="form-control" id="judul" name="judul_surat">
        </div>
        <div class="form-group" style="margin-top:1%">
          <label for="file_surat">File surat (PDF)</label>
          <input type="file" class="form-control-file" accept="application/pdf"  id="file_surat" name="file">
        </div>

          <a href="{{route('home')}}" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>

      </form>
  </div>
@endsection
@push('script')
  <script type="text/javascript">

  </script>
@endpush
