<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
        <?php if($category): ?>
            <div class="box">
                <div class="box-body">
                    <h2>Category</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-4">Name</td>
                            <td class="col-md-4">Description</td>
                            <td class="col-md-4">Cover</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->description); ?></td>
                                <td>
                                    <?php if(isset($category->cover)): ?>
                                        <img src="<?php echo e(asset("storage/$category->cover")); ?>" alt="category image" class="img-thumbnail">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php if(!$categories->isEmpty()): ?>
                <hr>
                    <div class="box-body">
                        <h2>Sub Categories</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <td class="col-md-3">Name</td>
                                <td class="col-md-3">Description</td>
                                <td class="col-md-3">Cover</td>
                                <td class="col-md-3">Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('admin.categories.show', $cat->id)); ?>"><?php echo e($cat->name); ?></a></td>
                                        <td><?php echo e($cat->description); ?></td>
                                        <td><?php if(isset($cat->cover)): ?><img src="<?php echo e(asset("storage/$cat->cover")); ?>" alt="category image" class="img-thumbnail"><?php endif; ?></td>
                                        <td><a class="btn btn-primary" href="<?php echo e(route('admin.categories.edit', $cat->id)); ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
                <?php if(!$products->isEmpty()): ?>
                    <div class="box-body">
                        <h2>Products</h2>
                        <?php echo $__env->make('admin.shared.products', ['products' => $products], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php endif; ?>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-default btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        <?php endif; ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>