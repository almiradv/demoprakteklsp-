<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Pengarsipan</a>
    <!-- Sidebar Toggle-->
    
    <!-- Navbar Search-->
    
    <!-- Navbar-->
    <?php if(auth()->guard()->guest()): ?>
        <div class="navbar-nav ms-auto col-2 offset-10">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
          </li>
        </div>
      <?php else: ?>
        <div class="dropdown ms-auto col-2 offset-1">
          <button class=" dropdown-toggle btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user fa-fw text-white"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <p class="dropdown-item"><?php echo e(Auth::user()->name); ?></p>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          </div>
        </div>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
              </form>
        
    <?php endif; ?>
</nav>
<?php /**PATH C:\xampp\htdocs\bnsp\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>