<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
        <?php if($orders): ?>
            <div class="box">
                <div class="box-body">
                    <h2>Orders</h2>
                    <?php echo $__env->make('layouts.search', ['route' => route('admin.orders.index')], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-3">Date</td>
                                <td class="col-md-3">Customer</td>
                                <td class="col-md-2">Courier</td>
                                <td class="col-md-2">Total</td>
                                <td class="col-md-2">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a title="Show order" href="<?php echo e(route('admin.orders.show', $order->id)); ?>"><?php echo e(date('M d, Y h:i a', strtotime($order->created_at))); ?></a></td>
                                <td><?php echo e($order->customer->name); ?></td>
                                <td><?php echo e($order->courier->name); ?></td>
                                <td>
                                    <span class="label <?php if($order->total != $order->total_paid): ?> label-danger <?php else: ?> label-success <?php endif; ?>"><?php echo e(config('cart.currency')); ?> <?php echo e($order->total); ?></span>
                                </td>
                                <td><p class="text-center" style="color: #ffffff; background-color: <?php echo e($order->status->color); ?>"><?php echo e($order->status->name); ?></p></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo e($orders->links()); ?>

                </div>
            </div>
            <!-- /.box -->
        <?php endif; ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>