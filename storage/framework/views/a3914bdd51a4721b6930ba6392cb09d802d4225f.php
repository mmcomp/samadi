<?php $__env->startSection('content'); ?>
    <div class="container product-in-cart-list">
        <?php if(!$products->isEmpty()): ?>
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>"> <i class="fa fa-home"></i> <?php echo e(__('main.home')); ?></a></li>
                        <li class="active"><?php echo e(__('main.shoppingcart')); ?></li>
                    </ol>
                </div>
                <div class="col-md-12 content">
                    <div class="box-body">
                        <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <?php if(count($addresses) >= 0): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $__env->make('front.products.product-list-table', compact('products'), \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                        <?php if(isset($addresses) && count($addresses) > 0): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <legend><i class="fa fa-home"></i> Addresses</legend>
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Alias</th>
                                            <th>Address</th>
                                            <th>Billing Address</th>
                                            <th>Delivery Address</th>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($address->alias); ?></td>
                                                    <td>
                                                        <?php echo e($address->address_1); ?> <?php echo e($address->address_2); ?> <br />
                                                        <?php if(!is_null($address->province)): ?>
                                                            <?php echo e($address->city); ?> <?php echo e($address->province->name); ?> <br />
                                                        <?php endif; ?>
                                                        <?php echo e($address->city); ?> <?php echo e($address->state_code); ?> <br>
                                                        <?php echo e($address->country->name); ?> <?php echo e($address->zip); ?>

                                                    </td>
                                                    <td>
                                                        <label class="col-md-6 col-md-offset-3">
                                                        <input
                                                                    type="radio"
                                                                    value="<?php echo e($address->id); ?>"
                                                                    name="billing_address"
                                                                    <?php if($billingAddress->id == $address->id): ?> checked="checked"  <?php endif; ?>>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <?php if($billingAddress->id == $address->id): ?>
                                                            <label for="sameDeliveryAddress">
                                                                <input type="checkbox" id="sameDeliveryAddress" checked="checked"> Same as billing
                                                            </label>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tbody style="display: none" id="sameDeliveryAddressRow">
                                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($address->alias); ?></td>
                                                    <td>
                                                        <?php echo e($address->address_1); ?> <?php echo e($address->address_2); ?> <br />
                                                        <?php if(!is_null($address->province)): ?>
                                                            <?php echo e($address->city); ?> <?php echo e($address->province->name); ?> <br />
                                                        <?php endif; ?>
                                                        <?php echo e($address->city); ?> <?php echo e($address->state_code); ?> <br>
                                                        <?php echo e($address->country->name); ?> <?php echo e($address->zip); ?>

                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <label class="col-md-6 col-md-offset-3">
                                                            <input
                                                                    type="radio"
                                                                    value="<?php echo e($address->id); ?>"
                                                                    name="delivery_address"
                                                                    <?php if(old('') == $address->id): ?> checked="checked"  <?php endif; ?>>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!is_null($rates)): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <legend><i class="fa fa-truck"></i> Courier</legend>
                                    <ul class="list-unstyled">
                                        <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="col-md-4">
                                                <label class="radio">
                                                    <input type="radio" name="rate" data-fee="<?php echo e($rate->amount); ?>" value="<?php echo e($rate->object_id); ?>">
                                                </label>
                                                <img src="<?php echo e($rate->provider_image_75); ?>" alt="courier" class="img-thumbnail" /> <?php echo e($rate->currency); ?> <?php echo e($rate->amount); ?><br />
                                                <?php echo e($rate->servicelevel->name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div> <br>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-12">
                                <legend><i class="fa fa-credit-card"></i> <?php echo e(__('main.payment')); ?></legend>
                                <?php if(isset($payments) && !empty($payments)): ?>
                                    <table class="table table-striped">
                                        <thead>
                                        <th class="col-md-4"><?php echo e(__('main.name')); ?></th>
                                        <th class="col-md-4"><?php echo e(__('main.description')); ?></th>
                                        <th class="col-md-4 text-right"><?php echo e(__('main.choose_payment')); ?></th>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('layouts.front.payment-options', compact('payment', 'total', 'shipment'), \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p class="alert alert-danger">No payment method set</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <p class="alert alert-danger"><a href="<?php echo e(route('customer.address.create', [$customer->id])); ?>">No address found. You need to create an address first here.</a></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <p class="alert alert-warning">No products in cart yet. <a href="<?php echo e(route('home')); ?>">Show now!</a></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>