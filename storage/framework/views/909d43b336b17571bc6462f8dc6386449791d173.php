<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
        <?php if($customers): ?>
            <div class="box">
                <div class="box-body">
                    <h2>Customers</h2>
                    <?php echo $__env->make('layouts.search', ['route' => route('admin.customers.index')], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Image</td>
                                <td class="col-md-2">Name</td>
                                <td class="col-md-2">Email</td>
                                <td class="col-md-2">Status</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($customer['id']); ?></td>
                                <td>
                                <?php if($customer['image_path']!=null && $customer['image_path']!=''): ?>
                                <img src="/storage/<?php echo $customer['image_path']; ?>" style="height: 50px;"/>
                                <?php endif; ?>
                                </td>
                                <td><?php echo e($customer['name']); ?> <?php echo e($customer['sir_name']); ?></td>
                                <td><?php echo e($customer['email']); ?></td>
                                <td><?php echo $__env->make('layouts.status', ['status' => $customer['status']], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.customers.destroy', $customer['id'])); ?>" method="post" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <!-- <a href="<?php echo e(route('admin.customers.show', $customer['id'])); ?>" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a> -->
                                            <a href="<?php echo e(route('admin.customers.edit', $customer['id'])); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($customers->links()); ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        <?php endif; ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>