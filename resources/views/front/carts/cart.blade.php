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
</style>
@endsection

@section('js')
<script>

</script>
@endsection

@section('extra_footer')
@endsection

@section('content')
<div class="art-content-layout layout-item-0">
    <div class="art-content-layout-row">
        <div class="container product-in-cart-list">
            @if(!$cartItems->isEmpty())
                <div class="row">
                    <!-- <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> {{__('main.home')}}</a></li>
                            <li class="active">{{__('main.cart')}}</li>
                        </ol>
                    </div> -->
                    <div class="col-md-12 content" style="padding: 10px;">
                        <div class="box-body">
                            @include('layouts.errors-and-messages')
                        </div>
                        <h1 class="text-right"><i class="fa fa-cart-plus"></i> {{__('main.shoppingcart')}}</h1>
                        <table class="table table-striped" cellspacing="0" style="width: 100%;font-size: 20px;">
                            <thead>
                                <th class="text-center border-left">{{__('main.cover')}}</th>
                                <th class="col-md-2 col-lg-5 text-right border-left">{{__('main.name')}}</th>
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
                            @if(isset($shippingFee) && $shippingFee != 0)
                            <tr>
                                <td class="bg-warning border-left">Shipping</td>
                                <td class="bg-warning border-left"></td>
                                <!-- <td class="bg-warning border-left"></td> -->
                                <td class="bg-warning border-left"></td>
                                <td class="bg-warning">{{config('cart.currency')}} {{ $shippingFee }}</td>
                            </tr>
                            @endif
                            <!--
                            <tr>
                                <td class="bg-warning">Tax</td>
                                <td class="bg-warning"></td> -->
                                <!-- <td class="bg-warning"></td> -->
                                <!--<td class="bg-warning"></td>
                                <td class="bg-warning">{{config('cart.currency')}} {{ number_format($tax, 2) }}</td>
                            </tr>
                            -->
                            <tr>
                                <td class="bg-success border-left">{{__('main.total')}}</td>
                                <td class="bg-success border-left"></td>
                                <!-- <td class="bg-success border-left"></td> -->
                                <td class="bg-success border-left"></td>
                                <td class="bg-success">{{config('cart.currency')}} {{ number_format($total, 2, '.', ',') }}</td>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($cartItems as $cartItem)
                                <tr>
                                    <td class="text-right border-left width="20%">
                                        <a href="{{ route('front.get.productid', [$cartItem->product->id]) }}" class="hover-border">
                                            @if(isset($cartItem->cover))
                                                <img src="{{$cartItem->cover}}" alt="{{ $cartItem->name_fa }}" class="img-responsive img-thumbnail" style="height: 120px;" >
                                            @else
                                                <img src="https://placehold.it/120x120" alt="" class="img-responsive img-thumbnail">
                                            @endif
                                        </a>
                                    </td>
                                    <td class="text-right border-left">
                                        <h3>{{ $cartItem->product->{'name_' . $locale} }}</h3>
                                        @if($cartItem->options->has('combination'))
                                            @foreach($cartItem->options->combination as $option)
                                                <small class="label label-primary">{{$option['value']}}</small>
                                            @endforeach
                                        @endif
                                        <div class="product-description">
                                            {!! $cartItem->product->description !!}
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
                                    <td class="text-center border-left">
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
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('home') }}" class="btn btn-default art-button">{{__('main.continue_shopping')}}</a>
                                    <a href="{{ route('checkout.index') }}" class="btn btn-primary art-button">{{__('main.go_to_checkout')}}</a>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-warning"><h1>{{__('main.no_products_in_cart')}} <a href="{{ route('home') }}">{{__('main.shop_now')}}</a></h1></p>
                    </div>
                </div>
            @endif
        </div>
@endsection
@section('css')
    <style type="text/css">
        .product-description {
            padding: 10px 0;
        }
        .product-description p {
            line-height: 18px;
            font-size: 14px;
        }
    </style>
@endsection