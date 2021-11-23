<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <p style="text-align:center"><h5 class="modal-title text-white" id="deleteModalLabel">Ubah data</h5></p>
      </div>
      <div class="modal-body">
        <form action="{{route('update.arsip')}}" method="post" enctype="multipart/form-data"> <!--pengembalian surat-->
          @csrf
          <input type="text" hidden id="id" name="id" value="">
          <div class="form-group">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" id="nomor_surat" class="form-control" name="nomor_surat" value="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>
            <select class="form-control" id="kategori" name="kategori">
              <option value="Undangan">Undangan</option>
              <option value="Pengumuman">Pengumuman</option>
              <option value="Nota Dinas">Nota Dinas</option>
              <option value="Pemberitahuan">Pemberitahuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nomor_surat">Judul</label>
            <input type="text" id="judul" class="form-control" name="judul" value="">
          </div>
          <div class="form-group">
            <label for="nomor_surat">Waktu</label>
            <input type="date" id="waktu" class="form-control" name="waktu" value="">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">File</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
          </div>

      </div>
        <div class="row">
          <div class="col-6">
            <button type="button" class="btn btn-lg btn-block" data-dismiss="modal">Tidak</button>
          </div>
          <div class="col-6">
            <button type="submit" class="btn btn-lg btn-block">Ya</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
