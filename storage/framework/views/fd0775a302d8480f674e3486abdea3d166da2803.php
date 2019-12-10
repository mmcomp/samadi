<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Default box -->
        <?php if($categories): ?>
            <div class="box">
                <div class="box-body">
                    <h2>Categories</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-3">Name Farsi</td>
                                <td class="col-md-3">Name English</td>
                                <td class="col-md-3">Name Arabic</td>
                                <td class="col-md-3">Name Turkey</td>
                                <td class="col-md-3">Cover</td>
                                <td class="col-md-3">Status</td>
                                <td class="col-md-3">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.categories.show', $category->id)); ?>"><?php echo e($category->name_fa); ?></a></td>
                                <td>
                                    <a href="<?php echo e(route('admin.categories.show', $category->id)); ?>"><?php echo e($category->name_en); ?></a></td>
                                <td>
                                    <a href="<?php echo e(route('admin.categories.show', $category->id)); ?>"><?php echo e($category->name_ar); ?></a></td>
                                <td>
                                    <a href="<?php echo e(route('admin.categories.show', $category->id)); ?>"><?php echo e($category->name_tr); ?></a></td>
                                <td>
                                    <?php if(isset($category->cover)): ?>
                                        <img src="<?php echo e(asset("storage/$category->cover")); ?>" alt="" class="img-responsive">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $__env->make('layouts.status', ['status' => $category->status], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="post" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($categories->links()); ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        <?php endif; ?>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>