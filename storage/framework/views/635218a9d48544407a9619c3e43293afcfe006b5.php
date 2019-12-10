<ul class="list-unstyled list-inline nav navbar-nav">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php if($category->children()->count() > 0): ?>
                <?php echo $__env->make('layouts.front.category-sub', ['subs' => $category->children], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <a <?php if(request()->segment(2) == $category->slug): ?> class="active" <?php endif; ?> href="<?php echo e(route('front.category.slug', $category->slug)); ?>"><?php echo e($category->name); ?> </a>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>