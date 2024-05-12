<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Blog Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('service.index')); ?>"><i
                                            class="fas fa-home"></i></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <h2><?php echo e($service->model); ?></h2>
                        <p>Date <?php echo e(date('Y-m-d', strtotime($service->date))); ?></p>
                        <h2>Services</h2>
                            <?php if($service->option1!=null): ?><?php echo e($service->option1); ?><br><?php endif; ?>
                            <?php if($service->option2!=null): ?><?php echo e($service->option2); ?><br><?php endif; ?>
                            <?php if($service->option3!=null): ?><?php echo e($service->option3); ?><br><?php endif; ?>
                        <div>
                            <h2>Suggestions</h2>
                            <?php echo e($service->body); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bike service\Bike-service-application\bikeservice\resources\views/service/show.blade.php ENDPATH**/ ?>