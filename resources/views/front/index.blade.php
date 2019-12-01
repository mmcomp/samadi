@extends('layouts.front.app')

@section('og')
<meta property="og:type" content="home" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:description" content="{{ config('app.name') }}" />
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
                <div style="z-index:1;align-content: center;align-items: center;align-self: center;text-align: center;padding:0px"
                    class="art-content-layout-row">
                    <div style="z-index:1;background-color:#333333;align-content: center;align-items: center;align-self: center;padding:0px;text-align: center;"
                        class="art-layout-cell layout-item-1" style="width: 100%">
                        <h1 style="color:whitesmoke;padding: 5px;">{{__('app.search_here')}}</h1>
                        <form style="padding-top: 50px;margin-left: 150px;margin-right: 150px; text-align: center;border: #000000 ;background-color:none;border-radius: 0px;border-style: none; width:max-content%;height:60px;" method="POST">
                            {{ csrf_field() }}
                            <div style="text-align: center;width: 100%;" class="multiselect">
                                <div style="border-style: solid;border-width: 2px;border:#2E2314;font-size: 25px;" class="selectBox" > <!-- onclick="showCheckboxes()"> -->
                                    <select style="/*color: #757575;*/padding-right:5px;font-size:15px;border-bottom-right-radius:5px;border-top-right-radius:5px;border-style: none;border-left:1px solid #000;width: 15%;margin: 0%;height: 50px;" name="filter[]" multiple class="select2">
                                        <!-- <option style="height: 1px;width;1px ;" disabled>
                                            {{__('app.search_filter')}}
                                        </option> -->
                                        <optgroup label="{{__('app.cost')}}">
                                            <option value="free" style="height: 1px;width;1px ;">
                                                {{__('app.free')}}
                                            </option>
                                            <option value="nofree" style="height: 1px;width;1px ;">
                                                {{__('app.nofree')}}
                                            </option>
                                        </optgroup>
                                        <optgroup label="{{__('app.category')}}">
                                            @foreach($allCats as $cat)
                                            <option value="{{ $cat->id }}" style="height: 1px;width;1px ;">
                                                {{ $cat->{'name_' . $locale} }}
                                            </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    <input style="margin-left: -5px;font-size:17px;padding-right:2%;border-style: none;width: 40%;margin-right:-5px;height: 50px;" placeholder="&nbsp;&nbsp;&nbsp;{{__('app.search_file_title')}}&nbsp;&nbsp;&nbsp;" type="search" name="search">
                                    <button style="font-size:24px;height:50px;width: 5%;" class="art-button" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <!-- <div class="overSelect"></div> -->
                                </div>
                                <!-- <div style="line-height:3rm;text-align:right;padding:15px;font-size: 17px;border-bottom-left-radius: 25px;BORDER-COLOR: #744e1c;border-top-right-radius: 25px;contain: layout;font-family:iranyekan;background-color:rgba(255, 255, 255, 0.73);margin-right: 18%;margin-top:3px;width:15%;color: black;" id="checkboxes">
                                    <label for="free">
                                        <input
                                            style="border-style: solid;border-width: 2px;border:#2E2314;font-size: 25px;"
                                            class="art-checkbox" type="checkbox" id="free"
                                            value="free" />{{__('app.free')}}
                                    </label>
                                    <label for="nofree">
                                        <input type="checkbox" id="nofree" value="nofree" />{{__('app.nofree')}}
                                    </label>
                                    <hr style="color: black;font-size: 20px;font-style: initial;">
                                    <label for="رایگان">
                                        <input
                                            style="border-style: solid;border-width: 2px;border:#2E2314;font-size: 25px;"
                                            class="art-checkbox" type="checkbox" id="رایگان" />رایگان</label>
                                    <label for="پولی">
                                        <input type="checkbox" id="پولی" />پولی</label>
                                    <hr style="color: black;font-size: 20px;font-style: initial;">
                                    <label for="النگو">
                                        <input type="checkbox" id="مدال" />مدال</label>
                                    <label for="النگو">
                                        <input type="checkbox" id="حلقه" /> حلقه ست </label>
                                    <label for="النگو">
                                        <input type="checkbox" id="النگو" />مدال</label>
                                    <label for="گوشواره">
                                        <input type="checkbox" id="النگو" />گوشواره</label>
                                    <label for="نیم ست">
                                        <input type="checkbox" id="النگو" />نیم ست</label>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($isSearch)
            <div style="background-color: white;">
                <h3 style="text-align: center;">
                    {{__('app.search_results')}} «{{$search}}»
                </h3>
                @foreach($searchResults as $searchRes)
                <div style="text-align: right;color: black;">
                    <img src="/storage/{{ $searchRes->cover }}" style="height: 100px;" />
                    <a href="/product/{{ $searchRes->id }}" target="_blank">
                    <span style="font-size: 40px;">
                    {{ $searchRes->{'name_' . $locale} }}
                    </span>
                    </a>
                </div>
                @endforeach
            </div>
            @endif
            <!-- new products -->
            <div class="art-content-layout layout-item-2">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-3" style="width: 100%">
                        <h1 style="text-align: center;"><span style="font-family: 'iranYekan';"><br></span></h1>
                        <h1 style="text-align: center;">
                            <span style="font-family: 'iranYekan'; color: #000000;">
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
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}" class="fade" src="/storage/{{ $newProduct->cover }}">
                                @else
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}" class="fade" src="/images/11-1-copy.jpg">
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
                            <span style="font-family: IRANYekan;">
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
                                </a>
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
                                style="color: rgb(67, 104, 107); font-family: 'iranyekan';"><br></span>
                        </h1>
                        <h1 style="text-align: center;"><span style="font-family: 'iranyekan'; color: #000000;">
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
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}" class="fade" src="/storage/{{ $newProduct->cover }}">
                                @else
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}" class="fade" src="/images/11-1-copy.jpg">
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
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}" class="fade" src="/storage/{{ $newProduct->cover }}">
                                @else
                                <img width="100%" height="100%" alt="{{ $newProduct->{'name_' . $locale} }}" class="fade" src="/images/11-1-copy.jpg">
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
                                    style="color: rgb(83, 108, 9); font-family: 'iranyekan';"><br></span>
                            </h1>
                            <h1 style="text-align: center;"><span
                                    style="font-family: IRANYekan; color: #000000;">{{__('app.news')}}</span><br></h1>
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
                                <img width="99" height="99" alt="" class="fade" src="images/75f2fb3f-8631-4716-acf3-70cffdacb232.jpg">
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
@endsection