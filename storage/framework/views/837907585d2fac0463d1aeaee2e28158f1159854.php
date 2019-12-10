<!DOCTYPE html>
<html dir="rtl" lang="en-US">

<head>
    <!-- Created by Artisteer v4.1.0.60046 -->
    <meta charset="utf-8">
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="css/style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="css/style.responsive.css" media="all">

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/script.responsive.js"></script>
    <?php echo $__env->yieldContent('og'); ?>
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>
    <div id="art-main">
        <div id="art-header-bg">
        </div>
        <div id="art-hmenu-bg" class="art-bar art-nav">
        </div>
        <div class="art-sheet clearfix">
            <header class="art-header">

                <div class="art-shapes">
                    <div class="art-object373449907" data-left="56.93%"></div>
                    <div class="art-textblock art-object1367709998" data-left="58.36%">
                        <div class="art-object1367709998-text-container">
                            <div class="art-object1367709998-text">
                                <p style="text-align: center; "><span
                                        style="text-align: center; color: rgb(214, 196, 143); "><span
                                            style="text-decoration: overline; font-family: 'Vladimir Script', Arial, 'Arial Unicode MS', Helvetica, sans-serif; color: #D6C48F; ">Pivezhan</span><br
                                            style="">Jewellry Design</span></p>
                            </div>
                        </div>

                    </div>
                </div>

                <h1 class="art-headline" data-left="60.5%">
                    <a href="#">مرجع تخصصی طرح های سه بعدی طلا و جواهر در ایران</a>
                </h1>





                <nav class="art-nav">
                    <div class="art-nav-inner">
                        <ul class="art-hmenu">
                            <li><a href="/home" class="">صفحه نخست</a></li>
                            <li><a href="#" class="">نمونه کارها</a></li>
                            <li><a href="#" class="active">محصولات</a>
                                <ul class="active">
                                    <li><a href="#" class="active">مدال</a></li>
                                    <li><a href="#">دستبند</a></li>
                                    <li><a href="#">نیم ست</a></li>
                                    <li><a href="#">حلقه ست</a></li>
                                    <li><a href="#">انگشتر</a></li>
                                    <li><a href="#">گردنبند</a></li>
                                    <li><a href="#">گوشواره</a></li>
                                    <li><a href="#">ابزار جواهرات</a></li>
                                </ul>
                            </li>
                            <li><a href="#">سوالات متداول</a></li>
                            <li><a href="#">آموزش</a></li>
                            <li><a href="#">درباره ما</a></li>
                            <li><a href="#">تماس باما</a></li>
                            <?php if(auth()->check()): ?>
                            <li><a href="#">اطلاعات کاربری</a>
                                <ul>
                                    <li><a href="/accounts?tab=profile">داشبورد من</a></li>
                                    <li><a href="/accounts?tab=profile">درج محصولات</a></li>
                                    <li><a href="/accounts?tab=profile">تغییر کلمه عبور</a></li>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li><a href="/register">ثبت نام</a></li>
                            <li><a href="/login">ورود به سایت</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>


            </header>
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                            <article class="art-post art-article">
                            <?php echo $__env->yieldContent('content'); ?>
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
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell layout-item-5" style="width: 50%">
                            <p style="text-align: center;"><span style="color: #BE996A;"><br>© تمام حقوق محفوظ است -
                                    گروه هنرمندان طلاساز پیوه ژن</span><span
                                    style="color: rgb(189, 153, 105); font-family: BYekan, Tahoma, Helvetica, sans-serif; font-size: 11px;"><br></span>
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

                <!-- <p class="art-page-footer">
                    <span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a>
                        created with Artisteer.</span>
                </p> -->
            </div>
        </footer>
    </div>
    <?php echo $__env->yieldContent('body'); ?>
</body>

</html>