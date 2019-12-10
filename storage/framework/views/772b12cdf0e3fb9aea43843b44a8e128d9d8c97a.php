<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
        <?php if(!$products->isEmpty()): ?>
            <div class="box">
                <div class="box-body">
                    <h2>Products</h2>
                    <?php echo $__env->make('layouts.search', ['route' => route('admin.products.index')], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('admin.shared.products', ['abbas', $abbas], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo e($products->links()); ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        <?php endif; ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>