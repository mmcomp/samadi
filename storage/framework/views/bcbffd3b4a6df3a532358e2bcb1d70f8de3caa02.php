<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
        <?php if($countries): ?>
            <div class="box">
                <div class="box-body">
                    <h2>Countries</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">Name</td>
                                <td class="col-md-1">ISO</td>
                                <td class="col-md-2">ISO-3</td>
                                <td class="col-md-1">Numcode</td>
                                <td class="col-md-1">Phone Code</td>
                                <td class="col-md-1">Status</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($country->name); ?></td>
                                <td><?php echo e($country->iso); ?></td>
                                <td><?php echo e($country->iso3); ?></td>
                                <td><?php echo e($country->numcode); ?></td>
                                <td><?php echo e($country->phonecode); ?></td>
                                <td><?php echo $__env->make('layouts.status', ['status' => $country->status], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.countries.show', $country->id)); ?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="<?php echo e(route('admin.countries.edit', $country->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($countries->links()); ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        <?php endif; ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>