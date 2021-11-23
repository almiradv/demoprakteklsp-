@extends('layouts.app')

@section('content')
  <div class="container-fluid px-4">
      <h1 class="mt-4">Arsip Surat | Lihat</h1>
      @include('modal.updateModal')
        @foreach ($get as $value) <!--perulangan varriabel get dengan nama value-->
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">
            <ul>
              <li> Nomor : {{$value->nomor_surat}}</li>
              <li> Kategori : {{$value->kategori}}</li>
              <li> Judul : {{$value->judul}}</li>
              <li> Waktu : {{date('d-M-Y',strtotime($value->created_at))}}</li>
            </ul>
      </ol>
      <input type="hidden" name="" id="setwaktu" value="{{date('Y,m,d',strtotime($value->created_at))}}">

      <div class="card mb-4" style="margin-top:2%;">
          <embed src="{{ asset('file/'.$value->file->file) }}" type="application/pdf" width="100%" height="600px"> <!--menampilkan pdf-->
      </div>
        <a href="{{route('home')}}" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a> <!--tombol kembali-->
        <a href="{{ asset('file/'.$value->file->file) }}" type="submit" class="btn btn-warning">Unduh</a> <!--tombol update-->
        <button type="submit" data-id="{{$value->id}}" data-nomor_surat="{{$value->nomor_surat}}" data-judul="{{$value->judul}}"
          data-waktu="{{$value->created_at}}"
           class="update btn btn-info">Edit / Ganti File</button> <!--tombol update-->
            @endforeach
  </div>
@endsection
@push('script')
  <script type="text/javascript">
  $(document).on("click", ".update", function () {
      $('#id').val($(this).data('id'));
      $('#nomor_surat').val($(this).data('nomor_surat'));
      $('#judul').val($(this).data('judul'));
      $('#kategori').find('#kategori').attr("value",$(this).data('kategori'));
      ;
      var now = new Date(document.getElementById('setwaktu').value);
      console.log(now);
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
      $('#waktu').val(today);
            $('#updateModal').modal('show');
        });
  </script>
@endpush
