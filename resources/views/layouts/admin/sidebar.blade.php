<!-- =============================================== -->
@php
$isCustomer = isset($isCustomer)?$isCustomer:false;
@endphp
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if($user->image_path!=null && $user->image_path!='')
                <img src="/storage/{{ $user->image_path }}" class="img-circle" alt="User Image">
                @else
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }} {{ $user->sir_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">HOME</li>
            <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('home') }}"> <i class="fa fa-window-maximize"></i> Site</a></li>
            @if(!$isCustomer)
            <li class="header">REPORT</li>
            <li class="treeview @if(request()->segment(2) == 'reports') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Reports</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.product.selled') }}"><i class="fa fa-file"></i> Selled products</a></li>
                </ul>
            </li>
            @else
            <li class="header">COOPERATION REQUEST</li>
            <li class="treeview @if(request()->segment(2) == 'reports') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Cooperation</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" onclick="alert('In order to request cooperation , please be kind and create a ticket instead.');return false;"><i class="fa fa-file"></i> Request</a></li>
                </ul>
            </li>
            @endif
            <li class="header">SELL</li>
            <li class="treeview @if(request()->segment(2) == 'products' || request()->segment(2) == 'attributes' || request()->segment(2) == 'brands') active @endif">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Products</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($user->hasPermission('view-product'))<li><a href="{{ route('admin.products.index') }}"><i class="fa fa-circle-o"></i> List products</a></li>@endif
                    @if($user->hasPermission('create-product'))<li><a href="{{ route('admin.products.create') }}"><i class="fa fa-plus"></i> Create product</a></li>@endif
                    @if(isset($isCustomer) && $isCustomer)
                    <li><a href="/admin/products/selled"><i class="fa fa-file"></i> Selled products</a></li>
                    <li><a href="/admin/products/bookmarks"><i class="fa fa-bookmark"></i> Bookmarks</a></li>
                    @endif
                    <!-- <li class="@if(request()->segment(2) == 'attributes') active @endif">
                    <a href="#">
                        <i class="fa fa-gear"></i> <span>Attributes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.attributes.index') }}"><i class="fa fa-circle-o"></i> List attributes</a></li>
                        <li><a href="{{ route('admin.attributes.create') }}"><i class="fa fa-plus"></i> Create attribute</a></li>
                    </ul>
                    </li> -->
                    <!-- <li class="@if(request()->segment(2) == 'brands') active @endif">
                    <a href="#">
                        <i class="fa fa-tag"></i> <span>Brands</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.brands.index') }}"><i class="fa fa-circle-o"></i> List brands</a></li>
                        <li><a href="{{ route('admin.brands.create') }}"><i class="fa fa-plus"></i> Create brand</a></li>
                    </ul>
                    </li> -->
                </ul>
            </li>
            <li class="@if(request()->segment(2) == 'credit') active @endif">
                <a href="#">
                    <i class="fa fa-tag"></i> <span>Credits</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.transactions.income') }}"><i class="fa fa-circle-o"></i> List incomes</a></li>
                    <li><a href="{{ route('admin.transactions.cash') }}"><i class="fa fa-circle-o"></i> List credit to cash</a></li>
                    <li><a href="{{ route('admin.transactions.add') }}"><i class="fa fa-plus"></i> Add to credit</a></li>
                </ul>
            </li>
            @if($user->hasPermission('update-order'))
            <li class="treeview @if(request()->segment(2) == 'categories') active @endif">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Categories</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> List categories</a></li>
                    <li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-plus"></i> Create category</a></li>
                </ul>
            </li>
            <li class="treeview @if(request()->segment(2) == 'customers' || request()->segment(2) == 'addresses') active @endif">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Customers</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.customers.index') }}"><i class="fa fa-circle-o"></i> List customers</a></li>
                    <li><a href="{{ route('admin.customers.create') }}"><i class="fa fa-plus"></i> Create customer</a></li>
                    <!-- <li class="@if(request()->segment(2) == 'addresses') active @endif">
                        <a href="#"><i class="fa fa-map-marker"></i> Addresses
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.addresses.index') }}"><i class="fa fa-circle-o"></i> List addresses</a></li>
                            <li><a href="{{ route('admin.addresses.create') }}"><i class="fa fa-plus"></i> Create address</a></li>
                        </ul>
                    </li> -->
                </ul>
            </li>
            @endif
            <li class="header">ORDERS</li>
            <li class="treeview @if(request()->segment(2) == 'orders') active @endif">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Orders</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-circle-o"></i> List orders</a></li>
                </ul>
            </li>
            <!-- <li class="treeview @if(request()->segment(2) == 'order-statuses') active @endif">
                <a href="#">
                    <i class="fa fa-anchor"></i> <span>Order Statuses</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.order-statuses.index') }}"><i class="fa fa-circle-o"></i> List order statuses</a></li>
                    <li><a href="{{ route('admin.order-statuses.create') }}"><i class="fa fa-plus"></i> Create order status</a></li>
                </ul>
            </li> -->
            <!-- <li class="header">DELIVERY</li>
            <li class="treeview @if(request()->segment(2) == 'couriers') active @endif">
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Couriers</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.couriers.index') }}"><i class="fa fa-circle-o"></i> List couriers</a></li>
                    <li><a href="{{ route('admin.couriers.create') }}"><i class="fa fa-plus"></i> Create courier</a></li>
                </ul>
            </li> -->
            <li class="header">TICKETS</li>
            <li class="treeview @if(request()->segment(2) == 'tickets') active @endif">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Tickets</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.tickets.index') }}"><i class="fa fa-circle-o"></i> List tickets</a></li>
                    @if($isCustomer)<li><a href="{{ route('admin.tickets.create') }}"><i class="fa fa-plus"></i> Create ticket</a></li>@endif
                </ul>
            </li>
            @if($user->hasRole('admin|superadmin'))
                <li class="header">NEWS</li>
                <li class="treeview @if(request()->segment(2) == 'news') active @endif">
                    <a href="#">
                        <i class="fa fa-star"></i> <span>News</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.news.index') }}"><i class="fa fa-circle-o"></i> List news</a></li>
                        <li><a href="{{ route('admin.news.create') }}"><i class="fa fa-plus"></i> Create news</a></li>
                    </ul>
                </li>
                <li class="header">SLIDESHOW</li>
                <li class="treeview @if(request()->segment(2) == 'slides') active @endif">
                    <a href="#">
                        <i class="fa fa-star"></i> <span>SlideShows</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.slides.index') }}"><i class="fa fa-circle-o"></i> List slides</a></li>
                        <li><a href="{{ route('admin.slides.create') }}"><i class="fa fa-plus"></i> Create slides</a></li>
                    </ul>
                </li>
                <li class="header">CONFIG</li>
                <li class="treeview @if(request()->segment(2) == 'employees' || request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') active @endif">
                    <a href="#">
                        <i class="fa fa-star"></i> <span>Employees</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.employees.index') }}"><i class="fa fa-circle-o"></i> List employees</a></li>
                        <li><a href="{{ route('admin.employees.create') }}"><i class="fa fa-plus"></i> Create employee</a></li>
                        <li class="@if(request()->segment(2) == 'roles') active @endif">
                            <a href="#">
                                <i class="fa fa-star-o"></i> <span>Roles</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-circle-o"></i> List roles</a></li>
                            </ul>
                        </li>
                        <li class="@if(request()->segment(2) == 'permissions') active @endif">
                            <a href="#">
                                <i class="fa fa-star-o"></i> <span>Permissions</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('admin.permissions.index') }}"><i class="fa fa-circle-o"></i> List permissions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="treeview @if(request()->segment(2) == 'offers') active @endif">
                    <a href="#">
                        <i class="fa fa-star"></i> <span>Offers</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.offers.index') }}"><i class="fa fa-circle-o"></i> List offers</a></li>
                        <li><a href="{{ route('admin.offers.create') }}"><i class="fa fa-plus"></i> Create offer</a></li>
                        <li><a href="{{ route('admin.offers.category') }}"><i class="fa fa-circle-o"></i> List offer category</a></li>
                        <li><a href="{{ route('admin.offers.category_create') }}"><i class="fa fa-plus"></i> Create offer category</a></li>
                    </ul>
                </li>
                <li class="treeview @if(request()->segment(2) == 'countries' || request()->segment(2) == 'provinces') active @endif">
                    <a href="#">
                        <i class="fa fa-flag"></i> <span>Countries</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.countries.index') }}"><i class="fa fa-circle-o"></i> List</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->