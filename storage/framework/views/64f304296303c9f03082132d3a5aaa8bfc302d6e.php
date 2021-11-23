

<?php $__env->startSection('content'); ?>
  <div class="container-fluid px-4">
      <h1 class="mt-4">About</h1>
      <div class="row">
        <div class="col-2">
          <img src="<?php echo e(asset('img/profile.jpeg')); ?>" width="170px" alt="">
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
  <script type="text/javascript">
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\bnsp\resources\views/about.blade.php ENDPATH**/ ?>