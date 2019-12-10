<?php $__env->startSection('content'); ?>
    <div class="container">
        <hr>
        <div class="row">
            <div class="category-top col-md-12">
                <h2>Search Results</h2>
            </div>
        </div>
        <hr>
        <div class="col-md-3">
            <?php echo $__env->make('front.categories.sidebar-category', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php echo $__env->make('front.products.product-list', ['products' => $products], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>