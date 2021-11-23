

<?php $__env->startSection('content'); ?>
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
      <form class="form" action="<?php echo e(route('datapost.insertArsip')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group row" style="margin-top:1%">
          <label for="nomor">Nomor Surat</label>
          <input type="text" class="form-control" id="nomor" name="nomor_surat">
        </div>
        <div class="form-group row" style="margin-top:1%">
          <label for="kategori">Kategori</label>
          <select id="kategori" class="form-control" name="kategori">
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

          <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>

      </form>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
  <script type="text/javascript">

  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\bnsp\resources\views/arsip.blade.php ENDPATH**/ ?>