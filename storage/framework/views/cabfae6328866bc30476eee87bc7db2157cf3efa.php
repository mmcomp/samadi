<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="box">
            <form action="<?php echo e(route('admin.products.store')); ?>" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    <?php echo e(csrf_field()); ?>

                    <div class="col-md-8">
                        <h2>Product</h2>
                        <div class="form-group">
                            <label for="sku">SKU <span class="text-danger">*</span></label>
                            <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control" value="<?php echo e(old('sku')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="name_fa">Name Farsi<span class="text-danger">*</span></label>
                            <input type="text" name="name_fa" id="name_fa" placeholder="Name" class="form-control" value="<?php echo e(old('name_fa')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="name_en">Name English<span class="text-danger">*</span></label>
                            <input type="text" name="name_en" id="name_en" placeholder="Name" class="form-control" value="<?php echo e(old('name_en')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="name_ar">Name Arabic<span class="text-danger">*</span></label>
                            <input type="text" name="name_ar" id="name_ar" placeholder="Name" class="form-control" value="<?php echo e(old('name_ar')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="name_tr">Name Turkey<span class="text-danger">*</span></label>
                            <input type="text" name="name_tr" id="name_tr" placeholder="Name" class="form-control" value="<?php echo e(old('name_tr')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="description_fa">Description Farsi</label>
                            <textarea class="form-control" name="description_fa" id="description_fa" rows="5" placeholder="Description"><?php echo e(old('description_fa')); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Description English</label>
                            <textarea class="form-control" name="description_en" id="description_en" rows="5" placeholder="Description"><?php echo e(old('description_en')); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_ar">Description Arabic</label>
                            <textarea class="form-control" name="description_ar" id="description_ar" rows="5" placeholder="Description"><?php echo e(old('description_ar')); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_tr">Description Turkey</label>
                            <textarea class="form-control" name="description_tr" id="description_tr" rows="5" placeholder="Description"><?php echo e(old('description_tr')); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover </label>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Images</label>
                            <input type="file" name="image[]" id="image" class="form-control" multiple>
                            <small class="text-warning">You can use ctr (cmd) to select multiple images</small>
                        </div>
                        <!-- <div class="form-group">
                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="<?php echo e(old('quantity')); ?>">
                        </div> -->
                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">PHP</span>
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="<?php echo e(old('price')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file_path">File <span class="text-danger">*</span></label>
                            <input type="file" name="file_path" id="file_path" placeholder="File" class="form-control">
                        </div>
                        <?php if(!$brands->isEmpty()): ?>
                        <div class="form-group">
                            <label for="brand_id">Brand </label>
                            <select name="brand_id" id="brand_id" class="form-control select2">
                                <option value=""></option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('brand_id') == $brand->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php endif; ?>
                        <?php echo $__env->make('admin.shared.status-select', ['status' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        
                    </div>
                    <div class="col-md-4">
                        <h2>Categories</h2>
                        <?php echo $__env->make('admin.shared.categories', ['categories' => $categories, 'selectedIds' => []], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>