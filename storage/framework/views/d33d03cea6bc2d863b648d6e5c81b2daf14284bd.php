<ul class="list-unstyled">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <div class="checkbox">
                <label>
                    <input
                            type="checkbox"
                            <?php if(isset($selectedIds) && in_array($category->id, $selectedIds)): ?>checked="checked" <?php endif; ?>
                            name="categories[]"
                            value="<?php echo e($category->id); ?>">
                    <?php echo e($category->name_fa); ?>

                </label>
            </div>
        </li>
        <?php if($category->children->count() >= 1): ?>
            <?php echo $__env->make('admin.shared.category-children', ['categories' => $category->children, 'selectedIds' => $selectedIds], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>