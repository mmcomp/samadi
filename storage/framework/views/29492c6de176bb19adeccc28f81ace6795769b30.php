<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php echo $__env->make('layouts.front.category-nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <ul class="nav navbar-nav navbar-right">
        <?php if(auth()->check()): ?>
            <li class="visible-xs"><a href="<?php echo e(route('accounts', ['tab' => 'profile'])); ?>"><i class="fa fa-home"></i> <?php echo e(__('main.my_account')); ?></a></li>
            <li class="visible-xs"><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out"></i> <?php echo e(__('main.logout')); ?></a></li>
        <?php else: ?>
            <li class="visible-xs"><a href="<?php echo e(route('login')); ?>"> <i class="fa fa-lock"></i> <?php echo e(__('main.login')); ?></a></li>
            <li class="visible-xs"><a href="<?php echo e(route('register')); ?>"> <i class="fa fa-sign-in"></i> <?php echo e(__('main.register')); ?></a></li>
        <?php endif; ?>
        <li id="cart" class="menubar-cart visible-xs">
            <a href="<?php echo e(route('cart.index')); ?>" title="View Cart" class="awemenu-icon menu-shopping-cart">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="cart-number"><?php echo e($cartCount); ?></span>
            </a>
        </li>
        <li>
            <!-- search form -->
            <form action="<?php echo e(route('search.product')); ?>" method="GET" class="form-inline" style="margin: 15px 0 0;">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="<?php echo e(__('main.search')); ?>..." value="<?php echo request()->input('q'); ?>">
                    <span class="input-group-btn">
                        <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> <?php echo e(__('main.search')); ?></button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
        </li>
    </ul>
</div><!-- /.navbar-collapse -->