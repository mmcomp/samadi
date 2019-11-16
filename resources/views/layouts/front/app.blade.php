<!DOCTYPE html>
<html dir="rtl" lang="en-US">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" /> <!-- start Show Scroll Menu -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            background-color: #f1f1f1;
            font-family: Arial, Helvetica, sans-serif;
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
    <!-- End  Scroll Menu -->
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="css/mainpage100style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="css/mainpage100style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="css/mainpage100style.responsive.css" media="all">

    <!--Start Animation Fade -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
        $(window).on("load", function () {
            function fade() {
                $('.fade').each(function () {
                    /* Check the location of each desired element */
                    var objectBottom = $(this).offset().top + $(this).outerHeight();
                    var windowBottom = $(window).scrollTop() + $(window).innerHeight();

                    /* If the object is completely visible in the window, fade it in */
                    if (objectBottom < windowBottom) {
                        if ($(this).css('opacity') == 0) {
                            $(this).fadeTo(500, 1);
                        }
                    } else {
                        if ($(this).css('opacity') == 1) {
                            $(this).fadeTo(500, 0);
                        }
                    }
                });
            }
            fade(); //Fade in completely visible elements during page-load
            $(window).scroll(function () {
                fade();
            }); //Fade in elements during scroll
        });
    </script>

    <!--End Animation Fade -->

    <script src="js/mainpage100jquery.js"></script>
    <script src="js/mainpage100script.js"></script>
    <script src="js/mainpage100script.responsive.js"></script>


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

    @yield('og')

    @yield('head')
</head>

<!-- End Head -->

<body>
    <div id="art-main">
        <div id="art-header-bg">
        </div>
        <div id="art-hmenu-bg" class="art-bar art-nav">
        </div>
        <div class="art-sheet clearfix">
            <!-- start Header -->
            <header class="art-header">

                <div class="art-shapes">


                    <h1 class="art-headline" data-left="50.36%">
                    </h1>

                    <div style="z-index: 99999;" id="navbar">
                        <a href="/home">{{__('app.home')}}</a>
                        <a href="#">{{__('app.samples')}}</a>
                        <a href="#">{{__('app.products')}}</a>
                        <a href="#">{{__('app.lesson')}}</a>
                        <a href="/about">{{__('app.aboutus')}}</a>
                        <a href="#">{{__('app.contactus')}}</a>
                        @if(auth()->check())
                        <a href="/accounts?tab=profile">{{__('app.profile')}}</a>
                        <a href="/login">{{__('app.exit')}}</a>
                        @else
                        <a href="/login">{{__('app.login')}}</a>
                        <a href="/register">{{__('main.register')}}</a>
                        @endif
                    </div>
                    <!--   <div class="art-nav-inner">
            <ul class="art-hmenu"><a href="محصولات/نیم-ست.html">نیم ست</a></li><li><a href="محصولات/حلقه-ست.html">حلقه ست</a></li><li><a href="محصولات/انگشتر.html">انگشتر</a></li><li><a href="محصولات/گردنبند.html">گردنبند</a></li><li><a href="محصولات/گوشواره.html">گوشواره</a></li><li><a href="محصولات/ابزار-جواهرات.html">ابزار جواهرات</a></li></ul></li><li><a href="سوالات-متداول.html">سوالات متداول</a></li><li><a href="اموزش.html">آموزش</a></li><li><a href="درباره-ما.html">درباره ما</a></li><li><a href="تماس-باما.html">تماس باما</a></li><li><a href="اطلاعات-کاربری.html">اطلاعات کاربری</a><ul><li><a href="اطلاعات-کاربری/داشبورد-من.html">داشبورد من</a></li><li><a href="اطلاعات-کاربری/ویرایش-کاربری.html">ویرایش کاربری</a></li><li><a href="اطلاعات-کاربری/درج-محصولات.html">درج محصولات</a></li><li><a href="اطلاعات-کاربری/تغییر-کلمه-عبور.html">تغییر کلمه عبور</a></li></ul></li><li><a href="ثبت-نام.html">ثبت نام</a></li><li><a href="ورود-به-سایت.html">ورود به سایت</a></li></ul> 
                </div>   -->
                    <script>
                        // When the user scrolls down 30px from the top of the document, slide down the navbar
                        window.onscroll = function () {
                            scrollFunction()
                        };

                        function scrollFunction() {
                            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 20) {
                                document.getElementById("navbar").style.top = "0";
                            } else {
                                document.getElementById("navbar").style.top = "-50px";
                            }
                        }
                    </script>
                    <script>
                        var prevScrollpos = window.pageYOffset;
                        window.onscroll = function () {
                            var currentScrollPos = window.pageYOffset;
                            if (prevScrollpos < currentScrollPos) {
                                document.getElementById("navbar").style.top = "0";
                            } else {
                                document.getElementById("navbar").style.top = "-50px";
                            }
                            prevScrollpos = currentScrollPos;
                        }
                    </script>


            </header>
            <!-- End  Header -->

            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="art-footer">
            <div class="art-footer-inner">
                <div class="art-content-layout-wrapper layout-item-0">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <div class="art-layout-cell layout-item-1" style="width: 20%">
                                <h3 style="text-align: center;"><span style="color: #BE996A;">{{__('app.links')}}</span></h3>
                                <p><span style="color: #BE996A;"><br></span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">{{__('app.samples')}}</span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">{{__('app.contactus')}}</span></p>
                                <p style="text-align: center;">{{__('app.aboutus')}}<span style="color: #FFFFFF;"><br></span></p>
                                <p style="text-align: center;">{{__('app.lesson')}}</p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">{{__('app.faq')}}</span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;"><a href="/login">{{__('main.login')}}</a></span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;"><a href="/register">{{__('main.register')}}</a></span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;"><br></span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;"><br></span></p>
                                <div style="margin-left: 2em;">
                                </div>
                            </div>
                            <div class="art-layout-cell layout-item-2" style="width: 20%">
                                <p style="text-align: center;"><span
                                        style="color: rgb(190, 153, 106); font-size: 15px; font-weight: bold;">{{__('app.social_nets')}}</span></p>
                                <p style="text-align: center;"><span
                                        style="color: rgb(190, 153, 106); font-size: 15px; font-weight: bold;"><br></span>
                                </p>
                                <p style="text-align: center;">{{__('app.instagram')}}</p>
                                <p style="text-align: center;">{{__('app.whatsapp')}}<br></p>
                                <p style="text-align: center;">{{__('app.telegram')}}</p>
                                <p style="text-align: center;">{{__('app.soroush')}}</p>
                                <p style="text-align: center;">{{__('app.pintrest')}}</p>
                                <p style="text-align: center;">{{__('app.facebook')}}</p>
                                <p style="text-align: center;">{{__('app.twitter')}}</p>
                                <h3></h3>
                                <ul>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                            <div class="art-layout-cell layout-item-2" style="width: 25%">
                                <h3 style="text-align: center;"><span
                                        style="color: rgb(190, 153, 106);">{{__('app.products')}}</span><br></h3>
                                <p><span style="color: rgb(190, 153, 106);"><br></span></p>
                                <p style="text-align: center;">نیم ست</p>
                                <p style="text-align: center;">حلقه ست</p>
                                <p style="text-align: center;">گوشواره</p>
                                <p style="text-align: center;">دستبند</p>
                                <p style="text-align: center;">گردنبند</p>
                                <p style="text-align: center;">خلخال</p>
                                <p style="text-align: center;">انگشتر</p>
                                <h3 style="text-align: center;"><span style="color: #BE996A;"></span></h3>
                                <ul>
                                    <li style="text-align: center;"><a href="#"></a></li>
                                </ul>
                            </div>
                            <div class="art-layout-cell layout-item-3" style="width: 35%">
                                <h3 style="text-align: center;"><span style="color: rgb(190, 153, 106);">{{__('app.news')}}</span><br></h3>
                                <p><span style="color: rgb(190, 153, 106);"><br></span></p>
                                <p style="text-align: center;">النگو</p>
                                <p style="text-align: center;">دستبند</p>
                                <p style="text-align: center;">گردنبند</p>
                                <p style="text-align: center;">خلخال</p>
                                <p style="text-align: center;">نیم ست</p>
                                <p style="text-align: center;">گردنبند<br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="art-content-layout layout-item-4">
                    <div style="vertical-align: middle:" class="art-content-layout-row">
                        <div class="art-layout-cell layout-item-5" style="width: 50%">
                            <p style="text-align: center;"><span
                                    style="font-family: iranyekan;font-size:large;color: #BE996A;">{{__('app.copyright')}}</span><span
                                    style="color: rgb(189, 153, 105); font-family: iranyekan, Tahoma, Helvetica, sans-serif; font-size: 11px;"><br></span>
                            </p>
                            <p style="text-align: center;">
                            </p>
                        </div>
                        <div class="art-layout-cell layout-item-6" style="width: 50%">
                            <p style="text-align: center;"><a href="#"><img width="32" height="32" alt=""
                                        src="images/twitter_32.png"></a><a href="#"
                                    style="color: rgb(245, 159, 10); text-decoration: underline;"><img width="32"
                                        height="32" alt="" src="images/rss_32.png"></a><span
                                    style="font-size: 18px; color: #BE996A;">&nbsp;</span><a href="#"
                                    style="color: #F59F0A; text-decoration: underline;"><img width="32" height="32"
                                        alt="" src="images/facebook_32.png" class=""></a>&nbsp;<br></p>
                        </div>
                    </div>
                </div>
                <br /><br /><br />
                <p class="art-page-footer">
                    <span id="art-footnote-links" style="color:#646464;font-family: iranyekan;font-size:medium ;">{{__('app.develop')}}<a style="color: #646464;font-family: iranyekan;font-size:medium ;"
                            href="http://pdr.co.ir/" target="_blank">{{__('app.pdco')}}</a></span>
                </p>
            </div>
        </footer>

    </div>

</body>

</html>