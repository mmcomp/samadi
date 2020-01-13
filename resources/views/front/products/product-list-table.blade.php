@if(!$products->isEmpty())
    <table class="table table-striped" cellspacing="0" style="width: 100%;font-size: 20px;">
        <thead>
        <th class="col-md-2 col-lg-2 border-left">{{__('main.cover')}}</th>
        <th class="col-md-2 col-lg-5 border-left">{{__('main.name')}}</th>
        <!-- <th class="col-md-2 col-lg-2 border-left">Quantity</th> -->
        <th class="col-md-2 col-lg-1 border-left"></th>
        <th class="col-md-2 col-lg-2">{{__('main.price')}}</th>
        </thead>
        <tfoot>
        <tr>
            <td class="bg-warning border-left">{{__('main.subtotal')}}</td>
            <td class="bg-warning border-left"></td>
            <!-- <td class="bg-warning border-left"></td> -->
            <td class="bg-warning border-left"></td>
            <td class="bg-warning">{{config('cart.currency')}} {{ number_format($subtotal, 2, '.', ',') }}</td>
        </tr>
        <!-- <tr>
            <td class="bg-warning">Shipping</td>
            <td class="bg-warning"></td>-->
            <!-- <td class="bg-warning"></td> -->
            <!--<td class="bg-warning"></td>
            <td class="bg-warning">{{config('cart.currency')}} <span id="shippingFee">{{ number_format(0, 2) }}</span></td>
        </tr> -->
        <!--
        <tr>
            <td class="bg-warning">Tax</td>
            <td class="bg-warning"></td>-->
            <!-- <td class="bg-warning"></td> -->
            <!--<td class="bg-warning"></td>
            <td class="bg-warning">{{config('cart.currency')}} {{ number_format($tax, 2) }}</td>
        </tr>
        -->
        <tr>
            <td class="bg-success">{{__('main.total')}}</td>
            <td class="bg-success"></td>
            <!-- <td class="bg-success"></td> -->
            <td class="bg-success border-left"></td>
            <td class="bg-success">{{config('cart.currency')}} <span id="grandTotal" data-total="{{ $total }}">{{ number_format($total, 2, '.', ',') }}</span></td>
        </tr>
        </tfoot>
        <tbody>
        @foreach($cartItems as $cartItem)
            <tr>
                <td class="border-left text-center">
                    <a href="{{ route('front.get.productid', [$cartItem->product->id]) }}" class="hover-border">
                        @if(isset($cartItem->cover))
                            <img src="{{$cartItem->cover}}" alt="{{ $cartItem->name }}" class="img-responsive img-thumbnail" style="height: 120px;">
                        @else
                            <img src="https://placehold.it/120x120" alt="" class="img-responsive img-thumbnail">
                        @endif
                    </a>
                </td>
                <td class="border-left">
                    <p>
                        <strong>{{ $cartItem->product->name_fa }}</strong> <br />
                        @if($cartItem->options->has('combination'))
                            @foreach($cartItem->options->combination as $option)
                                <!-- <small class="label label-primary">{{$option['value']}}</!-->
                            @endforeach
                        @endif
                    </p>
                    <hr>
                    <div class="product-description">
                        {!! $cartItem->product->description_fa !!}
                    </div>
                </td>
                <!-- <td>
                    <form action="{{ route('cart.update', $cartItem->rowId) }}" class="form-inline" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="input-group">
                            <input type="text" name="quantity" value="{{ $cartItem->qty }}" class="form-control" />
                            <span class="input-group-btn"><button class="btn btn-default">Update</button></span>
                        </div>
                    </form>
                </td> -->
                <td class="border-left text-center">
                    <form action="{{ route('cart.destroy', $cartItem->rowId) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger art-button"><i class="fa fa-times"></i></button>
                    </form>
                </td>
                <td>{{config('cart.currency')}} {{ number_format($cartItem->price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
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