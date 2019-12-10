<?php
if(!isset($locale)) {
    $locale = Session::get('locale');
    if($locale=='' || $locale==null) {
        $locale = 'fa';
    }
    App::setlocale($locale);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-9325492-23"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo e(env('GOOGLE_ANALYTICS')); ?>');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name')); ?></title>
    <title>Laracom - Laravel FREE E-Commerce Software</title>
    <meta name="description" content="Modern open-source e-commerce framework for free">
    <meta name="tags" content="modern, opensource, open-source, e-commerce, framework, free, laravel, php, php7, symfony, shop, shopping, responsive, fast, software, blade, cart, test driven, adminlte, storefront">
    <meta name="author" content="Jeff Simons Decena">
    <link href="<?php echo e(asset('css/style.min.css')); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')); ?>"></script>
    <![endif]-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('favicons/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('favicons/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicons/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('favicons/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('favicons/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicons/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('favicons/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('favicons/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('favicons/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(asset('favicons/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicons/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicons/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicons/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('favicons/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('favicons/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <?php echo $__env->yieldContent('css'); ?>
    <meta property="og:url" content="<?php echo e(request()->url()); ?>"/>
    <?php echo $__env->yieldContent('og'); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js')); ?>"></script>
</head>
<body>
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
<section>
    <div class="row hidden-xs">
        <div class="container">
            <div class="clearfix"></div>
            <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(auth()->check()): ?>
                        <li><a href="<?php echo e(route('accounts', ['tab' => 'profile'])); ?>"><i class="fa fa-home"></i> <?php echo e(__('main.my_account')); ?></a></li>
                        <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i> <?php echo e(__('main.logout')); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('login')); ?>"> <i class="fa fa-lock"></i> <?php echo e(__('main.login')); ?></a></li>
                        <li><a href="<?php echo e(route('register')); ?>"> <i class="fa fa-sign-in"></i> <?php echo e(__('main.register')); ?></a></li>
                    <?php endif; ?>
                    <?php if($locale!='fa'): ?>
                    <li><a href="/lang/fa">Fa</a></li>
                    <?php endif; ?>
                    <?php if($locale!='en'): ?>
                    <li><a href="/lang/en">En</a></li>
                    <?php endif; ?>
                    <li id="cart" class="menubar-cart">
                        <a href="<?php echo e(route('cart.index')); ?>" title="View Cart" class="awemenu-icon menu-shopping-cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="cart-number"><?php echo e($cartCount); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header id="header-section">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-2">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><?php echo e(config('app.name')); ?></a>
                </div>
                <div class="col-md-10">
                    <?php echo $__env->make('layouts.front.header-cart', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </nav>
    </header>
</section>
<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/front.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
</body>
</html>