<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Blog</h1>
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
                            <div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px;">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('service.update', $service->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="">Model</label>
                                <input type="text" name="model" class="form-control" value="<?php echo e($service->model); ?>">
                                <?php if($errors->has('model')): ?>
                                    <div class="text-danger" style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('model')); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="">Status</label><br>
                                <input type="radio" name="status" value="Ready for delivery" > Ready for delivery<br>
                                <input type="radio" name="status" value="Completed"> Completed<br>
                                <?php if($errors->has('status')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('status')); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="">Suggestions</label>
                                <textarea name="body" id="" cols="30" rows="10" class="form-control"><?php echo e($service->body); ?></textarea>
                                <?php if($errors->has('body')): ?>
                                    <div class="text-danger" style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('body')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control" value="<?php echo e(date('Y-m-d', strtotime($service->date))); ?>">
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="<?php echo e(route('service.index')); ?>" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bike service\Bike-service-application\bikeservice\resources\views/service/edit.blade.php ENDPATH**/ ?>