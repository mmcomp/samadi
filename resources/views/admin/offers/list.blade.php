@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($offers)
            <div class="box">
                <div class="box-body">
                    <h2>Offers</h2>
                    @include('layouts.search', ['route' => route('admin.offers.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Name</td>
                                <td class="col-md-2">Description</td>
                                <td class="col-md-2">Start Date</td>
                                <td class="col-md-2">End Date</td>
                                <td class="col-md-2">Percent</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer['id'] }}</td>
                                <td>{{ $offer['name'] }}</td>
                                <td>{{ $offer['description'] }}</td>
                                <td>{{ date("Y/m/d", strtotime($offer['start_date'])) }}</td>
                                <td>{{ date("Y/m/d", strtotime($offer['end_date'])) }}</td>
                                <td>{{ $offer['percent'] }}</td>
                                <td>
                                    <form action="{{ route('admin.offers.destroy', $offer['id']) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.offers.edit', $offer['id']) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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