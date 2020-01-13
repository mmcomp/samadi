@extends('layouts.front.app')

@section('og')
<meta property="og:type" content="home" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:description" content="{{ config('app.name') }}" />
@endsection

@section('css')
<link rel="stylesheet" href="/css/product-detail-style.css" media="screen">
<!--[if lte IE 7]><link rel="stylesheet" href="/css/mainpage100style.ie7.css" media="screen" /><![endif]-->
<link rel="stylesheet" href="/css/product-detail-style.responsive.css" media="all">
@endsection

@section('head')
<style>
  .art-content .art-postcontent-0 .layout-item-0 {
    color: #4A4A4A;
    background: #FFFFFF;
    border-collapse: separate;
  }

  .art-content .art-postcontent-0 .layout-item-1 {
    color: #4A4A4A;
  }

  .art-content .art-postcontent-0 .layout-item-2 {
    color: #454545;
    background: #FFFFFF url('/images/19f9e.png') top center no-repeat scroll;
  }

  .art-content .art-postcontent-0 .layout-item-3 {
    color: #454545;
    padding: 25px;
  }

  .art-content .art-postcontent-0 .layout-item-4 {
    color: #4A4A4A;
    padding: 0px;
  }

  .art-content .art-postcontent-0 .layout-item-5 {
    color: #4A4A4A;
    background: #FFFFFF;
    border-spacing: 3px 0px;
    border-collapse: separate;
  }

  .art-content .art-postcontent-0 .layout-item-6 {
    color: #4A4A4A;
    padding: 5px;
  }

  .art-content .art-postcontent-0 .layout-item-7 {
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-width: 0px;
    border-top-color: #A6A6A6;
    border-right-color: #A6A6A6;
    border-bottom-color: #A6A6A6;
    border-left-color: #A6A6A6;
    color: #F2F2F2;
    background: ;
    border-collapse: separate;
  }

  .art-content .art-postcontent-0 .layout-item-8 {
    color: #F2F2F2;
    padding: 25px;
  }

  .art-content .art-postcontent-0 .layout-item-9 {
    color: #454545;
    background: #FFFFFF url('images/6f9ee.png') top center no-repeat scroll;
    border-collapse: separate;
  }

  .art-content .art-postcontent-0 .layout-item-10 {
    color: #F2F2F2;
    background: ;
    border-spacing: 3px 0px;
    border-collapse: separate;
  }

  .art-content .art-postcontent-0 .layout-item-11 {
    color: #F2F2F2;
    padding: 15px;
  }

  .art-content .art-postcontent-0 .layout-item-12 {
    color: #F2F2F2;
    padding: 5px;
  }

  .art-content .art-postcontent-0 .layout-item-13 {
    color: #454545;
    background: #FFFFFF url('images/7463d.png') top center no-repeat scroll;
    border-spacing: 3px 0px;
    border-collapse: separate;
  }

  .art-content .art-postcontent-0 .layout-item-14 {
    color: #454545;
    background: #FFFFFF url('images/178ac.png') top center no-repeat scroll;
    border-spacing: 3px 0px;
    border-collapse: separate;
  }

  .ie7 .art-post .art-layout-cell {
    border: none !important;
    padding: 0 !important;
  }

  .ie6 .art-post .art-layout-cell {
    border: none !important;
    padding: 0 !important;
  }

  table td {
    border-top: solid 1px #000;
  }
  .border-left{
    border-left: solid 1px #000;
  }
  .text-center{
      text-align: center !important;
  }
</style>
@endsection

@section('js')
<script>

</script>
@endsection

@section('extra_footer')
@endsection

@section('content')
    <div class="container product-in-cart-list">
        @if(!$products->isEmpty())
            <div class="row">
                <!-- <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> {{__('main.home')}}</a></li>
                        <li class="active">{{__('main.shoppingcart')}}</li>
                    </ol>
                </div> -->
                <div class="col-md-12 content">
                    <div class="box-body">
                        @include('layouts.errors-and-messages')
                    </div>
                    @if(count($addresses) >= 0)
                        <div class="row">
                            <div class="col-md-12" style="padding: 10px;">
                                @include('front.products.product-list-table', compact('products'))
                            </div>
                        </div>
                        @if(isset($addresses) && count($addresses) > 0)
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
                                            @foreach($addresses as $key => $address)
                                                <tr>
                                                    <td>{{ $address->alias }}</td>
                                                    <td>
                                                        {{ $address->address_1 }} {{ $address->address_2 }} <br />
                                                        @if(!is_null($address->province))
                                                            {{ $address->city }} {{ $address->province->name }} <br />
                                                        @endif
                                                        {{ $address->city }} {{ $address->state_code }} <br>
                                                        {{ $address->country->name }} {{ $address->zip }}
                                                    </td>
                                                    <td>
                                                        <label class="col-md-6 col-md-offset-3">
                                                        <input
                                                                    type="radio"
                                                                    value="{{ $address->id }}"
                                                                    name="billing_address"
                                                                    @if($billingAddress->id == $address->id) checked="checked"  @endif>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        @if($billingAddress->id == $address->id)
                                                            <label for="sameDeliveryAddress">
                                                                <input type="checkbox" id="sameDeliveryAddress" checked="checked"> Same as billing
                                                            </label>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody style="display: none" id="sameDeliveryAddressRow">
                                            @foreach($addresses as $key => $address)
                                                <tr>
                                                    <td>{{ $address->alias }}</td>
                                                    <td>
                                                        {{ $address->address_1 }} {{ $address->address_2 }} <br />
                                                        @if(!is_null($address->province))
                                                            {{ $address->city }} {{ $address->province->name }} <br />
                                                        @endif
                                                        {{ $address->city }} {{ $address->state_code }} <br>
                                                        {{ $address->country->name }} {{ $address->zip }}
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <label class="col-md-6 col-md-offset-3">
                                                            <input
                                                                    type="radio"
                                                                    value="{{ $address->id }}"
                                                                    name="delivery_address"
                                                                    @if(old('') == $address->id) checked="checked"  @endif>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        @if(!is_null($rates))
                            <div class="row">
                                <div class="col-md-12">
                                    <legend><i class="fa fa-truck"></i> Courier</legend>
                                    <ul class="list-unstyled">
                                        @foreach($rates as $rate)
                                            <li class="col-md-4">
                                                <label class="radio">
                                                    <input type="radio" name="rate" data-fee="{{ $rate->amount }}" value="{{ $rate->object_id }}">
                                                </label>
                                                <img src="{{ $rate->provider_image_75 }}" alt="courier" class="img-thumbnail" /> {{ $rate->currency }} {{ $rate->amount }}<br />
                                                {{ $rate->servicelevel->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <br>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <legend style='font-size: 25px;'><i class="fa fa-credit-card"></i> {{__('main.payment')}}</legend>
                                @if(isset($payments) && !empty($payments))
                                    <table class="table table-striped" style='font-size: 25px;'>
                                        <thead>
                                        <th class="col-md-4 border-left">{{__('main.name')}}</th>
                                        <th class="col-md-4 border-left">{{__('main.description')}}</th>
                                        <th class="col-md-4 text-right">{{__('main.choose_payment')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($payments as $payment)
                                            @include('layouts.front.payment-options', compact('payment', 'total', 'shipment'))
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="alert alert-danger">No payment method set</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="alert alert-danger"><a href="{{ route('customer.address.create', [$customer->id]) }}">No address found. You need to create an address first here.</a></p>
                    @endif
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <p class="alert alert-warning">No products in cart yet. <a href="{{ route('home') }}">Show now!</a></p>
                </div>
            </div>
        @endif
    </div>
@endsection