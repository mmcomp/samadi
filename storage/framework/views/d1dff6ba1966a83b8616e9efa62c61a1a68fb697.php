<?php $__env->startSection('content'); ?>
    <hr>
    <!-- Main content -->
    <section class="container content">
        <div class="col-md-12"><?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
        <div class="col-md-4 col-md-offset-4">
            <h2><?php echo e(__('main.login_to_your_account')); ?></h2>
            <form action="<?php echo e(route('login')); ?>" method="post" class="form-horizontal">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="email"><?php echo e(__('main.email')); ?></label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="<?php echo e(__('main.email')); ?>" autofocus>
                </div>
                <div class="form-group">
                    <label for="password"><?php echo e(__('main.password')); ?></label>
                    <input type="password" name="password" id="password" value="" class="form-control" placeholder="xxxxx">
                </div>
                <div class="row">
                    <button class="btn btn-default btn-block" type="submit"><?php echo e(__('main.login_now')); ?></button>
                </div>
            </form>
            <div class="row">
                <hr>
                <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('main.i_forgot_my_password')); ?></a><br>
                <a href="<?php echo e(route('register')); ?>" class="text-center"><?php echo e(__('main.no_account?_register_here.')); ?></a>
            </div>
        </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>