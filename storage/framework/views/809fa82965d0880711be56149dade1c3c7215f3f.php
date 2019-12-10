<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

        <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Default box -->
        <?php if($employees): ?>
        <div class="box">
            <div class="box-body">
                <h2>Employees</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-3">Name</td>
                            <td class="col-md-3">Email</td>
                            <td class="col-md-1">Status</td>
                            <td class="col-md-4">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($employee->id); ?></td>
                            <td><?php echo e($employee->name); ?></td>
                            <td><?php echo e($employee->email); ?></td>
                            <td><?php echo $__env->make('layouts.status', ['status' => $employee->status], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                            <td>
                                <form action="<?php echo e(route('admin.employees.destroy', $employee->id)); ?>" method="post" class="form-horizontal">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.employees.show', $employee->id)); ?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="<?php echo e(route('admin.employees.edit', $employee->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($employees->links()); ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <?php endif; ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>