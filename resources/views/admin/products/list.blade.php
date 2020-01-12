@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$products->isEmpty() || true)
            <div class="box">
                <div class="box-body">
                    <h2>Products</h2>
                    @include('layouts.search_date', ['route' => route('admin.products.index')])
                    @include('admin.shared.products', ['abbas', $abbas])
                    {{ $products->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @else
            <h3>
            No Products
            </h3>
        @endif

    </section>
    <!-- /.content -->
@endsection
