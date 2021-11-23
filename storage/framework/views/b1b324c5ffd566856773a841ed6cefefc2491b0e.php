  <?php if(auth()->guard()->guest()): ?>
    <?php else: ?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="<?php echo e(route('home')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                    Arsip
                </a>
                <a class="nav-link" href="<?php echo e(route('about')); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-info"></i></div>
                    About
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo e(Auth::user()->name); ?>

        </div>
    </nav>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\bnsp\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>