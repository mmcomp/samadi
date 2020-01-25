@extends('layouts.front.app')

@section('og')
<meta property="og:type" content="home" />
<meta property="og:site_name" content="طراحی طلا و جواهرات با نرم افزار ماتریکس و راینو" />
<meta property="og:title" content="{{ $product->{'name_' . $locale} }},{{ $category->{'name_' . $locale} }}" />
<meta property="og:description" content="{{ config('app.name') }}" />
@endsection

@section('meta_description')
<meta name="description" content="{{ $product->{'name_' . $locale} }},{{ $category->{'name_' . $locale} }},طراحی جواهرات با نرم افزار ماتریکس و راینو، خرید و فروش فایل طلا و جواهر مدل" />
<meta name="Keywords" content="{{ $product->{'name_' . $locale} }},{{ $category->{'name_' . $locale} }},طراحی انلاین فایل ماتریکس راینو" />
@endsection

@section('title')
{{ $product->{'name_' . $locale} }} - {{ $category->{'name_' . $locale} }}
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

  .similar-img {
    margin: 0 0 0 0;
    height: 300px;
    width: 300px;
    padding: 0px;
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
<div class="art-layout-cell art-sidebar1">
  <div class="art-block clearfix">
    <div class="art-blockheader">
      <h3 class="t">{{__('product.product_price_purchase')}}</h3>
    </div>
    <div class="art-blockcontent">
      <hr>
      @if($product->sale_price!=null && (int)$product->sale_price>0)
      <p style="text-align: center;">
        <span style="font-size: 20px; color: #000000;">
          <strike>
            {{ $product->price }}&nbsp;{{__('product.tooman')}}
          </strike>
        </span>
      </p>
      <p style="text-align: center;">
        <span style="font-size: 20px; color: #D50B15;">
        {{ $product->sale_price }} &nbsp;{{__('product.tooman')}}
        </span>
      </p>
      @else
      <p style="text-align: center;">
        <span style="font-size: 20px; color: #D50B15;">
        {{ $product->price }} &nbsp;{{__('product.tooman')}}
        </span>
      </p>
      @endif
      <p style="text-align: center;"><span style="color: rgb(213, 11, 21); font-size: 5px;"><br></span></p>
      <p style="text-align: center;">
        &nbsp;
        <form action="{{ route('product.bookmark') }}" method="post" style="text-align: center;">
          {{ csrf_field() }}
          <input type="hidden" name="product" value="{{ $product->id }}" />
          @if($customerBookmark)
          <button  class="art-button"><i class="fa fa-bookmark" style="color: blue;"></i></button>
          @else
          <button class="art-button"><i class="fa fa-bookmark" style="color: #fff;"></i></button>
          @endif
        </form>        
        <form action="{{ route('product.like') }}" method="post" style="text-align: center;">
          {{ csrf_field() }}
          <input type="hidden" name="product" value="{{ $product->id }}" />
          <button  class="art-button"><i class="fa fa-heart" style="color: red;"> {{ $product->like_count }}</i></button>
        </form>
        @if($product->price<=0)
        <p style="text-align: center;">
        <a class="art-button" href="/storage/{{ $product->file_path }}">{{__('product.download')}}</a>
        </p>
        @else
        <form action="{{ route('cart.add') }}" method="post" style="text-align: center;">
          {{ csrf_field() }}
          <input type="hidden" name="product" value="{{ $product->id }}" />
          <button accesskey="{{__('product.purchase_product')}}" class="art-button">{{__('product.purchase_product')}}</button>
        </form>
        @endif
        &nbsp;
        <span style="font-size: 20px; color: #D50B15;"><br></span>
      </p>
      <p style="text-align: center;"><span style="font-size: 20px; color: #D50B15;"></span></p>
    </div>
  </div>
  @if(isset($owner->id))
  <div class="art-block clearfix">
    <div class="art-blockheader">
      <h3 class="t">{{__('product.name_star_customer')}}</h3>
    </div>
    <div class="art-blockcontent">
      <hr>
      <p style="text-align: center;">
        <img width="119" height="119" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px;" alt="" class="art-lightbox" src="/storage/{{ $owner->image_path }}">
        <span style="font-size: 20px; color: #43686B;">
          <br>
        </span>
      </p>
      <p style="text-align: center;">
        <span style="color: rgb(67, 104, 107); font-size: 15px;">
          {{ $owner->name }} {{ $owner->sir_name }}
        </span>
      </p>
      <p style="text-align: center;">
        <img width="120" height="32" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px;" alt="" class="art-lightbox" src="/images/5-stars.png">
        <span style="color: #C70A14; font-size: 48px;">
          <br>
        </span>
      </p>
    </div>
  </div>
  @endif
</div>
<div class="art-layout-cell art-content">
  <article class="art-post art-article">
    <div class="art-postcontent art-postcontent-0 clearfix">
      <div class="art-content-layout layout-item-0">
        <div class="art-content-layout-row">
          <div class="art-layout-cell layout-item-1" style="width: 100%">
            <p style="text-align: center;border-radius: 10px;">
              <!-- <img width="90%" height="300px" alt="" class="art-lightbox" src="/images/x.jpg" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px;"> -->
              <img width="90%" height="300px" alt="" class="art-lightbox" src="{{ $product->cover }}" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px;">
              <br>
            </p>
          </div>
        </div>
      </div>
      <div class="art-content-layout layout-item-0">
        <div class="art-content-layout-row">
          <div class="art-layout-cell layout-item-2" style="width: 100%">
            <p style="text-align: center;">
              @foreach($images as $i=>$image)
              {{$i}}
              <img width="78" height="79" alt="" class="art-lightbox" src="/storage/{{ $image->src }}">
              @if($i>0)
              &nbsp; &nbsp;&nbsp;
              @endif
              @endforeach
              <!--
              <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">&nbsp; &nbsp;&nbsp;
              <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">&nbsp;&nbsp;&nbsp;
              <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">&nbsp;&nbsp;&nbsp;&nbsp;
              <img width="20" height="39" alt="" class="art-lightbox" src="/images/arrow-left.png" style="margin-top: 15px; float: left;">
              <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">
              <img width="20" height="39" alt="" class="art-lightbox" src="/images/arrow-right-01-512.png" style="margin-top: 15px; float: right;">&nbsp;&nbsp;&nbsp;
              <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg"></p>
              -->
          </div>
        </div>
      </div>
      <div class="art-content-layout layout-item-0">
        <div class="art-content-layout-row">
          <div class="art-layout-cell layout-item-3" style="width: 100%">
            <h1 itemprop="name" style="box-sizing: border-box; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; color: rgb(51, 51, 51); -webkit-font-smoothing: antialiased;">
              <span style="color: rgb(213, 11, 21); font-family: IRANYekan; line-height: 19px;">
                <span style="font-size: 18px; color: #000000;">
                {{__('product.product_name')}} :
                </span> 
                <span style="font-size: 20px;">
                {{ $product->{'name_' . $locale} }}
                </span>
              </span>
              <br>
            </h1>
            <p>
              <span style="color: rgb(61, 160, 28); font-family: IRANYekan; font-size: 16px; line-height: 19px;">
              {{__('product.product_description')}} :
              </span>
              <br>
            </p>
            <div class="post-content"
              style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85);">
              <div class="" style="box-sizing: border-box;">
                <ul style="line-height: 1.8;">
                  @php
                  $description = explode('|', $product->{'description_' . $locale});
                  @endphp
                  @foreach($description as $desc)
                    <li>
                      <span style="font-family: IRANYekan; font-size: 14px;">
                        <span style="line-height: 28px; color: rgb(162, 105, 7);">
                        {{ $desc }}
                        </span>
                        <br>
                      </span>
                    </li>
                  @endforeach
                  <!-- <li><span style="font-family: IRANYekan; font-size: 14px;"><span
                        style="line-height: 28px; color: rgb(162, 105, 7);">حلقه ست</span><br></span></li>
                  <li style="font-weight: 400;"><span style="font-family: IRANYekan; font-size: 14px;"><span
                        style="line-height: 28px; color: rgb(162, 105, 7);">قابل ساخت با نقره و
                        طلا</span><br></span></li>
                  <li style="font-weight: 400;"><span style="font-family: IRANYekan; font-size: 14px;"><span
                        style="line-height: 28px; color: rgb(162, 105, 7);">وزن طلا 5.5 گرم وزن نقره 4
                        گرم</span><br></span></li>
                  <li style="font-weight: 400;"><span style="font-family: IRANYekan;"><span
                        style="line-height: 28px; color: rgb(162, 105, 7); font-size: 14px;">فایل قابل
                        ویرایش</span></span></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if(count($otherProducts)>0)
      <div class="art-content-layout-wrapper layout-item-4">
        <div class="art-content-layout layout-item-0">
          <div class="art-content-layout-row">
            <div class="art-layout-cell layout-item-5" style="width: 100%">
              <p style="text-align: right;">
                <span style="color: rgb(170, 14, 167); font-size: 16px;">
                {{__('product.customers_also_buy')}}
                </span>
              </p>
              <p style="text-align: center;"><span style="font-size: 20px; color: #D50B15;"></span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="art-content-layout-wrapper layout-item-6">
        <div class="art-content-layout layout-item-0">
          <div class="art-content-layout-row">
            <div class="art-layout-cell layout-item-7" style="width: 100%">
              <p style="text-align: center;">
                @foreach($otherProducts as $i=>$oProduct)
                @if($i>0)
                &nbsp; &nbsp;&nbsp;
                @endif
                <img width="78" height="79" alt="" class="art-lightbox" src="{{ $oProduct->cover }}">
                @endforeach
                <!-- <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">&nbsp; &nbsp;&nbsp;
                <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">&nbsp;&nbsp;&nbsp;
                <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">&nbsp;&nbsp;&nbsp;&nbsp;
                <img width="20" height="39" alt="" class="art-lightbox" src="/images/arrow-left.png" style="float: left; margin-top: 15px;">
                <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">
                <img width="20" height="39" alt="" class="art-lightbox" src="/images/arrow-right-01-512.png" style="float: right; margin-top: 15px;">&nbsp; &nbsp;&nbsp;
                <img width="78" height="79" alt="" class="art-lightbox" src="/images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg"></p>
                <p style="text-align: center;">
                &nbsp;گوشواره عقیقی &nbsp; &nbsp;گوشواره عقیقی &nbsp;
                &nbsp;گوشواره عقیقی &nbsp; &nbsp;گوشواره عقیقی &nbsp; &nbsp;گوشواره عقیقی&nbsp;
                </p> -->
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>



  </article>
</div>
<div class="art-layout-cell art-sidebar2">
  <div class="art-block clearfix">
    <div class="art-blockheader">
      <h3 class="t">{{__('product.new_products')}}</h3>
    </div>
    <div class="art-blockcontent">
      @foreach($newProducts as $newProduct)
      <p style="position: relative;">
        <img width="75" height="73" style="/*float: right;margin-top: 11px;*/margin-left: 4px;" alt="" class="art-lightbox" src="/storage/{{ $newProduct->cover }}">
      <!-- </p>
      <p> -->
        <span style="position: absolute;top: 50%;">
        <span style="color: #262626;">
        {{ $newProduct->{'name_' . $locale } }}
        </span>
        @if(isset($newProduct->categories[0]))
         / 
        <span style="color: #A26907;">
        {{__('product.category')}} 
        :
        {{ $newProduct->categories[0]->{'name_' . $locale} }}
        </span>
        @endif
        </span>
        <br>
      </p>
      <!-- <p><span style="color: #A26907;"><br></span></p> -->

      @endforeach`
      <!-- <p>
        <img width="75" height="73" style="float: right; margin-top: 11px; margin-left: 4px;" alt="" class="art-lightbox" src="/images/70b78f57-c2b3-4688-a334-a34ba0e4bfef.jpg">
      </p>
      <p>
        <span style="color: #262626;">
        فیوژن گوشواره و مدال
        </span>
         / 
        <span style="color: #A26907;">
        دسته :
          گوشواره
        </span>
        <br>
      </p>
      <p><span style="color: #A26907;"><br></span></p>

      <p><img width="75" height="73" alt="" class="art-lightbox" src="/images/70b78f57-c2b3-4688-a334-a34ba0e4bfef.jpg"
          style="float: right; margin-top: 11px; margin-left: 4px;"><br></p>
      <p><span style="color: rgb(38, 38, 38);">فیوژن گوشواره و مدال&nbsp;</span>/&nbsp;<span
          style="color: rgb(162, 105, 7);">دسته : گوشواره</span></p>
      <p><span style="color: #A26907;"><br></span></p>
      <p><img width="75" height="73" alt="" class="art-lightbox" src="/images/70b78f57-c2b3-4688-a334-a34ba0e4bfef.jpg"
          style="float: right; margin-top: 11px; margin-left: 4px;"><br></p>
      <p><span style="color: rgb(38, 38, 38);">فیوژن گوشواره و مدال&nbsp;</span>/&nbsp;<span
          style="color: rgb(162, 105, 7);">دسته : گوشواره</span></p>
      <p><span style="color: #A26907;"><br></span></p>
      <p><img width="75" height="73" alt="" class="art-lightbox" src="/images/70b78f57-c2b3-4688-a334-a34ba0e4bfef.jpg"
          style="float: right; margin-top: 11px; margin-left: 4px;"><br></p>
      <p><span style="color: rgb(38, 38, 38);">فیوژن گوشواره و مدال&nbsp;</span>/&nbsp;<span
          style="color: rgb(162, 105, 7);">دسته : گوشواره</span></p>
      <p><span style="color: #A26907;"><br></span></p> -->
    </div>
  </div>
  <div class="art-block clearfix">
    <div class="art-blockheader">
      <h3 class="t">{{__('product.categories')}}</h3>
    </div>
    <div class="art-blockcontent">
      <hr>
      <div style="padding-right: 25px; text-align: right;">
        <p style="padding-left: 20px;">
        </p>
        @foreach($categories as $i => $cat)
        @if($i==0)
        <p style="text-align: right;">
          <span style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107);">
            <span style="font-weight: bold; font-family: IRANYekan; text-decoration: underline;">
              <img width="30" height="30" style="float: right; margin-top: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px;" alt="" class="art-lightbox" src="/images/gold-ring-with-diamonds.png">
            </span>
            <span style="font-family: IRANYekan;">
              <a href="/category/{{ $cat->id }}" style="text-decoration: underline; font-size: 14px; ">
                <span style="color: rgb(0, 0, 0); padding-right: 20px; ">
                {{ $cat->{'name_' . $locale} }}
                </span>
              </a>
              <span style="font-size: 14px; box-sizing: border-box; text-decoration: underline; font-weight: bold;"></span>
            </span>
          </span>
        </p>
        @else
        <hr style="margin-top: 5px; margin-bottom: 5px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-top-color: #DDDDDD; border-right-color: #DDDDDD; border-bottom-color: #DDDDDD; border-left-color: #DDDDDD; border-top-style: solid; -webkit-font-smoothing: antialiased; color: black;">
        <span style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107); font-weight: bold;">
          <span style="text-decoration: underline;">
            <img width="30" height="30" alt="" class="art-lightbox" src="/images/gold-ring-with-diamonds.png" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; float: right;">
          </span>
          <i class="fa fa-circle-o" style="font-family: IRANYekan; box-sizing: border-box; display: inline-block; font: normal normal normal 10px/1 FontAwesome; color: red;">
            <a href="/category/{{ $cat->id }}" style="text-decoration: underline; font-size: 14px; ">
              <span style="color: rgb(0, 0, 0); padding-right: 20px; ">
              {{ $cat->{'name_' . $locale} }}
              </span>
            </a>
          </i>
          <span style="font-size: 14px; box-sizing: border-box; text-decoration: underline; font-family: IRANYekan;"></span>
        </span>
        @endif
        @endforeach
        <!-- <p style="text-align: right;">
          <span style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107);">
            <span style="font-weight: bold; font-family: IRANYekan; text-decoration: underline;">
              <img width="30" height="30" style="float: right; margin-top: 0px; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px;" alt="" class="art-lightbox" src="/images/gold-ring-with-diamonds.png">
            </span>
            <span style="font-family: IRANYekan;">
              <a href="#" style="text-decoration: underline; font-size: 14px; ">
                <span style="color: rgb(0, 0, 0); padding-right: 20px; ">
                انگشتر
                </span>
              </a>
              <span style="font-size: 14px; box-sizing: border-box; text-decoration: underline; font-weight: bold;"></span>
            </span>
          </span>
        </p>
        <hr style="margin-top: 5px; margin-bottom: 5px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-top-color: #DDDDDD; border-right-color: #DDDDDD; border-bottom-color: #DDDDDD; border-left-color: #DDDDDD; border-top-style: solid; -webkit-font-smoothing: antialiased; color: black;">
        <span style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107); font-weight: bold;">
          <span style="text-decoration: underline;">
            <img width="30" height="30" alt="" class="art-lightbox" src="/images/gold-ring-with-diamonds.png" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; float: right;">
          </span>
          <i class="fa fa-circle-o" style="font-family: IRANYekan; box-sizing: border-box; display: inline-block; font: normal normal normal 10px/1 FontAwesome; color: red;">
            <a href="#" style="text-decoration: underline; font-size: 14px; ">
              <span style="color: rgb(0, 0, 0); padding-right: 20px; ">
              گردنبند
              </span>
            </a>
          </i>
          <span style="font-size: 14px; box-sizing: border-box; text-decoration: underline; font-family: IRANYekan;"></span>
        </span>
        <hr style="margin-top: 5px; margin-bottom: 5px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-top-color: #DDDDDD; border-right-color: #DDDDDD; border-bottom-color: #DDDDDD; border-left-color: #DDDDDD; border-top-style: solid; -webkit-font-smoothing: antialiased; color: black;">
        <span style="color: rgb(255, 0, 0); line-height: 10px;"><span
            style="font-weight: bold; text-decoration: underline;"><img width="30" height="30" alt=""
              class="art-lightbox" src="/images/gold-ring-with-diamonds.png"
              style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; float: right; "></span><a
            href="#" style="text-decoration: underline; font-size: 14px;"><span
              style="color: rgb(0, 0, 0); padding-right: 20px; ">گوشواره</span></a><span
            style="font-family: IRANYekan; font-size: 14px; text-decoration: underline; font-weight: bold;"></span><br></span>
        <hr
          style="margin-top: 5px; margin-bottom: 5px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-top-color: #DDDDDD; border-right-color: #DDDDDD; border-bottom-color: #DDDDDD; border-left-color: #DDDDDD; border-top-style: solid; -webkit-font-smoothing: antialiased; color: black;">
        <span
          style="font-weight: bold; box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107); font-family: IRANYekan; text-decoration: underline;"><img
            width="30" height="30" alt="" class="art-lightbox" src="/images/gold-ring-with-diamonds.png"
            style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; float: right; "></span><span
          style="color: rgb(255, 0, 0); line-height: 10px;"><span
            style="font-size: 14px; color: rgb(0, 0, 0); padding-right: 20px;"><a href="#"
              style="text-decoration: underline; "><span style="color: rgb(0, 0, 0); ">النگو</span></a></span></span>
        <hr
          style="margin-top: 5px; margin-bottom: 5px; height: 1px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-top-color: #DDDDDD; border-right-color: #DDDDDD; border-bottom-color: #DDDDDD; border-left-color: #DDDDDD; border-top-style: solid; -webkit-font-smoothing: antialiased; color: black;">
        <span
          style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107); font-family: IRANYekan; font-size: 14px;"><span
            style="font-weight: bold; text-decoration: underline;"><img width="30" height="30" alt=""
              class="art-lightbox" src="/images/gold-ring-with-diamonds.png"
              style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; float: right;"></span><a
            href="#" style="text-decoration: underline;"><span
              style="color: rgb(0, 0, 0); padding-right: 20px; ">خلخال</span></a></span>
        <hr
          style="margin-top: 5px; margin-bottom: 5px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-top-color: #DDDDDD; border-right-color: #DDDDDD; border-bottom-color: #DDDDDD; border-left-color: #DDDDDD; border-top-style: solid; -webkit-font-smoothing: antialiased; color: black;">
        <span style="text-decoration: underline; font-weight: bold;"><img width="30" height="30" alt=""
            class="art-lightbox" src="/images/gold-ring-with-diamonds.png"
            style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; float: right;"><span
            style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107); font-family: IRANYekan;"><i
              class="fa fa-circle-o"
              style="box-sizing: border-box; display: inline-block; font: normal normal normal 10px/1 FontAwesome; color: red;"><span
                style="font-size: 14px; color: #000000;"><span
                  style="color: rgb(255, 0, 0); font-family: IRANYekan, Arial, 'Arial Unicode MS', Helvetica, sans-serif; font-size: 13px; line-height: 10px;"><a
                    href="#" style="font-size: 14px; cursor: pointer;"><span
                      style="color: rgb(0, 0, 0); padding-right: 20px; ">سایر</span></a></span></span></i></span><span
            style="box-sizing: border-box; -webkit-font-smoothing: antialiased; color: rgb(67, 104, 107); font-family: IRANYekan; font-size: 14px;"><i
              class="fa fa-circle-o"
              style="box-sizing: border-box; display: inline-block; font: normal normal normal 10px/1 FontAwesome; color: red;">&nbsp;</i></span></span> -->

        <p></p>
        <p>
        </p>
      </div>
    </div>
  </div>
</div>

</div></div>

<div class="art-content-layout layout-item-2" style="margin-top: 100px;">
    <div class="art-content-layout-row">
        <div class="art-layout-cell layout-item-3" style="width: 100%">
            <h1 style="text-align: center;"><span style="font-family: 'vazir';"><br></span></h1>
            <h1 style="text-align: center;">
                <span style="font-family: 'vazir'; color: #000000;">
                    {{__('product.similar_products')}}
                </span>
            </h1>
        </div>
    </div>
</div>
<div class="art-content-layout layout-item-0">
    <div class="art-content-layout-row">
        @foreach($similarProducts as $newProduct)
        <div class="art-layout-cell layout-item-4" style="width: 20%">
            <p>
                <a href="/product/{{ $newProduct->id }}">
                    @if($newProduct->cover!=null && $newProduct->cover!='')
                    <img alt="{{ $newProduct->{'name_' . $locale} }}"
                        class="fade1 similar-img" src="/storage/{{ $newProduct->cover }}">
                    @else
                    <img alt="{{ $newProduct->{'name_' . $locale} }}"
                        class="fade1 similar-img" src="/images/11-1-copy.jpg">
                    @endif
                </a>
                <br>
            </p>
        </div>
        @endforeach
    <!-- </div>
</div>
<div class="art-content-layout layout-item-5">
    <div class="art-content-layout-row">
        <div class="art-layout-cell layout-item-6" style="width: 100%">
            <p><br></p>
            <p style="text-align: center;"><br></p>
            <p><br></p>
        </div>
    </div>
</div> -->
@endsection