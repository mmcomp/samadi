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
<link rel="stylesheet" href="css/about-style.css" media="screen">
<link rel="stylesheet" href="css/about-style.responsive.css" media="all">
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
        <div class="art-content-layout-row">
          <div class="art-layout-cell layout-item-3" style="width: 100%">
            <br>
            <div
              style="text-align: JUSTIFY;line-height:220%;direction:RTL;width: 90%;font-size: 20PX;padding-right: 5%;margin-left: 10%;">
              با ورود فناوری به دنیای آدمی شاهد جهشی بزرگ به‌سوی تحولی عظیم هستیم که اگر با آن هم‌راستا و همسو نشویم
              فرجامی جز فراموش‌شدن و ماندن در بین چرخ‌دنده‌های دنیای دیجیتال امروز نخواهیم داشت، روش‌های سنتی گذشته راه
              را برای پیشرفت‌های جهانی تنگ و دست‌وپای آدمی را به غل و زنجیر می‌کشد، گروه تولیدی و طراحی پیوه ژن
              بزرگ‌ترین تیم تولیدی در شرق کشور باهدفی بزرگ و آرمانی امروزه پای در دنیای هزار رنگ دیجیتال گذاشته تا به
              مدد خداوند بزرگ تحولی عظیم در صنعت جواهرسازی کشور ایجاد نماید، تحولی که تا حال هیچ کشوری آن را تجربه
              ننموده است.
              تیم بزرگ و پرتلاش این برند نه‌تنها خود سال‌هاست برتری‌اش را در میدان‌های داخلی و خارجی با حضوری پررنگ نشان
              داده، بلکه امروز باهدفی فراتر ازآنچه تاکنون برای آن می‌کوشیده به میدان رقابت واردشده است، حمایت همه‌جانبه
              از طراحان ایرانی که گاه طرح و نقش‌هایشان بی‌بدیل و چشم‌نواز اما در گوشه‌ای محجور مانده است، نشان از همت و
              عزم راسخ این رادمردان دارد.
              مدیرعامل این برند بزرگ که خود یکی از افتخارات و شرکت‌کنندگان در تمامی نمایشگاه‌های تخصصی طلا و جواهر خارج
              از کشور است سال‌هاست در بین تولیدکنندگان مشهدی مانند نگینی می‌درخشد و باتجربه‌ای گران‌قدر از این سال‌ها
              حضورش در این وب‌سایت و با طرحی نو غنیمتی است که امروزه از طرف طراحان کل کشور باید موردتوجه ویژه قرار گیرد.
              <br> <br> <span style="color: red;font-size: 22px;"> هدف از طراحی وب‌سایت:</span> <br><br>
              بالا بودن نرخ ارز در کشور امر صادرات جواهرات را به‌صرفه قرار داده است و این خود زمینه‌ساز ایده‌ای جدید گشت
              و کار با طراحی یک وب‌سایت کلید خود و امروز طراحان عزیز کشور از هر شهر و منطقه‌ای می‌توانند فایل طرح‌های
              جواهرات خود را برای این وب‌سایت ارسال کرده و پس از بررسی‌های کارشناسانه توسط تیم خبره و کاربرد برند پیوه
              ژن و اعمال‌نظرهای فنی به‌عنوان طرح‌های برگزیده قیمت‌گذاری و در سایت برای نمایش عموم آپلود گردد، البته کار
              به همین‌جا ختم نشده و این فعالیت فقط مقدمه‌ای برای رسیدن به هدف نهایی یعنی حضور در نمایشگاه‌های بین‌المللی
              است.
              این تولیدکنندۀ مشهدی و کارآفرین برتر که سال‌ها خود تجربه طراحی نیز داشته در پروندۀ افتخارات خود تأسیس مرکز
              بزرگ طراحی برای علاقه‌مندان را بر پیشانی برند خود حک نموده است به همین دلیل است که با پیچ‌وخم راه آشنا
              بوده و مشکلات این قشر از جامعه را از نزدیک حس می‌کند و با اتکا به این امر مهم و همچنین تصمیم وی به برداشتن
              گامی بلند و اصولی، زمینه‌ساز طراحی این وب‌سایت می‌گردد تا در آن بتواند حامی طراحان ایرانی باشد و به کمک
              ایده‌ای جدید کاری جدید را پایه‌ریزی نماید، حضور در بازارهای جهانی و نمایشگاه‌های بین‌المللی شاید سال‌ها
              تصور محال بسیاری از طراحان بوده که حال توسط این وب‌سایت محقق گشته است.
              ثبت‌نام و ارسال طرح‌ها به این وب‌سایت یعنی ارائه آن‌ها در غرفۀ نمایشگاه‌های بزرگ و معتبر که پرزند آن را
              این تیم برعهده‌گرفته و یافتن مشتریان جهانی و فروش و درآمدی فوق‌العاده و بی‌نظیر که برای تمامی طراحان حاضر
              در این وب‌سایت توسط گروه تولیدی پیوه ژن محیا گشته است و این به معنای بازاریابی در سطح جهانی است که امروزه
              موفق‌ترین برندهای جهان از آن بهره‌مند می‌شوند.
              اقدام به تأسیس یک دفتر مستقل در شهر استانبول به‌منظور راحتی و در دسترس بودن مشتریان خارجی خود به‌تنهایی
              می‌تواند یک پشتوانۀ قوی برای این آرمان بلند باشد زیرا بدین‌صورت جلب اعتماد این مشتریان به صدق نیت و فعالیت
              این برند بیشتر شده و خود زمینه‌ساز فعالیت‌هایی دوسویه را فراهم می‌کند این اقدامات مانند پازلی در کنار هم
              می‌تواند تحقق نمودن تحول عظیم در صنعت طراحی جواهرات را نوید بخشد.
              <br> <br> <span style="color: red;font-size: 22px;"> پیشینه‌های برند پیوه ژن: </span><br><br>
              سه سال پیش با تأسیس مرکز بزرگ طراحی کار این گروه پرتلاش آغاز شد و با ثبت‌نام از علاقه‌مندان و دعوت از
              بهترین اساتید ایران در بزرگ‌ترین آکادمی طراحی طلا و جواهر ایران به آموزش نسلی جدید از طراحان اقدام نمود در
              همین حین بود که جرقه‌های کار بزرگ‌تری در سطح بین‌المللی زده شد و این وب‌سایت باهدف جذب طراح‌های حرفه‌ای
              سطح کشور متولد گشت تا خدمتی فراتر را در اختیار طراحان ایرانی و خصوصاً مشهدی قرار دهد، جمع نمودن فایل‌های
              طراحی از دانش‌آموختگان و هر طراح علاقه‌مند دیگر و یافتن مشتریانی در سطح کشور و بعدازآن حضور در غرفه‌های
              نمایشگاه‌های بین‌المللی و یافتن مشتریان خارجی برای این طرح‌ها و فروش آنلاین در کنار فروش فیزیکی خدمتی بزرگ
              در جهت بهره‌مندی بیشتر و سرازیر نمودن سود اصلی به جیب این طراحان و حذف واسطه‌ها است.
              فعالیت‌های بزرگ بین‌المللی که در سایۀ صادراتی بدون کوچک‌ترین زحمت و هزینه‌های هنگفت صورت می‌پذیرد یکی از
              هدایای دنیای دیجیتالی امروز است که اگر به‌صورت صحیح از آن استفاده شود می‌تواند درنهایت حامی طراحان ایرانی
              بوده و در جهت نیل به هدف تبدیل هر یک از آن‌ها به یک کارآفرین موفق گام‌های مؤثری بردارد.
              <br> <br> <span style="color: red;font-size: 22px;"> صادرات در دنیای دیجیتالی: </span><br><br>
              صادرات آسان یعنی صادراتی که در عرض چند ثانیه فراهم می‌شود و هیچ نیازی به طی مسافت‌های طولانی و ترانزیت
              ندارد، مشتریان از تمامی کشورها وارد این وب‌سایت شده و در دنیای متنوع طرح‌های آن غرق می‌شوند و سپس با چند
              کلیک کوچک اقدام به خرید می‌نمایند در این حالت تمامی طراحان می‌توانند خود به‌تنهایی به‌عنوان یک کارآفرین به
              جامعۀ معرفی‌شده و طرح‌هایشان که تا چندی پیش گمنام بود امروز به لطف این وب‌سایت به جهانیان معرفی ‌گردد.
              دیگر نمی‌شود در دنیای سرعت امروز به همان روش‌های قدیمی اکتفا نمود و انتظار موفقیت را داشت، بازاریابی
              دیجیتالی یا دیجیتال مارکتینگ یعنی حضور درصحنۀ قدرتمند وب برای یافتن سهم بیشتری از مشتریان که خدماتی چون
              فروش آنلاین را نیز پوشش داده و سرعت و رفاه را هم‌زمان برای افراد فراهم می‌کند، فروش فیزیکی اگرچه مزایای
              خاص خود را دارد اما به‌هیچ‌وجه توان مبارزه با فروش آنلاین را نخواهد داشت و اگر بخواهد به‌تنهایی وارد عمل
              شود شکست به‌زودی با او قرین خواهد شد، فروش در سطح بازارهای جهانی مزیتی است که فقط در سایه وب‌سایت‌ها فراهم
              می‌شود و تمامی افراد اگر می‌خواهند در میان انبوه رقیبان پایمال نشده و سهم مناسبی از بازار را به خود اختصاص
              دهند ناچارند هرچه زودتر به این کاروان دیجیتالی به پیوندند، پس برای رسیدن به موفقیت سریع‌تر دست‌به‌کار شده
              و طرح‌های زیبای خود را برای این وب‌سایت ارسال نمایید و به جمع بزرگ طراحان کشور ملحق شوید.
            </div><br>
          </div>
  </article>
</div>
@endsection