<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="box">
            <form action="<?php echo e(route('admin.customers.update', $customer->id)); ?>" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo $customer->name ?: old('name'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Sir Name <span class="text-danger">*</span></label>
                        <input type="text" name="sir_name" id="sir_name" placeholder="Sir Name" class="form-control" value="<?php echo $customer->sir_name ?: old('sir_name'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $customer->email ?: old('email'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image_path">Image </label>
                        <?php if($customer->image_path!=null && $customer->image_path!=''): ?>
                        <img src="/storage/<?php echo $customer->image_path ?: old('image_path'); ?>" style="height: 50px;"/>
                        <?php endif; ?>
                        <input type="file" name="image_path" id="image_path">
                    </div>
                    <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" <?php if($customer->status == 0): ?> selected="selected" <?php endif; ?>>Disable</option>
                            <option value="1" <?php if($customer->status == 1): ?> selected="selected" <?php endif; ?>>Enable</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="<?php echo e(route('admin.customers.index')); ?>" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>