<?php $__env->startSection('og'); ?>
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="<?php echo e($product->{'name_' . $locale}); ?>"/>
    <meta property="og:description" content="<?php echo e(strip_tags($product->description)); ?>"/>
    <?php if(!is_null($product->cover)): ?>
        <meta property="og:image" content="<?php echo e(asset("storage/$product->cover")); ?>"/>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container product">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo e(route('home')); ?>"> <i class="fa fa-home"></i> <?php echo e(__('main.home')); ?></a></li>
                    <?php if(isset($category)): ?>
                    <li><a href="<?php echo e(route('front.category.slug', $category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endif; ?>
                    <li class="active">Product</li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('layouts.front.product', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>