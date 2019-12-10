<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if($user->image_path!=null && $user->image_path!=''): ?>
                <img src="/storage/<?php echo e($user->image_path); ?>" class="img-circle" alt="User Image">
                <?php else: ?>
                <img src="<?php echo e(asset('img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="pull-left info">
                <p><?php echo e($user->name); ?> <?php echo e($user->sir_name); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">HOME</li>
            <li><a href="<?php echo e(route('admin.dashboard')); ?>"> <i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo e(route('home')); ?>"> <i class="fa fa-window-maximize"></i> Site</a></li>
            <li class="header">SELL</li>
            <li class="treeview <?php if(request()->segment(2) == 'products' || request()->segment(2) == 'attributes' || request()->segment(2) == 'brands'): ?> active <?php endif; ?>">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Products</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if($user->hasPermission('view-product')): ?><li><a href="<?php echo e(route('admin.products.index')); ?>"><i class="fa fa-circle-o"></i> List products</a></li><?php endif; ?>
                    <?php if($user->hasPermission('create-product')): ?><li><a href="<?php echo e(route('admin.products.create')); ?>"><i class="fa fa-plus"></i> Create product</a></li><?php endif; ?>
                    <!-- <li class="<?php if(request()->segment(2) == 'attributes'): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-gear"></i> <span>Attributes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.attributes.index')); ?>"><i class="fa fa-circle-o"></i> List attributes</a></li>
                        <li><a href="<?php echo e(route('admin.attributes.create')); ?>"><i class="fa fa-plus"></i> Create attribute</a></li>
                    </ul>
                    </li> -->
                    <!-- <li class="<?php if(request()->segment(2) == 'brands'): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-tag"></i> <span>Brands</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.brands.index')); ?>"><i class="fa fa-circle-o"></i> List brands</a></li>
                        <li><a href="<?php echo e(route('admin.brands.create')); ?>"><i class="fa fa-plus"></i> Create brand</a></li>
                    </ul>
                    </li> -->
                </ul>
            </li>
            <?php if($user->hasPermission('update-order')): ?>
            <li class="treeview <?php if(request()->segment(2) == 'categories'): ?> active <?php endif; ?>">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Categories</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.categories.index')); ?>"><i class="fa fa-circle-o"></i> List categories</a></li>
                    <li><a href="<?php echo e(route('admin.categories.create')); ?>"><i class="fa fa-plus"></i> Create category</a></li>
                </ul>
            </li>
            <li class="treeview <?php if(request()->segment(2) == 'customers' || request()->segment(2) == 'addresses'): ?> active <?php endif; ?>">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Customers</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.customers.index')); ?>"><i class="fa fa-circle-o"></i> List customers</a></li>
                    <li><a href="<?php echo e(route('admin.customers.create')); ?>"><i class="fa fa-plus"></i> Create customer</a></li>
                    <!-- <li class="<?php if(request()->segment(2) == 'addresses'): ?> active <?php endif; ?>">
                        <a href="#"><i class="fa fa-map-marker"></i> Addresses
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(route('admin.addresses.index')); ?>"><i class="fa fa-circle-o"></i> List addresses</a></li>
                            <li><a href="<?php echo e(route('admin.addresses.create')); ?>"><i class="fa fa-plus"></i> Create address</a></li>
                        </ul>
                    </li> -->
                </ul>
            </li>
            <?php endif; ?>
            <li class="header">ORDERS</li>
            <li class="treeview <?php if(request()->segment(2) == 'orders'): ?> active <?php endif; ?>">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Orders</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.orders.index')); ?>"><i class="fa fa-circle-o"></i> List orders</a></li>
                </ul>
            </li>
            <!-- <li class="treeview <?php if(request()->segment(2) == 'order-statuses'): ?> active <?php endif; ?>">
                <a href="#">
                    <i class="fa fa-anchor"></i> <span>Order Statuses</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.order-statuses.index')); ?>"><i class="fa fa-circle-o"></i> List order statuses</a></li>
                    <li><a href="<?php echo e(route('admin.order-statuses.create')); ?>"><i class="fa fa-plus"></i> Create order status</a></li>
                </ul>
            </li> -->
            <!-- <li class="header">DELIVERY</li>
            <li class="treeview <?php if(request()->segment(2) == 'couriers'): ?> active <?php endif; ?>">
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Couriers</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.couriers.index')); ?>"><i class="fa fa-circle-o"></i> List couriers</a></li>
                    <li><a href="<?php echo e(route('admin.couriers.create')); ?>"><i class="fa fa-plus"></i> Create courier</a></li>
                </ul>
            </li> -->
            <?php if($user->hasRole('admin|superadmin')): ?>
                <li class="header">CONFIG</li>
                <li class="treeview <?php if(request()->segment(2) == 'employees' || request()->segment(2) == 'roles' || request()->segment(2) == 'permissions'): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-star"></i> <span>Employees</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.employees.index')); ?>"><i class="fa fa-circle-o"></i> List employees</a></li>
                        <li><a href="<?php echo e(route('admin.employees.create')); ?>"><i class="fa fa-plus"></i> Create employee</a></li>
                        <li class="<?php if(request()->segment(2) == 'roles'): ?> active <?php endif; ?>">
                            <a href="#">
                                <i class="fa fa-star-o"></i> <span>Roles</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo e(route('admin.roles.index')); ?>"><i class="fa fa-circle-o"></i> List roles</a></li>
                            </ul>
                        </li>
                        <li class="<?php if(request()->segment(2) == 'permissions'): ?> active <?php endif; ?>">
                            <a href="#">
                                <i class="fa fa-star-o"></i> <span>Permissions</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo e(route('admin.permissions.index')); ?>"><i class="fa fa-circle-o"></i> List permissions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?php if(request()->segment(2) == 'countries' || request()->segment(2) == 'provinces'): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-flag"></i> <span>Countries</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('admin.countries.index')); ?>"><i class="fa fa-circle-o"></i> List</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->