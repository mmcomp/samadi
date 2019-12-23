@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($customers)
            <div class="box">
                <div class="box-body">
                    <h2>Customers</h2>
                    @include('layouts.search', ['route' => route('admin.customers.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-1">ID</td>
                                <td class="col-md-2">Image</td>
                                <td class="col-md-2">Name</td>
                                <!-- <td class="col-md-2">Email</td> -->
                                <td class="col-md-1">Sales</td>
                                <td class="col-md-1">Files</td>
                                <td class="col-md-1">Likes</td>
                                <td class="col-md-2">Status</td>
                                <td class="col-md-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer['id'] }}</td>
                                <td>
                                @if($customer['image_path']!=null && $customer['image_path']!='')
                                <img src="/storage/{!! $customer['image_path']  !!}" style="height: 50px;"/>
                                @endif
                                </td>
                                <td>{{ $customer['name'] }} {{ $customer['sir_name'] }}</td>
                                <!-- <td>{{ $customer['email'] }}</td> -->
                                <td>{{ $customer['sales_count'] }}</td>
                                <td>{{ $customer['files_count'] }}</td>
                                <td>{{ $customer['likes_count'] }}</td>
                                <td>
                                    <!-- <div class="text-center"> -->
                                    @include('layouts.status', ['status' => $customer['status']])
                                    <!-- </div>
                                    <div class="text-center">
                                    <span class="btn btn-primary btn-sm" title="Sales Count">
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ $customer['sales_count'] }}
                                    </span>
                                    <span class="btn btn-primary btn-sm" title="Files Count">
                                        <i class="fa fa-file"></i>
                                        {{ $customer['files_count'] }}
                                    </span>
                                    <span class="btn btn-primary btn-sm" title="Likes Count">
                                        <i class="fa fa-thumbs-up"></i>
                                        {{ $customer['likes_count'] }}
                                    </span>
                                    </div> -->
                                </td>
                                <td>
                                    <form action="{{ route('admin.customers.destroy', $customer['id']) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <!-- <a href="{{ route('admin.customers.show', $customer['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a> -->
                                            <a href="{{ route('admin.customers.edit', $customer['id']) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                    <div>
                        Customer Count : {{ count($customers) }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection