<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="<?php echo e(asset('AdminLTE-3.1.0/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo e(config('app.name', 'Laravel')); ?></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('AdminLTE-3.1.0/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['service.read', 'service.write'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('service.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-sticky-note"></i>
                            <p>
                                Services
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users.read', 'users.write'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH D:\bike service\Bike-service-application\bikeservice\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>