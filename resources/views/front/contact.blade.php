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
      {!!__('app.contact')!!}
  </article>
</div>
@endsection