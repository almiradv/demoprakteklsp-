

<?php $__env->startSection('content'); ?>
  <div class="container-fluid px-4">
      <h1 class="mt-4">Arsip Surat | Lihat</h1>
      <?php echo $__env->make('modal.updateModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php $__currentLoopData = $get; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">
            <ul>
              <li> Nomor : <?php echo e($value->nomor_surat); ?></li>
              <li> Kategori : <?php echo e($value->kategori); ?></li>
              <li> Judul : <?php echo e($value->judul); ?></li>
              <li> Waktu : <?php echo e(date('d-M-Y',strtotime($value->created_at))); ?></li>
            </ul>
      </ol>
      <input type="hidden" name="" id="setwaktu" value="<?php echo e(date('Y,m,d',strtotime($value->created_at))); ?>">

      <div class="card mb-4" style="margin-top:2%;">
          <embed src="<?php echo e(asset('file/'.$value->file->file)); ?>" type="application/pdf" width="100%" height="600px">
      </div>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
        <a href="<?php echo e(asset('file/'.$value->file->file)); ?>" type="submit" class="btn btn-warning">Unduh</a>
        <button type="submit" data-id="<?php echo e($value->id); ?>" data-nomor_surat="<?php echo e($value->nomor_surat); ?>" data-judul="<?php echo e($value->judul); ?>"
          data-waktu="<?php echo e($value->created_at); ?>"
           class="update btn btn-info">Edit / Ganti File</button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\bnsp\resources\views/show.blade.php ENDPATH**/ ?>