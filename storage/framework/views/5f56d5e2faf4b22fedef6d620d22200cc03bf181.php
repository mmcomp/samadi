<?php $__env->startSection('og'); ?>
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="<?php echo e(config('app.name')); ?>"/>
    <meta property="og:description" content="<?php echo e(config('app.name')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.front.home-slider', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if($cat1->products->isNotEmpty()): ?>
        <section class="new-product t100 home">
            <div class="container">
                <div class="section-title b50">
                    <h2><?php echo e($cat1->{'name_' . $locale}); ?></h2>
                </div>
                <?php echo $__env->make('front.products.product-list', ['products' => $cat1->products->where('status', 1)], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div id="browse-all-btn"> <a class="btn btn-default browse-all-btn" href="<?php echo e(route('front.category.slug', $cat1->slug)); ?>" role="button"><?php echo e(__('main.browse_all_items')); ?></a></div>
            </div>
        </section>
    <?php endif; ?>
    <hr>
    <?php if($cat2->products->isNotEmpty()): ?>
        <div class="container">
            <div class="section-title b100">
                <h2><?php echo e($cat2->{'name_' . $locale}); ?></h2>
            </div>
            <?php echo $__env->make('front.products.product-list', ['products' => $cat2->products->where('status', 1)], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div id="browse-all-btn"> <a class="btn btn-default browse-all-btn" href="<?php echo e(route('front.category.slug', $cat2->slug)); ?>" role="button"><?php echo e(__('main.browse_all_items')); ?></a></div>
        </div>
    <?php endif; ?>
    <hr />

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>