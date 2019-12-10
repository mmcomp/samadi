<h2>Make combinations</h2>
<div class="form-group">
    <ul class="list-unstyled attribute-lists">
        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <label for="attribute<?php echo e($attribute->id); ?>" class="checkbox-inline">
                    <?php echo e($attribute->name); ?>

                    <input name="attribute[]" class="attribute" type="checkbox" id="attribute<?php echo e($attribute->id); ?>" value="<?php echo e($attribute->id); ?>">
                </label>

                <label for="attributeValue<?php echo e($attribute->id); ?>" style="display: none; visibility: hidden"></label>
                <?php if(!$attribute->values->isEmpty()): ?>
                    <select name="attributeValue[]" id="attributeValue<?php echo e($attribute->id); ?>" class="form-control select2" style="width: 100%" disabled>
                        <?php $__currentLoopData = $attribute->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($attr->id); ?>"><?php echo e($attr->value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<div class="form-group">
    <label for="productAttributeQuantity">Quantity <span class="text text-danger">*</span></label>
    <input type="text" name="productAttributeQuantity" id="productAttributeQuantity" class="form-control" placeholder="Set quantity" disabled>
</div>
<div class="form-group">
    <label for="productAttributePrice">Price</label>
    <div class="input-group">
        <span class="input-group-addon"><?php echo e(config('cart.currency')); ?></span>
        <input type="text" name="productAttributePrice" id="productAttributePrice" class="form-control" placeholder="Price" disabled>
    </div>
</div>
<div class="form-group">
    <label for="salePrice">Sale Price</label>
    <div class="input-group">
        <span class="input-group-addon"><?php echo e(config('cart.currency')); ?></span>
        <input type="text" name="salePrice" id="salePrice" class="form-control" placeholder="Sale Price" disabled>
    </div>
</div>
<div class="form-group">
    <label for="default">Show as default price?</label> <br />
    <select name="default" id="default" class="form-control select2">
        <option value="0" selected="selected">No</option>
        <option value="1">Yes</option>
    </select>
</div>
<div class="box-footer">
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-default" onclick="backToInfoTab()">Back</button>
        <button id="createCombinationBtn" type="submit" class="btn btn-sm btn-primary" disabled="disabled">Create combination</button>
    </div>
</div>