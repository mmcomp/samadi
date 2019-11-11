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
                        <a href="/home">صفحه نخست</a>
                        <a href="#">نمونه کارها</a>
                        <a href="#">محصولات</a>
                        <a href="#">آموزش سایت</a>
                        <a href="#">درباره ما</a>
                        <a href="#">تماس با ما</a>
                        @if(auth()->check())
                        <a href="/accounts?tab=profile">اطلاعات کاربری</a>
                        <a href="/login">خروج</a>
                        @else
                        <a href="/login">ورود به سایت</a>
                        <a href="/register">ثبت نام</a>
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
                        <div class="art-layout-cell art-content">
                            <article class="art-post art-article">


                                <div class="art-postcontent art-postcontent-0 clearfix">
                                    <div class="art-content-layout layout-item-0">
                                        <div style="text-align: center;" class="art-content-layout-row">
                                        </div>
                                    </div>
                                    <div style="z-index:1;align-content: center;align-items: center;align-self: center;text-align: center;padding:0px"
                                        class="art-content-layout layout-item-0">
                                        <div style="z-index:1;align-content: center;align-items: center;align-self: center;text-align: center;padding:0px"
                                            class="art-content-layout-row">
                                            <div style="z-index:1;background-color:khaki;align-content: center;align-items: center;align-self: center;padding:0px;text-align: center;"
                                                class="art-layout-cell layout-item-1" style="width: 100%">
                                                <h1 style="color:blue;padding: 5px;">هر فایلی رو که توی سایت دنبالش می
                                                    گردین ، اینجا میتونید جستجو کنید</h1>
                                                <form
                                                    style="padding-top: 50px;margin-left: 150px;margin-right: 150px; text-align: center;border: #000000 ;background-color:none;border-radius: 0px;border-style: none; width:max-content%;height:60px;">


                                                    <div style="text-align: center;width: 100%;" class="multiselect">
                                                        <div style="border-style: solid;border-width: 2px;border:#2E2314;font-size: 25px;"
                                                            class="selectBox" onclick="showCheckboxes()">
                                                            <select
                                                                style="color: #757575;padding-right:5px;font-size:15px;border-bottom-right-radius:5px;border-top-right-radius:5px;border-style: none;border-left:1px solid #000;width: 15%;margin: 0%;height: 50px;"
                                                                name="example">
                                                                <option style="display: none;height: 1px;width;1px ;">
                                                                    فیلترهای جستجو </option>
                                                            </select>
                                                            <input
                                                                style="margin-left: -5px;font-size:17px;padding-right:2%;border-style: none;width: 40%;margin-right:-5px;height: 50px;"
                                                                placeholder="&nbsp;&nbsp;&nbsp;عنوان فایل مورد نظر رو جستجو کنید&nbsp;&nbsp;&nbsp;"
                                                                type="search" name="other">
                                                            <button style="font-size:24px;height:50px;width: 5%;"
                                                                class="art-button" type="button">
                                                                <i class="fa fa-search"></i>
                                                                <div class="overSelect"></div>
                                                        </div>
                                                        <div style="line-height:3rm;text-align:right;padding:15px;font-size: 17px;border-bottom-left-radius: 25px;
                        BORDER-COLOR: darksalmon;border-top-right-radius: 25px;contain: layout;font-family:iranyekan;background-color:#ffffff6e;margin-right: 18%;margin-top:3px;width:15%;color: black;"
                                                            id="checkboxes">
                                                            <label for="رایگان">
                                                                <input
                                                                    style="border-style: solid;border-width: 2px;border:#2E2314;font-size: 25px;"
                                                                    class="art-checkbox" type="checkbox"
                                                                    id="رایگان" />رایگان</label>
                                                            <label for="پولی">
                                                                <input type="checkbox" id="پولی" />پولی</label>
                                                            <hr
                                                                style="color: black;font-size: 20px;font-style: initial;">
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
                                                        </div>

                                                    </div>

                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="art-content-layout layout-item-2">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-3" style="width: 100%">
                                                <h1 style="text-align: center;"><span
                                                        style="font-family: 'iranYekan';"><br></span></h1>
                                                <h1 style="text-align: center;"><span
                                                        style="font-family: 'iranYekan'; color: #000000;">جدیدترین نمونه
                                                        کارهای ارسال شده</span></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="art-content-layout layout-item-0">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
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
                                    <div class="art-content-layout layout-item-7">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-8" style="width: 100%">
                                                <p style="text-align: center;"><span
                                                        style="color: rgb(92, 70, 40); font-size: 16px;"><br></span></p>
                                                <p style="text-align: center;"><span
                                                        style="font-family: IRANYekan;"><span
                                                            style="font-size: 16px; color: rgb(252, 230, 191); text-shadow: rgb(246, 172, 44) 0px 0px 25px;">---
                                                            &nbsp; <span
                                                                style="text-shadow: rgb(246, 172, 44) 0px 0px 25px;">عضویت
                                                                در خبرنامه مجموعه طراحان طلا و جواهر پیوه ژن</span>
                                                            &nbsp; ---</span><br></span></p>
                                                <p style="text-align: center;"><span
                                                        style="font-size: 16px; color: #FACD80;"><br></span></p>
                                                <p style="text-align: center;"><input style="width: 50%;padding: 5px;"
                                                        type="text" placeholder="ایمیل خود را اینجا وارد کنید"><span
                                                        style="color: #BE996A; font-size: 16px;">&nbsp; &nbsp;
                                                        &nbsp;&nbsp;</span>&nbsp;<a href="#" target="_blank"
                                                        title="عضویت در خبرنامه" class="art-button">عضویت در
                                                        خبرنامه</a>&nbsp;</p>
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
                                    <div class="art-content-layout layout-item-9">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-3" style="width: 100%">
                                                <h1 style="text-align: center;"><span
                                                        style="color: rgb(67, 104, 107); font-family: 'iranyekan';"><br></span>
                                                </h1>
                                                <h1 style="text-align: center;"><span
                                                        style="font-family: 'iranyekan'; color: #000000;">پرفروش ترین
                                                        نمونه کارهای ارسال شده</span></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="art-content-layout layout-item-0">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                <p><img width="100%" height="100%" alt="" class="fade"
                                                        src="images/11-1-copy.jpg"><br></p>
                                            </div>
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
                                    <div class="art-content-layout layout-item-10">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-11" style="width: 100%">
                                                <p style="text-align: center;"><span
                                                        style="font-size: 16px; color: #2E2314;"><br></span></p>
                                                <p style="text-align: center;"><span
                                                        style="font-size: 16px; color: rgb(224, 215, 204); text-shadow: rgba(246, 172, 44, 0.976563) 0px 0px 12px; font-family: IRANYekan;">---
                                                        <span
                                                            style="text-shadow: rgba(246, 172, 44, 0.976563) 0px 0px 12px;">&nbsp;
                                                            هنر <span
                                                                style="text-shadow: rgba(246, 172, 44, 0.976563) 0px 0px 25px;">نمایی</span>
                                                            های ما را در فضای مجازی دنبال کنید</span> &nbsp; ---</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="art-content-layout layout-item-10">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-12" style="width: 25%">
                                                <p style="text-align: center;"><img width="35" height="35" alt=""
                                                        class="art-lightbox" src="images/thumbnail%20(1).png"><br></p>
                                                <p style="text-align: center;"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-12" style="width: 25%">
                                                <p style="text-align: center;"><img width="35" height="35" alt=""
                                                        class="art-lightbox" src="images/thumbnail%20(2).png"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-12" style="width: 25%">
                                                <p style="text-align: center;"><img width="35" height="35" alt=""
                                                        class="art-lightbox" src="images/thumbnail.png"><br></p>
                                            </div>
                                            <div class="art-layout-cell layout-item-12" style="width: 25%">
                                                <p style="text-align: center;"><img width="35" height="35" alt=""
                                                        class="art-lightbox" src="images/thumbnail%20(3).png"><br></p>
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
                                    <div class="art-content-layout layout-item-13">
                                        <div class="art-content-layout-row">
                                            <div class="art-layout-cell layout-item-3" style="width: 100%">
                                                <p style="text-align: left;"><span style="font-size: 18px;"><br></span>
                                                </p>
                                                <p style="text-align: center;"><span
                                                        style="font-size: 18px; text-align: left; color: #000000;">پر
                                                        کار ترین نمونه های ارسال شده</span><br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="art-content-layout layout-item-0">
                                        <div class="art-content-layout layout-item-0">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                    <p><img width="100%" height="100%" alt="" class="fade"
                                                            src="images/11-1-copy.jpg"><br></p>
                                                </div>
                                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                    <p><img width="100%" height="100%" alt="" class="fade"
                                                            src="images/11-1-copy.jpg"><br></p>
                                                </div>
                                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                    <p><img width="100%" height="100%" alt="" class="fade"
                                                            src="images/11-1-copy.jpg"><br></p>
                                                </div>
                                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                    <p><img width="100%" height="100%" alt="" class="fade"
                                                            src="images/11-1-copy.jpg"><br></p>
                                                </div>
                                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                                    <p><img width="100%" height="100%" alt="" class="fade"
                                                            src="images/11-1-copy.jpg"><br></p>
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
                                        <div class="art-content-layout layout-item-14">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell layout-item-3" style="width: 100%">
                                                    <h1 style="text-align: center;"><span
                                                            style="color: rgb(83, 108, 9); font-family: 'iranyekan';"><br></span>
                                                    </h1>
                                                    <h1 style="text-align: center;"><span
                                                            style="font-family: IRANYekan; color: #000000;">جدیدترین
                                                            اخبار و مطالب جذاب و خواندنی</span><br></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="art-content-layout layout-item-5">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                                            class="fade"
                                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                                    </p>
                                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                                        افزار ماتریکس</p>
                                                </div>
                                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                                            class="fade"
                                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                                    </p>
                                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                                        افزار ماتریکس</p>
                                                    <p><br></p>
                                                </div>
                                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                                            class="fade"
                                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                                    </p>
                                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                                        افزار ماتریکس</p>
                                                    <p><br></p>
                                                </div>
                                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                                            class="fade"
                                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                                    </p>
                                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                                        افزار ماتریکس</p>
                                                    <p><br></p>
                                                </div>
                                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                                            class="fade"
                                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                                    </p>
                                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم
                                                        افزار ماتریکس</p>
                                                    <p><br></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="art-footer">
            <div class="art-footer-inner">
                <div class="art-content-layout-wrapper layout-item-0">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <div class="art-layout-cell layout-item-1" style="width: 20%">
                                <h3 style="text-align: center;"><span style="color: #BE996A;">پیوتدهای سایت</span></h3>
                                <p><span style="color: #BE996A;"><br></span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">لیست نمونه کارها</span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">تماس با ما</span></p>
                                <p style="text-align: center;">درباره ما<span style="color: #FFFFFF;"><br></span></p>
                                <p style="text-align: center;">آموزش</p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">سوالات متداول</span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">ورود به سایت</span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;">ثبت نام در سایت</span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;"><br></span></p>
                                <p style="text-align: center;"><span style="color: #FFFFFF;"><br></span></p>
                                <div style="margin-left: 2em;">
                                </div>
                            </div>
                            <div class="art-layout-cell layout-item-2" style="width: 20%">
                                <p style="text-align: center;"><span
                                        style="color: rgb(190, 153, 106); font-size: 15px; font-weight: bold;">شبکه های
                                        مجازی</span></p>
                                <p style="text-align: center;"><span
                                        style="color: rgb(190, 153, 106); font-size: 15px; font-weight: bold;"><br></span>
                                </p>
                                <p style="text-align: center;">اینستاگرام</p>
                                <p style="text-align: center;">واتس آپ<br></p>
                                <p style="text-align: center;">تلگرام</p>
                                <p style="text-align: center;">سروش</p>
                                <p style="text-align: center;">پینترست</p>
                                <p style="text-align: center;">فیس بوک</p>
                                <p style="text-align: center;">واتس آپ</p>
                                <h3></h3>
                                <ul>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                            <div class="art-layout-cell layout-item-2" style="width: 25%">
                                <h3 style="text-align: center;"><span
                                        style="color: rgb(190, 153, 106);">محصولات</span><br></h3>
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
                                <h3 style="text-align: center;"><span style="color: rgb(190, 153, 106);">جدیدترین مطالب
                                        خواندنی</span><br></h3>
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
                                    style="font-family: iranyekan;font-size:large;color: #BE996A;">© تمام حقوق محفوظ است
                                    - گروه هنرمندان طلاساز پیوه ژن</span><span
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
                    <span id="art-footnote-links" style="color:#646464;font-family: iranyekan;font-size:medium ;"> طراحی
                        شده توسط <a style="color: #646464;font-family: iranyekan;font-size:medium ;"
                            href="http://pdr.co.ir/" target="_blank">پارسیان داده پرداز</a></span>
                </p>
            </div>
        </footer>

    </div>

</body>

</html>