<?php if(!$products->isEmpty()): ?>
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td>
                    <?php if($admin->hasPermission('view-product')): ?>
                        <a href="<?php echo e(route('admin.products.show', $product->id)); ?>"><?php echo e($product->name_fa); ?></a><br/>
                        <?php echo e($product->name_en); ?><br/>
                        <?php echo e($product->name_ar); ?><br/>
                        <?php echo e($product->name_tr); ?>

                    <?php else: ?>
                        <?php echo e($product->name_fa); ?><br/>
                        <?php echo e($product->name_en); ?><br/>
                        <?php echo e($product->name_ar); ?><br/>
                        <?php echo e($product->name_tr); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($product->quantity); ?></td>
                <td><?php echo e(config('cart.currency')); ?> <?php echo e($product->price); ?></td>
                <td><?php echo $__env->make('layouts.status', ['status' => $product->status], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                <td>
                    <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="post" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                            <?php if($admin->hasPermission('update-product')): ?><a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a><?php endif; ?>
                            <?php if($admin->hasPermission('delete-product')): ?><button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button><?php endif; ?>
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>