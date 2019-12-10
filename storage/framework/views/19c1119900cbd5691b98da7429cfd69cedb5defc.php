<?php $__env->startSection('content'); ?>
    <div class="container product-in-cart-list">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo e(route('home')); ?>"> <i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="col-md-12">
                <form action="<?php echo e(route('bank-transfer.store')); ?>" class="form-horizontal" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="col-md-6">
                        <h3>Review</h3>
                        <hr>
                        <ul class="list-unstyled">
                            <li>Items: <?php echo e(config('cart.currency_symbol')); ?> <?php echo e($subtotal); ?></li>
                            <li>Tax: <?php echo e(config('cart.currency_symbol')); ?> <?php echo e($tax); ?></li>
                            <li>Shipping Fee: <?php echo e(config('cart.currency_symbol')); ?> <?php echo e($shipping); ?></li>
                            <li>Total: <?php echo e(config('cart.currency_symbol')); ?> <?php echo e($total); ?></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <h3><?php echo e(config('bank-transfer.bank_name')); ?></h3>
                            <hr>
                            <p><?php echo e(config('bank-transfer.account_type')); ?></p>
                            <p><?php echo e(config('bank-transfer.account_name')); ?></p>
                            <p><?php echo e(config('bank-transfer.account_number')); ?></p>
                            <p><?php echo e(config('bank-transfer.bank_swift_code')); ?></p>
                            <p><small class="text-warning text">* <?php echo e(config('bank-transfer.note')); ?></small></p>
                            <hr>
                            <div class="btn-group">
                                <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-default">Back</a>
                                <button onclick="return confirm('Are you sure?')" class="btn btn-primary">Pay now with Bank Transfer</button>
                                <input type="hidden" id="billing_address" name="billing_address" value="<?php echo e($billingAddress); ?>">
                                <input type="hidden" name="shipment_obj_id" value="<?php echo e($shipmentObjId); ?>">
                                <input type="hidden" name="rate" value="<?php echo e($rateObjectId); ?>">
                                <?php if(request()->has('courier')): ?>
                                    <input type="hidden" name="courier" value="<?php echo e(request()->input('courier')); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>