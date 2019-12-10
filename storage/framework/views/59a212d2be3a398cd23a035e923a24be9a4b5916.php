<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="box-body">
                <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-md-12">
                <h2> <i class="fa fa-home"></i> My Account</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" <?php if(request()->input('tab') == 'profile'): ?> class="active" <?php endif; ?>><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                        <li role="presentation" <?php if(request()->input('tab') == 'orders'): ?> class="active" <?php endif; ?>><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>
                        <li role="presentation" <?php if(request()->input('tab') == 'address'): ?> class="active" <?php endif; ?>><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Addresses</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content customer-order-list">
                        <div role="tabpanel" class="tab-pane <?php if(request()->input('tab') == 'profile'): ?>active <?php endif; ?>" id="profile">
                            <?php echo e($customer->name); ?> <br /><small><?php echo e($customer->email); ?></small>
                        </div>
                        <div role="tabpanel" class="tab-pane <?php if(request()->input('tab') == 'orders'): ?>active <?php endif; ?>" id="orders">
                            <?php if(!$orders->isEmpty()): ?>
                                <table class="table">
                                <tbody>
                                <tr>
                                    <td>Date</td>
                                    <td>Total</td>
                                    <td>Status</td>
                                </tr>
                                </tbody>
                                <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a data-toggle="modal" data-target="#order_modal_<?php echo e($order['id']); ?>" title="Show order" href="javascript: void(0)"><?php echo e(date('M d, Y h:i a', strtotime($order['created_at']))); ?></a>
                                            <!-- Button trigger modal -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="order_modal_<?php echo e($order['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="MyOrders">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Reference #<?php echo e($order['reference']); ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <th>Address</th>
                                                                    <th>Payment Method</th>
                                                                    <th>Total</th>
                                                                    <th>Status</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <address>
                                                                                <strong><?php echo e($order['address']->alias); ?></strong><br />
                                                                                <?php echo e($order['address']->address_1); ?> <?php echo e($order['address']->address_2); ?><br>
                                                                            </address>
                                                                        </td>
                                                                        <td><?php echo e($order['payment']); ?></td>
                                                                        <td><?php echo e(config('cart.currency_symbol')); ?> <?php echo e($order['total']); ?></td>
                                                                        <td><p class="text-center" style="color: #ffffff; background-color: <?php echo e($order['status']->color); ?>"><?php echo e($order['status']->name); ?></p></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="label <?php if($order['total'] != $order['total_paid']): ?> label-danger <?php else: ?> label-success <?php endif; ?>"><?php echo e(config('cart.currency')); ?> <?php echo e($order['total']); ?></span></td>
                                        <td><p class="text-center" style="color: #ffffff; background-color: <?php echo e($order['status']->color); ?>"><?php echo e($order['status']->name); ?></p></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                                <?php echo e($orders->links()); ?>

                            <?php else: ?>
                                <p class="alert alert-warning">No orders yet. <a href="<?php echo e(route('home')); ?>">Shop now!</a></p>
                            <?php endif; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane <?php if(request()->input('tab') == 'address'): ?>active <?php endif; ?>" id="address">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo e(route('customer.address.create', auth()->user()->id)); ?>" class="btn btn-primary">Create your address</a>
                                </div>
                            </div>
                            <?php if(!$addresses->isEmpty()): ?>
                                <table class="table">
                                <thead>
                                    <th>Alias</th>
                                    <th>Address 1</th>
                                    <th>Address 2</th>
                                    <th>City</th>
                                    <?php if(isset($address->province)): ?>
                                    <th>Province</th>
                                    <?php endif; ?>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Zip</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($address->alias); ?></td>
                                            <td><?php echo e($address->address_1); ?></td>
                                            <td><?php echo e($address->address_1); ?></td>
                                            <td><?php echo e($address->city); ?></td>
                                            <?php if(isset($address->province)): ?>
                                            <td><?php echo e($address->province->name); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($address->state_code); ?></td>
                                            <td><?php echo e($address->country->name); ?></td>
                                            <td><?php echo e($address->zip); ?></td>
                                            <td><?php echo e($address->phone); ?></td>
                                            <td>
                                                <form method="post" action="<?php echo e(route('customer.address.destroy', [auth()->user()->id, $address->id])); ?>" class="form-horizontal">
                                                    <div class="btn-group">
                                                        <input type="hidden" name="_method" value="delete">
                                                        <?php echo e(csrf_field()); ?>

                                                        <a href="<?php echo e(route('customer.address.edit', [auth()->user()->id, $address->id])); ?>" class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
                                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <br /> <p class="alert alert-warning">No address created yet.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>