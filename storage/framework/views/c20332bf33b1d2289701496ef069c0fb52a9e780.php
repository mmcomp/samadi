<tr>
    <td>
        <?php if(isset($payment['name'])): ?>
            <?php echo e(ucwords($payment['name'])); ?>

        <?php else: ?>
            <p class="alert alert-danger">You need to have <strong>name</strong> key in your config</p>
        <?php endif; ?>
    </td>
    <td>
        <?php if(isset($payment['description'])): ?>
            <?php echo e($payment['description']); ?>

        <?php endif; ?>
    </td>
    <td>
        <?php if(isset($payment['name'])): ?>
            <form action="<?php echo e(route('checkout.execute')); ?>" method="post" class="pull-right" id="stripeForm">
                <input type="hidden" name="payment" value="<?php echo e(config('stripe.name')); ?>">
                <input type="hidden" name="stripeToken" value="">
                <input type="hidden" class="billing_address" name="billing_address" value="">
                <input type="hidden" class="delivery_address_id" name="delivery_address" value="">
                <input type="hidden" class="courier" name="courier" value="">
                <?php echo e(csrf_field()); ?>

                <button id="paywithstripe" class="btn btn-primary">Pay with <?php echo e(ucwords($payment['name'])); ?> <i class="fa fa-cc-stripe"></i></button>
            </form>
        <?php endif; ?>
    </td>
</tr>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(url('https://checkout.stripe.com/checkout.js')); ?>"></script>
    <script type="text/javascript">

        function setTotal(total, shippingCost) {
            let computed = +shippingCost + parseFloat(total);
            $('#total').html(computed.toFixed(2));
        }

        function setShippingFee(cost) {
            el = '#shippingFee';
            $(el).html(cost);
            $('#shippingFeeC').val(cost);
        }

        function setCourierDetails(courierId) {
            $('.courier_id').val(courierId);
        }

        $(document).ready(function () {

            let clicked = false;

            $('#sameDeliveryAddress').on('change', function () {
                clicked = !clicked;
                if (clicked) {
                    $('#sameDeliveryAddressRow').show();
                } else {
                    $('#sameDeliveryAddressRow').hide();
                }
            });

            let billingAddress = 'input[name="billing_address"]';
            $(billingAddress).on('change', function () {
                let chosenAddressId = $(this).val();
                $('.address_id').val(chosenAddressId);
                $('.delivery_address_id').val(chosenAddressId);
            });

            let deliveryAddress = 'input[name="delivery_address"]';
            $(deliveryAddress).on('change', function () {
                let chosenDeliveryAddressId = $(this).val();
                $('.delivery_address_id').val(chosenDeliveryAddressId);
            });

            let courier = 'input[name="courier"]';
            $(courier).on('change', function () {
                let shippingCost = $(this).data('cost');
                let total = $('#total').data('total');

                setCourierDetails($(this).val());
                setShippingFee(shippingCost);
                setTotal(total, shippingCost);
            });

            if ($(courier).is(':checked')) {
                let shippingCost = $(courier + ':checked').data('cost');
                let courierId = $(courier + ':checked').val();
                let total = $('#total').data('total');

                setShippingFee(shippingCost);
                setCourierDetails(courierId);
                setTotal(total, shippingCost);
            }

            let handler = StripeCheckout.configure({
                key: "<?php echo e(config('stripe.key')); ?>",
                locale: 'auto',
                token: function(token) {
                    // You can access the token ID with `token.id`.
                    // Get the token ID to your server-side code for use.
                    console.log(token.id);
                    $('input[name="stripeToken"]').val(token.id);
                    $('#stripeForm').submit();
                }
            });

            document.getElementById('paywithstripe').addEventListener('click', function(e) {
                let total = parseFloat("<?php echo e($total); ?>");
                let shipping = parseFloat($('#shippingFeeC').val());
                let amount = total + shipping;
                // Open Checkout with further options:
                handler.open({
                    name: "<?php echo e(config('stripe.name')); ?>",
                    description: "<?php echo e(config('stripe.description')); ?>",
                    currency: "<?php echo e(config('cart.currency')); ?>",
                    amount: amount * 100,
                    email: "<?php echo e($customer->email); ?>"
                });
                e.preventDefault();
            });

            // Close Checkout on page navigation:
            window.addEventListener('popstate', function() {
                handler.close();
            });
        });
    </script>
<?php $__env->stopSection(); ?>