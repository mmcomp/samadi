<tr>
    <td class="border-left">
        @if(isset($payment['name']))
            {{ ucwords(__('main.' . $payment['name'])) }}
        @else
            <p class="alert alert-danger">You need to have <strong>name</strong> key in your config</p>
        @endif
    </td>
    <td class="border-left">
        @if(isset($payment['description']))
            {{ __('main.' . $payment['description']) }}
        @endif
    </td>
    <td>
        <form action="{{ route('checkout.store') }}" method="post" class="pull-right" id="payPalForm">
            {{ csrf_field() }}
            <input type="hidden" name="payment" value="{{ config('paypal.name') }}">
            <input type="hidden" class="billing_address" name="billing_address" value="">
            <input type="hidden" class="delivery_address_id" name="delivery_address" value="">
            <input type="hidden" class="courier" name="courier" value="">
            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-success pull-right art-button">{{__('main.pay_with')}} {{ ucwords(__('main.' . $payment['name'])) }} <i class="fa fa-paypal"></i></button>
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