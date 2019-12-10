<?php if(!$products->isEmpty()): ?>
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
        <!-- <tr>
            <td class="bg-warning">Shipping</td>
            <td class="bg-warning"></td>-->
            <!-- <td class="bg-warning"></td> -->
            <!--<td class="bg-warning"></td>
            <td class="bg-warning"><?php echo e(config('cart.currency')); ?> <span id="shippingFee"><?php echo e(number_format(0, 2)); ?></span></td>
        </tr> -->
        <!--
        <tr>
            <td class="bg-warning">Tax</td>
            <td class="bg-warning"></td>-->
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
            <td class="bg-success"><?php echo e(config('cart.currency')); ?> <span id="grandTotal" data-total="<?php echo e($total); ?>"><?php echo e(number_format($total, 2, '.', ',')); ?></span></td>
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
                    <p>
                        <strong><?php echo e($cartItem->name); ?></strong> <br />
                        <?php if($cartItem->options->has('combination')): ?>
                            <?php $__currentLoopData = $cartItem->options->combination; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <small class="label label-primary"><?php echo e($option['value']); ?></small>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </p>
                    <hr>
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
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {
        let courierRadioBtn = $('input[name="rate"]');
        courierRadioBtn.click(function () {
            $('#shippingFee').text($(this).data('fee'));
            let totalElement = $('span#grandTotal');
            let shippingFee = $(this).data('fee');
            let total = totalElement.data('total');
            let grandTotal = parseFloat(shippingFee) + parseFloat(total);
            totalElement.html(grandTotal.toFixed(2));
        });
    });
</script>