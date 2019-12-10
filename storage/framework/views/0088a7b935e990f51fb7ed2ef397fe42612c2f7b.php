<tr>
    <td>
        <?php if(isset($payment['name'])): ?>
            <?php echo e(ucwords(__('main.' . $payment['name']))); ?>

        <?php else: ?>
            <p class="alert alert-danger">You need to have <strong>name</strong> key in your config</p>
        <?php endif; ?>
    </td>
    <td>
        <?php if(isset($payment['description'])): ?>
            <?php echo e(__('main.' . $payment['description'])); ?>

        <?php endif; ?>
    </td>
    <td>
        <form action="<?php echo e(route('checkout.store')); ?>" method="post" class="pull-right" id="payPalForm">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="payment" value="<?php echo e(config('paypal.name')); ?>">
            <input type="hidden" class="billing_address" name="billing_address" value="">
            <input type="hidden" class="delivery_address_id" name="delivery_address" value="">
            <input type="hidden" class="courier" name="courier" value="">
            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-success pull-right"><?php echo e(__('main.pay_with')); ?> <?php echo e(ucwords(__('main.' . $payment['name']))); ?> <i class="fa fa-paypal"></i></button>
        </form>
    </td>
</tr>
<script type="text/javascript">
    $(document).ready(function () {
        let billingAddressId = $('input[name="billing_address"]').val();
        $('.billing_address').val(billingAddressId);

        let courierRadioBtn = $('input[name="rate"]');
        courierRadioBtn.click(function () {
            $('.rate').val($(this).val())
        });
    });
</script>