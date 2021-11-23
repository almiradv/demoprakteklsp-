<?php $__env->startSection('content'); ?>
  <div class="container-fluid px-4">
      <h1 class="mt-4">Arsip Surat</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Berkut ini adalah surat-surat yang telah terbit dan diarsipkan.<br> Klik lihat pada kolom
          aksi untuk menampilkan surat</li>
      </ol>
      <?php echo $__env->make('modal.deleteModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <a href="<?php echo e(route('index.insertArsip')); ?>" class="btn btn-info text">Arsipkan Surat...</a>
      <div class="card mb-4" style="margin-top:2%;">
          <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Arsip surat
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 offset-6">
                <form id="searchform" name="searchform"  onsubmit="return false;">
                      <div class="input-group">
                        <input type="text" class="form-control" style="margin-left:10px;" name="searchbox" id="searchbox" placeholder="Search...">
                        <span class="input-group-btn">
                          <button type="button" id="search-button" class="btn"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
                        </span>
                      </div>
                </form>
              </div>
            </div>
            <table id="table_id" class="table table-striped">
              <thead>
                  <tr>
                    <th></th>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
  <script type="text/javascript">
  var tabledata = $('#table_id');
  $(document).ready( function () {
    $('#table_id').DataTable( {
      processing: true,
       serverSide: true,
       destroy: true,
       searching: false,
       info: false,
       retrieve: true,
       autoWidth: false,
       scrollX: true,
       ordering: false,
       language: {
       processing: "Sedang diproses..."
       },
       lengthMenu: [
           [10, 25, 50,75, 100],
           [10, 25, 50,75, 100]
       ],
       sPaginationType: 'full_numbers',
       ajax: {
          url: '<?php echo e(route('getdata.surat')); ?>',
          type: 'POST',
          data: function (d) {
              d._token = "<?php echo e(csrf_token()); ?>";
          }
      },
      columns: [
        {  data: "id",
        render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        {data:"nomor_surat"},
        {data:"kategori"},
        {data:"judul"},
        {data:"created_at"},
        {
          data: null,
        render: function(data, type, full, meta){
         return '<div class="btn-group" role="group" aria-label="Basic example">'+
               '<button id="hapus" type="button" data-id="'+full['id']+'" class="hapus btn btn-danger btn-sm">Hapus</button>'+
               '<a href="file/'+full['file']+'" target="_blank" class="btn btn-warning btn-sm">Unduh</a>'+
              '<a href="lihat/'+full['id']+'"  class="btn btn-info btn-sm">Lihat</a>'+
          '</div>';
         }
       },
       ],
   } );



   $(document).on("click", ".hapus", function () {
       $('#delete_id').val($(this).data('id'));
       $('#deleteModal').modal('show');
   });
  } );
  $(document).ready(function() {
    $("#search-button").click(function() {
      tabledata.DataTable().ajax.url("<?php echo e(url('getdata')); ?>?"+ $('#searchform').serialize()).load();
    });

    $('#searchbox').keypress(function(e){
    if (e.keyCode == 13)
    {
        $("#search-button").click();
    }
    });

  });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\bnsp\resources\views/home.blade.php ENDPATH**/ ?>