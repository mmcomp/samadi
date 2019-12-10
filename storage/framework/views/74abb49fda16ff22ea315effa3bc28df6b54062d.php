<?php if(isset($payment['name'])): ?>
    <?php if($payment['name'] == config('stripe.name')): ?>
        <?php echo $__env->make('front.payments.stripe', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php elseif($payment['name'] == config('paypal.name')): ?>
        <?php echo $__env->make('front.payments.paypal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php elseif($payment['name'] == config('bank-transfer.name')): ?>
        <?php echo $__env->make('front.payments.bank-transfer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php endif; ?>