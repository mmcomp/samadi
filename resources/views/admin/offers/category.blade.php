@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($offerCategories)
            <div class="box">
                <div class="box-body">
                    <h2>Category Offers</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Offer</td>
                                <td class="col-md-2">Category</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($offerCategories as $offerCategory)
                            <tr>
                                <td>{{ $offerCategory->id }}</td>
                                <td>{{ $offerCategory->offer->name }}</td>
                                <td>{{ $offerCategory->category->name_fa }}</td>
                                <td>
                                    <form action="{{ route('admin.offers.category_destroy', $offerCategory->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection