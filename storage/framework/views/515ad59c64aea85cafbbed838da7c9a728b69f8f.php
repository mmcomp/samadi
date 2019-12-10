<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="col-md-4">ID</td>
                            <td class="col-md-4">Name</td>
                            <td class="col-md-4">Email</td>
                            <td class="col-md-4">Roles</td>
                        </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td><?php echo e($employee->id); ?></td>
                        <td><?php echo e($employee->name); ?></td>
                        <td><?php echo e($employee->email); ?></td>
                        <td>
                            <?php echo e($employee->roles()->get()->implode('name', ', ')); ?>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="<?php echo e(route('admin.employees.index')); ?>" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>