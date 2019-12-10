<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <h2>Attributes</h2>
            <?php if($attributes->total() > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>Attribute name</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('admin.attributes.show', $attribute->id)); ?>"><?php echo e($attribute->name); ?> <strong>(<?php echo e($attribute->values->count()); ?>)</strong></a>
                        </td>
                        <td>
                            <form action="<?php echo e(route('admin.attributes.destroy', $attribute->id)); ?>" method="post" class="form-horizontal">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('admin.attributes.values.create', $attribute->id)); ?>" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add values</a>
                                    <a href="<?php echo e(route('admin.attributes.edit', $attribute->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left"><?php echo e($attributes->links()); ?></div>
                </div>
            </div>
                <div class="box-footer">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.attributes.create')); ?>"><i class="fa fa-plus"></i> Create attribute</a>
                    </div>
                </div>
            <?php else: ?>
                <p class="alert alert-warning">No attribute yet. <a href="<?php echo e(route('admin.attributes.create')); ?>">Create one</a></p>
            <?php endif; ?>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>