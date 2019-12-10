@extends('layouts.front.app')

@section('og')
<meta property="og:type" content="home" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:description" content="{{ config('app.name') }}" />
@endsection

@section('head')
<style>
  body {
    margin: 0;
    background-color: #f1f1f1;
    font-family: vazir, Helvetica, sans-serif;
  }

  #navbar {
    background-color: #333;
    position: fixed;
    top: -50px;
    width: 100%;
    display: block;
    transition: top 0.7s;
    box-shadow: 1px -3px 3px black;
  }

  #navbar a {
    float: right;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 15px;
    text-decoration: none;
    font-size: 14px;
  }

  #navbar a:hover {
    background-color: #ddd;
    color: black;
  }
</style>
<link rel="stylesheet" href="/css/privacy-style.css" media="screen">
<link rel="stylesheet" href="/css/contact-style.responsive.css" media="all">
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
    color: #F2F2F2;
    background-color: #ffffff;
    z-index: -1;
  }

  .art-content .art-postcontent-0 .layout-item-3 {
    color: #F2F2F2;
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
    color: #F2F2F2;
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
    color: #F2F2F2;
    background: #FFFFFF url('images/7463d.png') top center no-repeat scroll;
    border-spacing: 3px 0px;
    border-collapse: separate;
  }

  .art-content .art-postcontent-0 .layout-item-14 {
    color: #F2F2F2;
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
</style>
<script src="/js/mainpage100jquery.js"></script>
<script src="/js/mainpage100script.js"></script>
<script src="/js/mainpage100script.responsive.js"></script>
@endsection

@section('content')
<div class="art-layout-cell art-content">
  <article class="art-post art-article">
    <div class="art-postcontent art-postcontent-0 clearfix">
      <div class="art-content-layout layout-item-0">
        <div style="text-align: center;" class="art-content-layout-row">
        </div>
      </div>
      <div class="art-content-layout layout-item-2">
        <hr>
        <div class="fade"
          style="float: center ;background-color :#333333;text-align: center;direction:RTL;width: 100%;font-size: 50PX;">
          <span class="fade" style="color:#c4c1c1;font-size: 26px;"> پل های ارتباطی شما با گروه پیوه
            ژن<br></span>
          <!--Facebook-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-facebook-f"></i></a>
          <!--Twitter-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-twitter"></i></a>
          <!--Instagram-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-instagram"></i></a>
          <!--Pinterest-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-pinterest"></i></a>
          <!--Youtube-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-youtube"></i></a>
          <!--Telegram-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-telegram"></i></a>
          <!--Email-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-envelope"></i></a>
          <!--WhatsApp-->
          <a class="fade" style="padding:25px;" type="button" role="button"><i class="fa fa-whatsapp"></i></a><br>
        </div><br> <br>
      </div>
      <div class="art-content-layout-row">
        <div class="art-layout-cell layout-item-3" style="width: 100%">
          <br>
          <div
            style="backgrund-color:#00000087;text-align: JUSTIFY;line-height:220%;direction:RTL;color: whitesmoke;width: 90%;font-size: 20PX;padding-right: 5%;margin-left: 10%;">
            <br> <br> <i class="fa fa-balance-scale" style="font-size: 45px;vertical-align: bottom;"></i>
            <span class="fade" style="color: red;font-size: 22px;padding-left: 15px;padding-right: 15px;">
              شرایط و ضوابط سایت :<br></span>شرایط و ضوابط ذکرشده در این بخش برای تهیه طراحی های منحصر به
            فرد گروه تولیدی طراحی و جواهرات پیوه ژن می باشد. گروه تولیدی طراحی و جواهرات پیوه ژن، طراحی های
            منحصر به فرد جواهرات را در اختیار شما قرار می دهد و شما با مراجعه به سایت ما و خرید از فروشگاه،
            خریدار محسوب می شوید.
            شما با سفارش طرح های مورد نظر خود، در واقع این شرایط و ضوابط را پذیرفته اید و در صورتیکه این
            قوانین و مقررات را به طور کامل قبول نکنید، اجازه دسترسی به محتویات این وب سایت را نخواهید داشت.
            این شرایط و خدمات برای کلیه کاربران سایت اعمال می شود. بنابراین کاربرانی که مرورگر، فروشنده،
            خریدار و یا مشارکت کنندگان در محتوا هستند، باید شرایط و ضوابط سایت را با دقت مطالعه کنند.

            <br> <br> <i class="fa fa-cart-arrow-down" style="font-size: 45px;vertical-align: bottom;"></i>
            <span class="fade" style="color: red;font-size: 22px;padding-left: 15px;padding-right: 15px;">
              ثبت سفارش:<br></span>
            با مشاهده اطلاعات موجود در سایت، محصولات مورد نظرتان را انتخاب کنید. پس از انتخاب محصول مورد نظر
            باید سفارش خودتان را ثبت کنید. با ثبت سفارش، شما به ما این اطمینان را می دهید که کلیه اطلاعاتی
            که شما در هنگام سفارش کالا می بایست وارد کنید، از هر نظر دقیق و کامل است و به هیچ شخص ثالثی
            مربوط نمی شود.
            <br> <br> <i class="fa fa-barcode" style="font-size: 45px;vertical-align: bottom;"></i> <span class="fade"
              style="color: red;font-size: 22px;padding-left: 15px;padding-right: 15px;">
              قرارداد های ما<br></span>
            ثبت سفارش از طریق پرداخت کامل از کارت اعتباری و یا کیف پول شما یا از طریق پی پال انجام می شود.
            در صورتیکه سفارش شما با موفقیت ثبت گردد، یک ایمیل تأیید برای شما ارسال می گردد. به این ترتیب یک
            قرارداد الزامی برای ارسال طرح ها ایجاد خواهد شد و سفارش شما به صورت قطعی ثبت گردیده است. اما در
            صورتیکه پرداخت با موفقیت انجام نشود، سفارش پذیرفته نیست.

          </div>
        </div>
      </div>
  </article>
</div>
@endsection