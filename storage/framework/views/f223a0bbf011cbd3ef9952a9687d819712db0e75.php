<?php $__env->startSection('content'); ?>
        <div class="container product-in-cart-list">
            <?php if(!$cartItems->isEmpty()): ?>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo e(route('home')); ?>"> <i class="fa fa-home"></i> <?php echo e(__('main.home')); ?></a></li>
                            <li class="active"><?php echo e(__('main.cart')); ?></li>
                        </ol>
                    </div>
                    <div class="col-md-12 content">
                        <div class="box-body">
                            <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <h3><i class="fa fa-cart-plus"></i> <?php echo e(__('main.shoppingcart')); ?></h3>
                        <table class="table table-striped">
                            <thead>
                                <th class="col-md-2 col-lg-2"><?php echo e(__('main.cover')); ?></th>
                                <th class="col-md-2 col-lg-5"><?php echo e(__('main.name')); ?></th>
                                <!-- <th class="col-md-2 col-lg-2">Quantity</th> -->
                                <th class="col-md-2 col-lg-1"></th>
                                <th class="col-md-2 col-lg-2"><?php echo e(__('main.price')); ?></th>
                            </thead>
                            <tfoot>
                            <tr>
                                <td class="bg-warning"><?php echo e(__('main.subtotal')); ?></td>
                                <td class="bg-warning"></td>
                                <!-- <td class="bg-warning"></td> -->
                                <td class="bg-warning"></td>
                                <td class="bg-warning"><?php echo e(config('cart.currency')); ?> <?php echo e(number_format($subtotal, 2, '.', ',')); ?></td>
                            </tr>
                            <?php if(isset($shippingFee) && $shippingFee != 0): ?>
                            <tr>
                                <td class="bg-warning">Shipping</td>
                                <td class="bg-warning"></td>
                                <!-- <td class="bg-warning"></td> -->
                                <td class="bg-warning"></td>
                                <td class="bg-warning"><?php echo e(config('cart.currency')); ?> <?php echo e($shippingFee); ?></td>
                            </tr>
                            <?php endif; ?>
                            <!--
                            <tr>
                                <td class="bg-warning">Tax</td>
                                <td class="bg-warning"></td> -->
                                <!-- <td class="bg-warning"></td> -->
                                <!--<td class="bg-warning"></td>
                                <td class="bg-warning"><?php echo e(config('cart.currency')); ?> <?php echo e(number_format($tax, 2)); ?></td>
                            </tr>
                            -->
                            <tr>
                                <td class="bg-success"><?php echo e(__('main.total')); ?></td>
                                <td class="bg-success"></td>
                                <!-- <td class="bg-success"></td> -->
                                <td class="bg-success"></td>
                                <td class="bg-success"><?php echo e(config('cart.currency')); ?> <?php echo e(number_format($total, 2, '.', ',')); ?></td>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('front.get.product', [$cartItem->product->slug])); ?>" class="hover-border">
                                            <?php if(isset($cartItem->cover)): ?>
                                                <img src="<?php echo e($cartItem->cover); ?>" alt="<?php echo e($cartItem->name); ?>" class="img-responsive img-thumbnail">
                                            <?php else: ?>
                                                <img src="https://placehold.it/120x120" alt="" class="img-responsive img-thumbnail">
                                            <?php endif; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <h3><?php echo e($cartItem->name); ?></h3>
                                        <?php if($cartItem->options->has('combination')): ?>
                                            <?php $__currentLoopData = $cartItem->options->combination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <small class="label label-primary"><?php echo e($option['value']); ?></small>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <div class="product-description">
                                            <?php echo $cartItem->product->description; ?>

                                        </div>
                                    </td>
                                    <!-- <td>
                                        <form action="<?php echo e(route('cart.update', $cartItem->rowId)); ?>" class="form-inline" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="_method" value="put">
                                            <div class="input-group">
                                                <input type="text" name="quantity" value="<?php echo e($cartItem->qty); ?>" class="form-control" />
                                                <span class="input-group-btn"><button class="btn btn-default">Update</button></span>
                                            </div>
                                        </form>
                                    </td> -->
                                    <td>
                                        <form action="<?php echo e(route('cart.destroy', $cartItem->rowId)); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="_method" value="delete">
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                    <td><?php echo e(config('cart.currency')); ?> <?php echo e(number_format($cartItem->price, 2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a href="<?php echo e(route('home')); ?>" class="btn btn-default"><?php echo e(__('main.continue_shopping')); ?></a>
                                    <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-primary"><?php echo e(__('main.go_to_checkout')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-warning"><?php echo e(__('main.no_products_in_cart')); ?> <a href="<?php echo e(route('home')); ?>"><?php echo e(__('main.shop_now')); ?></a></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .product-description {
            padding: 10px 0;
        }
        .product-description p {
            line-height: 18px;
            font-size: 14px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>