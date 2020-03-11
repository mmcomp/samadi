<tr>
    <td class="border-left">
        @php
        var_dump($payment);
        @endphp
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
        <!-- <form action="{{ route('checkout.store') }}" method="post" class="pull-right" id="wlletForm">
            {{ csrf_field() }}
            <input type="hidden" name="payment" value="{{ config('wallet.name') }}">
            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-success pull-right art-button">{{__('main.pay_with')}} {{ ucwords(__('main.' . $payment['name'])) }} <i class="fa fa-suitcase"></i></button>
        </form> -->
        <a href="/bank" class="btn btn-success pull-right art-button">{{__('main.pay_with')}} {{ ucwords(__('main.' . $payment['name'])) }} <i class="fa fa-suitcase"></i></a>
    </td>
</tr>
<script type="text/javascript">
    $(document).ready(function () {
    });
</script>