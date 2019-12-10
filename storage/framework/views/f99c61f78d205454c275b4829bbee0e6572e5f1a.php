<div class="form-group"><br />
    <label for="weight">Weight </label>
    <div class="form-inline">
        <input type="text" class="form-control col-md-8" id="weight" name="weight" placeholder="0" value="<?php echo e(number_format($product->weight, 2)); ?>">
        <label for="mass_unit" class="sr-only">Mass unit</label>
        <select name="mass_unit" id="mass_unit" class="form-control col-md-4 select2">
            <?php $__currentLoopData = $weight_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($default_weight == $unit): ?> selected="selected" <?php endif; ?> value="<?php echo e($unit); ?>"><?php echo e($key); ?> - (<?php echo e($unit); ?>)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="clearfix"></div>
    <small class="text text-warning">optional</small>
</div>