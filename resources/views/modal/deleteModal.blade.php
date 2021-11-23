<div class="modal fade" id="deleteModal" tabindex="-1" style="top:25%;" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <p style="text-align:center"><h5 class="modal-title text-white" id="deleteModalLabel">Alert!</h5></p>
      </div>
      <div class="modal-body">
        <p style="text-align:center">Apakah anda yakin ingin menghapus arsip surat ini?</p>
        <form action="{{route('delete.arsip')}}" method="post">
          @csrf
          <input type="text" id="delete_id" hidden name="id" value="">

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
