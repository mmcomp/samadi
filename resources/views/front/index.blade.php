@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('head')
<style>
.art-content .art-postcontent-0 .layout-item-0 { color: #4A4A4A; background: #FFFFFF;  border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-1 { color: #4A4A4A; padding: 25px;  }
.art-content .art-postcontent-0 .layout-item-2 { color: #454545; background: #FFFFFF url('images/f2d72.png') top center no-repeat scroll;  }
.art-content .art-postcontent-0 .layout-item-3 { color: #454545; padding: 25px;  }
.art-content .art-postcontent-0 .layout-item-4 { color: #4A4A4A; padding: 0px;  }
.art-content .art-postcontent-0 .layout-item-5 { color: #4A4A4A; background: #FFFFFF; border-spacing: 3px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-6 { color: #4A4A4A; padding: 5px;  }
.art-content .art-postcontent-0 .layout-item-7 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-width:0px;border-top-color:#A6A6A6;border-right-color:#A6A6A6;border-bottom-color:#A6A6A6;border-left-color:#A6A6A6; color: #F2F2F2; background: ;  border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-8 { color: #F2F2F2; padding: 25px;  }
.art-content .art-postcontent-0 .layout-item-9 { color: #454545; background: #FFFFFF url('images/6c8a5.png') top center no-repeat scroll;  border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-10 { color: #F2F2F2; background: ; border-spacing: 3px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-11 { color: #F2F2F2; padding: 15px;  }
.art-content .art-postcontent-0 .layout-item-12 { color: #F2F2F2; padding: 5px;  }
.art-content .art-postcontent-0 .layout-item-13 { color: #454545; background: #FFFFFF url('images/fd227.png') top center no-repeat scroll; border-spacing: 3px 0px; border-collapse: separate;  }
.art-content .art-postcontent-0 .layout-item-14 { color: #454545; background: #FFFFFF url('images/47535.png') top center no-repeat scroll; border-spacing: 3px 0px; border-collapse: separate;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
</style>
@endsection

@section('content')
<div class="art-layout-wrapper">
    <div class="art-content-layout">
        <div class="art-content-layout-row">
            <div class="art-layout-cell art-content">
                <article class="art-post art-article">


                    <div class="art-postcontent art-postcontent-0 clearfix">
                        <div class="art-content-layout layout-item-0">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-1" style="width: 100%">
                                    <p><br></p>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-0">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-1" style="width: 25%">
                                    <p>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
                                            type="text/javascript">
                                        </script>
                                        <script
                                            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"
                                            type="text/javascript"></script>



                                    </p>
                                    <div class="container">
                                        <form>
                                            <div style="text-align:right;dir:rtl" class="form-group"><label for="sel1"
                                                    style="font-size: 16px;">گروه کاری خود را انتخاب کنید</label><br>
                                                <select style="text-align:right;width:100%;height:43px;border-radius:5px;padding:7px;margin:10px;border-color: black;
        " class="form-control" id="sel1">
                                                    <option>النگو</option>
                                                    <option>انگشتر</option>
                                                    <option>نیم ست</option>
                                                    <option>خلخال</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="art-layout-cell layout-item-1" style="width: 25%">
                                    <p>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
                                            type="text/javascript">
                                        </script>
                                        <script
                                            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"
                                            type="text/javascript"></script>



                                    </p>
                                    <div class="container">
                                        <form>
                                            <div style="text-align:right;dir:rtl;" class="form-group"><label for="sel1"
                                                    style="font-size: 16px;">نوع پرداخت</label><br>
                                                <select style="text-align:right;width:100%;height:43px;border-radius:5px;padding:7px;margin:10px;border-color: black;
        " class="form-control" id="sel1">
                                                    <option>رایگان</option>
                                                    <option>پولی</option>
                                                    <option>هردو</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="art-layout-cell layout-item-1" style="width: 25%">
                                    <p><span style="text-align: right; width: 100%; height: 40px; border-top-left-radius: 5px 5px; border-top-right-radius: 5px 5px; border-bottom-right-radius: 5px 5px; border-bottom-left-radius: 5px 5px; padding-top: 7px; padding-right: 7px; padding-bottom: 7px; padding-left: 7px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; font-size: 16px;"
                                            text-align:="">اینجا تایپ کنید</span></p>
                                    <form class="art-search" name="search" action="#" id="search"><span
                                            style="text-align: right; width: 100%; height: 40px; border-top-left-radius: 5px 5px; border-top-right-radius: 5px 5px; border-bottom-right-radius: 5px 5px; border-bottom-left-radius: 5px 5px; padding-top: 7px; padding-right: 7px; padding-bottom: 7px; padding-left: 7px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; font-size: 16px;"
                                            text-align:=""><input type="text"><a class="art-search-button" href="#"
                                                onclick="javascript:jQuery(this).parents('form').submit();"><span
                                                    class="art-search-button-text">Search</span></a></span></form><span
                                        style="color: rgb(118, 76, 5);"><br></span>
                                    <p>
                                    </p>
                                </div>
                                <div class="art-layout-cell layout-item-1" style="width: 25%">
                                    <p style="text-align: center;"><span
                                            style="text-align:center;width:100%;height:40px;border-radius:5px;padding:7px;margin:10px;"><br></span>
                                    </p>
                                    <p style="text-align: center;"><span
                                            style="text-align:center;width:100%;height:40px;border-radius:5px;padding:7px;margin:10px;">&nbsp;
                                            <a href="http://ppdf.ir" target="_parent" title="جستجو کنید"
                                                class="art-button">جستجو کنید</a>
                                            &nbsp;</span><br></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Search Contain -->

                        <div class="art-content-layout layout-item-2">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-3" style="width: 100%">
                                    <h1 style="text-align: center;"><span style="font-family: 'iranyekan';"><br></span>
                                    </h1>
                                    <h1 style="text-align: center;"><span
                                            style="font-family: 'iranyekan'; color: #000000;">جدیدترین نمونه
                                            کارهای ارسال شده</span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-0">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p style="text-align: center;"><img width="100%" height="100%" alt=""
                                            class="art-lightbox" src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p style="text-align: center;"><img width="100%" height="100%" alt=""
                                            class="art-lightbox" src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p style="text-align: center;"><img width="100%" height="100%" alt=""
                                            class="art-lightbox" src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p style="text-align: center;"><img width="100%" height="100%" alt=""
                                            class="art-lightbox" src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p style="text-align: center;"><img width="100%" height="100%" alt=""
                                            class="art-lightbox" src="images/11-1-copy.jpg"><br></p>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-5">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-6" style="width: 100%">
                                    <p><br></p>
                                    <p><br></p>
                                    <p><br></p>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-7">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-8" style="width: 100%">
                                    <p style="text-align: center;"><span
                                            style="color: rgb(92, 70, 40); font-size: 16px;"><br></span></p>
                                    <p style="text-align: center;"><span style="font-family: IRANYekan;"><span
                                                style="font-size: 16px; color: rgb(252, 230, 191); text-shadow: rgb(246, 172, 44) 0px 0px 25px;">---
                                                &nbsp; <span style="text-shadow: rgb(246, 172, 44) 0px 0px 25px;">عضویت
                                                    در خبرنامه مجموعه طراحان
                                                    طلا و جواهر پیوه ژن</span> &nbsp; ---</span><br></span></p>
                                    <p style="text-align: center;"><span
                                            style="font-size: 16px; color: #FACD80;"><br></span></p>
                                    <p style="text-align: center;"><input type="text"><span
                                            style="color: #BE996A; font-size: 16px;">&nbsp;
                                            &nbsp; &nbsp;&nbsp;</span>&nbsp;<a href="#" target="_blank"
                                            title="عضویت در خبرنامه" class="art-button">عضویت در خبرنامه</a>&nbsp;</p>
                                    <p style="text-align: center;"><br></p>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-0">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-6" style="width: 100%">
                                    <p><br></p>
                                    <p><br></p>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-9">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-3" style="width: 100%">
                                    <h1 style="text-align: center;"><span
                                            style="color: rgb(67, 104, 107); font-family: 'iranyekan';"><br></span></h1>
                                    <h1 style="text-align: center;"><span
                                            style="font-family: 'iranyekan'; color: #000000;">پرفروش ترین نمونه
                                            کارهای ارسال شده</span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-0">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
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
                                            <span style="text-shadow: rgba(246, 172, 44, 0.976563) 0px 0px 12px;">&nbsp;
                                                هنر <span
                                                    style="text-shadow: rgba(246, 172, 44, 0.976563) 0px 0px 25px;">نمایی</span>
                                                های ما را در
                                                فضای مجازی دنبال کنید</span> &nbsp; ---</span></p>
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
                                    <p><br></p>
                                </div>
                            </div>
                        </div>
                        <!-- Start پرکارترین ها -->
                        <div class="art-content-layout layout-item-13">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-3" style="width: 100%">
                                    <p style="text-align: left;"><span style="font-size: 18px;"><br></span></p>
                                    <p style="text-align: center;"><span
                                            style="font-size: 18px; text-align: left; color: #000000;">پر کار ترین
                                            نمونه های ارسال شده</span><br></p>
                                </div>
                            </div>
                        </div>
                        <!-- End پرکارترین ها -->
                        <div class="art-content-layout layout-item-0">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
                                            src="images/11-1-copy.jpg"><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-4" style="width: 20%">
                                    <p><img width="100%" height="100%" alt="" class="art-lightbox"
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
                                            style="font-family: IRANYekan; color: #000000;">جدیدترین اخبار و مطالب
                                            جذاب و خواندنی</span><br></h1>
                                </div>
                            </div>
                        </div>
                        <div class="art-content-layout layout-item-5">
                            <div class="art-content-layout-row">
                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                            class="art-lightbox"
                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                    </p>
                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم افزار ماتریکس
                                    </p>
                                </div>
                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                            class="art-lightbox"
                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                    </p>
                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم افزار ماتریکس
                                    </p>
                                    <p><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                            class="art-lightbox"
                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                    </p>
                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم افزار ماتریکس
                                    </p>
                                    <p><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                            class="art-lightbox"
                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                    </p>
                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم افزار ماتریکس
                                    </p>
                                    <p><br></p>
                                </div>
                                <div class="art-layout-cell layout-item-1" style="width: 20%">
                                    <p style="text-align: center;"><img width="99" height="99" alt=""
                                            class="art-lightbox"
                                            src="images/68719970-vector-jewelry-logo-design-template-circle-ring-with-blue-stone-crystal-wedding-ring.jpg"><br>
                                    </p>
                                    <p style="text-align: center;">آموزش ساخت طلا و زیورآلات از طریق نرم افزار ماتریکس
                                    </p>
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
@endsection