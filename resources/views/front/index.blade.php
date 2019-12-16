@extends('layouts.front.app')

@section('og')
<meta property="og:type" content="home" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:description" content="{{ config('app.name') }}" />
@endsection

@section('head')
<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>

<style>
    .multiselect {
        width: 100%;
    }

    .selectBox {
        position: relative;
        background-color: #333333;
        text-align: center;
        padding: 20px 25px 20px 25px;
        font-family: vazir;
        margin: 0px 0px 15px 0px;
    }

    .selectBox select {
        width: 40%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #33333330 solid;
        width: fit-content;
        padding: 15px;
        font-size: 18px;
        margin-right: 14%;
        margin-left: 70%;
        font-family: vazir;
        border-radius: 5px;
    }

    #checkboxes label {
        display: block;
        padding-right: 3%;
        font-weight: bold;
        line-height: 1.5em;
        width: max-content;
    }

    #checkboxes label:hover {
        background-color: none;
    }
</style>
<style>
    input[type=button] {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        margin-right: -6px;
        cursor: pointer;
    }

    input[type="checkbox"i] {
        cursor: default;
        -webkit-appearance: checkbox;
        height: 25px;
        width: 25px;
        vertical-align: middle;
        margin: 5px 5px 5px 10px;
</style>
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
        background: #FFFFFF url('images/19f9e.png') top center no-repeat scroll;
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
</style>
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<script src="vendor/select2/select2.min.js"></script>
<style>
    .select2-results__option {
        color: black !important;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')
<div class="art-layout-cell art-content">
    <article class="art-post art-article">

        <!-- Search -->
        <div class="art-postcontent art-postcontent-0 clearfix">
            <div class="art-content-layout layout-item-0">
                <div style="text-align: center;" class="art-content-layout-row">
                </div>
            </div>
            <div style="z-index:1;align-content: center;align-items: center;align-self: center;text-align: center;padding:0px" class="art-content-layout layout-item-0">
                <div style="z-index:1;align-content: center;align-items: center;align-self: center;text-align: center;padding:0px" class="art-content-layout-row">
                    <div style="z-index:1;align-content: center;align-items: center;align-self: center;padding:0px;text-align: center;" class="art-layout-cell layout-item-1" style="width: 100%">
                        <form method="POST">
                            {{ csrf_field() }}
                            <div style="direction:rtl" class="multiselect">
                                <div class="checkboxes">
                                    <h1 style="text-align: center;">
                                    {{__('app.category')}}
                                    </h1>
                                @foreach($allCats as $i => $cat)
                                    <label for="id-{{ $i }}">
                                        @if($filter!=null && in_array($cat->id, $filter))
                                        <input name="filter[]" value="{{ $cat->id }}" type="checkbox" id="id-{{ $i }}" checked />{{ $cat->{'name_' . $locale} }}
                                        @else
                                        <input name="filter[]" value="{{ $cat->id }}" type="checkbox" id="id-{{ $i }}" />{{ $cat->{'name_' . $locale} }}
                                        @endif
                                    </label>
                                @endforeach
                                </div>
                                <div class="selectBox" ><!-- onclick="showCheckboxes()" type=button> -->
                                    <!-- <select style="border-top-right-radius:5px;border-bottom-right-radius: 5px;padding: 15px 30px;width:25%;text-decoration: none;margin:0px;">
                                        <option style="display:none;">{{__('app.search_filter')}}</option>
                                    </select> -->
                                    <input style="padding: 14px 30px;width:45%;text-decoration: none;margin: 4px -6px;color:black" placeholder="&nbsp;&nbsp;&nbsp;{{__('app.search_file_title')}}&nbsp;&nbsp;&nbsp;" type="search" name="search">
                                    <!-- <input type=button value="{{__('app.search_now')}} !"> -->
                                    <div style="width:50px;padding-top:1px" class="overSelect"> </div>
                                </div>
                                <!--
                                <div id="checkboxes">
                                    <label for="one">
                                        <input name="filter[]" value="free" type="checkbox" id="one" />{{__('app.nofree')}}</label>
                                    <label for="two">
                                        <input name="filter[]" value="nofree" type="checkbox" id="two" />{{__('app.free')}}</label>
                                    <hr>
                                    @foreach($allCats as $i => $cat)
                                    <label for="id-{{ $i }}">
                                        <input name="filter[]" value="{{ $cat->id }}" type="checkbox" id="id-{{ $i }}" />{{ $cat->{'name_' . $locale} }}</label>
                                    @endforeach
                                </div>
                                -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($isSearch)
            <!-- <div style="background-color: white;">
                <h3 style="text-align: center;">
                    {{__('app.search_results')}} «{{$search}}»
                </h3>
                @foreach($searchResults as $searchRes)
                <div style="text-align: right;color: black;">
                    <a href="/product/{{ $searchRes->id }}" target="_blank">
                    <img src="/storage/{{ $searchRes->cover }}" style="height: 100px;" />
                    </a>
                </div>
                @endforeach
            </div> -->
            <div class="art-content-layout layout-item-2">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-3" style="width: 100%">
                        <h1 style="text-align: center;"><span style="font-family: 'vazir';"><br></span></h1>
                        <h1 style="text-align: center;">
                            <span style="font-family: 'vazir'; color: #000000;">
                                {{__('app.search_results')}} «{{$search}}»
                            </span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="content" style="background-color: white;">
                <div class="row">
                    @foreach($searchResults as $newProduct)
                        <div class="col-2" onmouseenter="$('#info_{{ $newProduct->id }}').show();" onmouseleave="$('#info_{{ $newProduct->id }}').hide();">
                            @if($newProduct->cover!=null && $newProduct->cover!='')
                            <img alt="{{ $newProduct->{'name_' . $locale} }}" style="width: 100%height: 100%;" src="/storage/{{ $newProduct->cover }}">
                            @else
                            <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}"
                                class="fade" src="/images/11-1-copy.jpg">
                            @endif
                            <div id="info_{{ $newProduct->id }}" style="position: absolute;background-color: rgba(255, 242, 242, 0.89);width: 300px;height: 300px;top: 0px;display: none;color: rgb(127, 96, 8);">
                                <div class="row text-center">
                                    <div class="col-12" style="font-size: 40px;">
                                        {{ $newProduct->{'name_' . $locale} }}
                                    </div>
                                    <div class="col-12" style="font-size: 20px;">
                                        LIKEs : <span style="color: green;">{{ $newProduct->like_count }}</span>
                                    </div>
                                    <div class="col-12">
                                        <a class="btn btn-primary" href="/product/{{ $newProduct->id }}"><i class="fa fa-home"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            <!-- new products -->
            <div class="art-content-layout layout-item-2">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-3" style="width: 100%">
                        <h1 style="text-align: center;"><span style="font-family: 'vazir';"><br></span></h1>
                        <h1 style="text-align: center;">
                            <span style="font-family: 'vazir'; color: #000000;">
                                {{__('app.new_products')}}
                            </span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="art-content-layout layout-item-0">
                <div class="art-content-layout-row">
                    @foreach($newProducts as $newProduct)
                    <div class="art-layout-cell layout-item-4" style="width: 20%">
                        <p>
                            <a href="/product/{{ $newProduct->id }}">
                                @if($newProduct->cover!=null && $newProduct->cover!='')
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}"
                                    class="fade" src="/storage/{{ $newProduct->cover }}">
                                @else
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}"
                                    class="fade" src="/images/11-1-copy.jpg">
                                @endif
                            </a>
                            <br>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="art-content-layout layout-item-5">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-6" style="width: 100%">
                        <p><br></p>
                        <p style="text-align: center;"><br></p>
                        <p><br></p>
                    </div>
                </div>
            </div>
            <!-- newsletter register -->
            <div class="art-content-layout layout-item-7">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-8" style="width: 100%">
                        <p style="text-align: center;"><span
                                style="color: rgb(92, 70, 40); font-size: 16px;"><br></span></p>
                        <p style="text-align: center;">
                            <span style="font-family: vazir;">
                                <span
                                    style="font-size: 16px; color: rgb(252, 230, 191); text-shadow: rgb(246, 172, 44) 0px 0px 25px;">---
                                    &nbsp;
                                    <span style="text-shadow: rgb(246, 172, 44) 0px 0px 25px;">
                                        {{__('app.register_newsletter')}}
                                    </span>
                                    &nbsp; ---
                                </span>
                                <br>
                            </span>
                        </p>
                        <p style="text-align: center;"><span style="font-size: 16px; color: #FACD80;"><br></span></p>
                        <p style="text-align: center;">
                            <form method="POST">
                                {{ csrf_field() }}
                                <input style="width: 50%;padding: 5px;" type="email"
                                    placeholder="{{__('app.email_here')}}" name="news_email">
                                <span style="color: #BE996A; font-size: 16px;">
                                    &nbsp; &nbsp;&nbsp;&nbsp;</span>&nbsp;
                                <a href="#" target="_blank" title="{{__('app.subscribe_newsletter')}}"
                                    class="art-button">
                                    {{__('app.subscribe_newsletter')}}
                                </!-->
                                &nbsp;
                                </span>
                            </form>
                        </p>
                        <p style="text-align: center;"><br></p>
                    </div>
                </div>
            </div>
            <div class="art-content-layout layout-item-0">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-6" style="width: 100%">
                        <p><br></p>
                    </div>
                </div>
            </div>
            <!-- Top sales -->
            <div class="art-content-layout layout-item-9">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-3" style="width: 100%">
                        <h1 style="text-align: center;"><span
                                style="color: rgb(67, 104, 107); font-family: 'vazir';"><br></span>
                        </h1>
                        <h1 style="text-align: center;"><span style="font-family: 'vazir'; color: #000000;">
                                {{__('app.top_sales')}}
                            </span></h1>
                    </div>
                </div>
            </div>
            <div class="art-content-layout layout-item-0">
                <div class="art-content-layout-row">
                    @foreach($topSaleProducts as $newProduct)
                    <div class="art-layout-cell layout-item-4" style="width: 20%">
                        <p>
                            <a href="/product/{{ $newProduct->id }}">
                                @if($newProduct->cover!=null && $newProduct->cover!='')
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}"
                                    class="fade" src="/storage/{{ $newProduct->cover }}">
                                @else
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}"
                                    class="fade" src="/images/11-1-copy.jpg">
                                @endif
                            </a>
                            <br>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="art-content-layout layout-item-5">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-6" style="width: 100%">
                        <p><br></p>
                        <p><br></p>
                    </div>
                </div>
            </div>
            <!-- Social -->
            <div class="art-content-layout layout-item-10">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-11" style="width: 100%">
                        <p style="text-align: center;"><span style="font-size: 16px; color: #2E2314;"><br></span></p>
                        <p style="text-align: center;">
                            {!!__('app.social')!!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="art-content-layout layout-item-10">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-12" style="width: 25%">
                        <p style="text-align: center;"><img width="35" height="35" alt="" class="art-lightbox"
                                src="images/thumbnail%20(1).png"><br></p>
                        <p style="text-align: center;"><br></p>
                    </div>
                    <div class="art-layout-cell layout-item-12" style="width: 25%">
                        <p style="text-align: center;"><img width="35" height="35" alt="" class="art-lightbox"
                                src="images/thumbnail%20(2).png"><br></p>
                    </div>
                    <div class="art-layout-cell layout-item-12" style="width: 25%">
                        <p style="text-align: center;"><img width="35" height="35" alt="" class="art-lightbox"
                                src="images/thumbnail.png"><br></p>
                    </div>
                    <div class="art-layout-cell layout-item-12" style="width: 25%">
                        <p style="text-align: center;"><img width="35" height="35" alt="" class="art-lightbox"
                                src="images/thumbnail%20(3).png"><br></p>
                    </div>
                </div>
            </div>
            <div class="art-content-layout layout-item-5">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-6" style="width: 100%">
                        <p><br></p>
                    </div>
                </div>
            </div>
            <!-- Top works -->
            <div class="art-content-layout layout-item-13">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-3" style="width: 100%">
                        <p style="text-align: left;"><span style="font-size: 18px;"><br></span>
                        </p>
                        <p style="text-align: center;"><span style="font-size: 18px; text-align: left; color: #000000;">
                                {{__('app.top_works')}}
                            </span><br></p>
                    </div>
                </div>
            </div>
            <div class="art-content-layout layout-item-0">
                <div class="art-content-layout layout-item-0">
                    <div class="art-content-layout-row">
                        @foreach($topWorkProducts as $newProduct)
                        <div class="art-layout-cell layout-item-4" style="width: 20%">
                            <p>
                                <a href="/product/{{ $newProduct->id }}">
                                    @if($newProduct->cover!=null && $newProduct->cover!='')
                                    <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}"
                                        class="fade" src="/storage/{{ $newProduct->cover }}">
                                    @else
                                    <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}"
                                        class="fade" src="/images/11-1-copy.jpg">
                                    @endif
                                </a>
                                <br>
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="art-content-layout layout-item-5">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell layout-item-6" style="width: 100%">
                            <p><br></p>
                        </div>
                    </div>
                </div>
                <!-- News -->
                <div class="art-content-layout layout-item-14">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell layout-item-3" style="width: 100%">
                            <h1 style="text-align: center;"><span
                                    style="color: rgb(83, 108, 9); font-family: 'vazir';"><br></span>
                            </h1>
                            <h1 style="text-align: center;"><span
                                    style="font-family: vazir; color: #000000;">{{__('app.news')}}</span><br></h1>
                        </div>
                    </div>
                </div>
                <div class="art-content-layout layout-item-5">
                    <div class="art-content-layout-row">
                        @foreach($topNews as $news)
                        <div class="art-layout-cell layout-item-1" style="width: 20%">
                            <p style="text-align: center;">
                                @if($news->image_path!=null && $news->image_path!='')
                                <img width="99" height="99" alt="" class="fade" src="{{ $news->image_path }}">
                                @else
                                <img width="99" height="99" alt="" class="fade"
                                    src="images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">
                                @endif
                                <br>
                            </p>
                            <p style="text-align: center;">
                                {{ $news->title }}
                            </p>
                        </div>
                        @endforeach
                        <!-- <div class="art-layout-cell layout-item-1" style="width: 20%">
                            <p style="text-align: center;"><img width="99" height="99" alt="" class="fade"
                                    src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                            </p>
                            <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                افزار ماتریکس</p>
                            <p><br></p>
                        </div>
                        <div class="art-layout-cell layout-item-1" style="width: 20%">
                            <p style="text-align: center;"><img width="99" height="99" alt="" class="fade"
                                    src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                            </p>
                            <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                افزار ماتریکس</p>
                            <p><br></p>
                        </div>
                        <div class="art-layout-cell layout-item-1" style="width: 20%">
                            <p style="text-align: center;"><img width="99" height="99" alt="" class="fade"
                                    src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                            </p>
                            <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                افزار ماتریکس</p>
                            <p><br></p>
                        </div>
                        <div class="art-layout-cell layout-item-1" style="width: 20%">
                            <p style="text-align: center;"><img width="99" height="99" alt="" class="fade"
                                    src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                            </p>
                            <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                افزار ماتریکس</p>
                            <p><br></p>
                        </div> -->
                    </div>
                </div>
            </div>
    </article>
</div>
<script>
    $(".select2").select2({
        placeholder: "{{__('app.search_filter')}}",
        allowClear: true
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection