<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Service Booked</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('blog.create')); ?>"><i
                                        class="fas fa-plus-circle" style="color:green;"></i></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="card-body">
                <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Model</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        // get current page for Paginator
                        $currentPage = (\Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage() - 1) * 10;
                    ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($currentPage + $key + 1); ?></td>
                            <td><?php echo e($blog->model); ?></td>
                            <td><?php if($blog->option1!=null): ?><?php echo e($blog->option1); ?><br><?php endif; ?>
                                <?php if($blog->option2!=null): ?><?php echo e($blog->option2); ?><br><?php endif; ?>
                                <?php if($blog->option3!=null): ?><?php echo e($blog->option3); ?><br><?php endif; ?>
                            </td>
                            <td><?php echo e(date('d-m-Y', strtotime($blog->date))); ?></td>
                            <td><?php echo e($blog->status); ?></td>
                            <td>

                                <a href="<?php echo e(route('blog.show', $blog->id)); ?>" class="btn btn-primary">Show</a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users.read', 'users.write'])): ?>
                                <a href="<?php echo e(route('blog.edit', $blog->id)); ?>" class="btn btn-primary">Edit</a>
                                <form action="<?php echo e(route('blog.destroy', $blog->id)); ?>" method="post" class="d-inline">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div style="margin-top: 10px;">
                    <?php echo e($blogs->links('pagination::bootstrap-4')); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bike service\Bike-service-application\bikeservice\resources\views/service/index.blade.php ENDPATH**/ ?>
