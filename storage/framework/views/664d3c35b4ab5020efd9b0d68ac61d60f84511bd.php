<ul class="nav sidebar-menu">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($category->children()->count() > 0): ?>
            <li><?php echo $__env->make('layouts.front.category-sidebar-sub', ['subs' => $category->children], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></li>
        <?php else: ?>
            <li <?php if(request()->segment(2) == $category->slug): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('front.category.slug', $category->slug)); ?>"><?php echo e($category->name); ?></a></li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>