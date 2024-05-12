<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('user.index')); ?>"><i
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
                            <div class="alert alert-success" role="alert"
                                 style="margin-top: 10px; margin-bottom: 10px;">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="/user/<?php echo e($user->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for=""> User Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>">
                                <?php if($errors->has('name')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('name')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">User Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo e($user->email); ?>">
                                <?php if($errors->has('email')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('email')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Select Roles</label>
                                <select class="form-control" name="role_id">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>" <?php echo in_array($role->id, $user->roles()->pluck('id')->toArray(), true) ? 'selected' : ''; ?>><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('role_id')): ?>
                                    <div class="text-danger"
                                         style="margin-top: 10px; margin-bottom: 10px;"><?php echo e($errors->first('role_id')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div style="margin-top: 20px;">
                                <a href="<?php echo e(route('user.index')); ?>" class="btn btn-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bike service\Bike-service-application\bikeservice\resources\views/users/edit.blade.php ENDPATH**/ ?>