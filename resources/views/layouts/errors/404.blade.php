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
<link rel="stylesheet" href="/css/contact-style.css" media="screen">
<link rel="stylesheet" href="/css/contact-style.responsive.css" media="all">
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
          <span class="fade" style="color:#c4c1c1;font-size: 26px;"> Page Not Found <br></span>
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
          <div style="backgrund-color:#00000087;text-align: JUSTIFY;line-height:220%;direction:RTL;color: whitesmoke;width: 90%;font-size: 20PX;padding-right: 5%;margin-left: 10%;">

          </div>
        </div>
      </div>
  </article>
</div>
@endsection