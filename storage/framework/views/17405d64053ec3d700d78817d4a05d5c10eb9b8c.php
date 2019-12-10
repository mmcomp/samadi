<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
        <?php if(!$brands->isEmpty()): ?>
            <div class="box">
                <div class="box-body">
                    <h2>Brands</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.brands.show', $brand->id)); ?>"><?php echo e($brand->name); ?></a>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('admin.brands.destroy', $brand->id)); ?>" method="post" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('admin.brands.edit', $brand->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($brands->links()); ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <?php else: ?>
            <p class="alert alert-warning">No brand created yet. <a href="<?php echo e(route('admin.brands.create')); ?>">Create one!</a></p>
        <?php endif; ?>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>