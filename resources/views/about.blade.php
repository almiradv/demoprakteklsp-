@extends('layouts.app')

@section('content')
  <div class="container-fluid px-4">
      <h1 class="mt-4">About</h1>
      <div class="row">
        <div class="col-2">
          <img src="{{asset('img/profile.jpeg')}}" width="170px" alt="">
        </div>
        <div class="col">
          Aplikasi ini dibuat oleh
          <ul>
            <li>Nama : Almira Devina</li>
            <li>NIM : 1931713016</li>
            <li>Tanggal : 22 Agustus 2020</li>
          </ul>
        </div>
      </div>
  </div>
@endsection
@push('script')
  <script type="text/javascript">
  </script>
@endpush
