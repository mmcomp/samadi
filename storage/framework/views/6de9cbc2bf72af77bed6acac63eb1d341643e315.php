<?php $__env->startSection('og'); ?>
    <meta property="og:type" content="category"/>
    <meta property="og:title" content="<?php echo e($category->name); ?>"/>
    <meta property="og:description" content="<?php echo e($category->description); ?>"/>
    <?php if(!is_null($category->cover)): ?>
        <meta property="og:image" content="<?php echo e(asset("storage/$category->cover")); ?>"/>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <hr>
        <div class="row">
            <div class="category-top col-md-12">
                <h2><?php echo e($category->name); ?></h2>
                <?php echo $category->description; ?>

            </div>
        </div>
        <hr>
        <div class="col-md-3">
            <?php echo $__env->make('front.categories.sidebar-category', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="category-image">
                    <?php if(isset($category->cover)): ?>
                        <img src="<?php echo e(asset("storage/$category->cover")); ?>" alt="<?php echo e($category->name); ?>" class="img-responsive" />
                    <?php else: ?>
                        <img src="https://placehold.it/1200x200" alt="<?php echo e($category->cover); ?>" class="img-responsive" />
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <?php echo $__env->make('front.products.product-list', ['products' => $products], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>