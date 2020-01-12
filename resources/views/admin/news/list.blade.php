@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($news)
            <div class="box">
                <div class="box-body">
                    <h2>News</h2>
                    @include('layouts.search_date', ['route' => route('admin.news.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Title</td>
                                <td class="col-md-2">Image</td>
                                <td class="col-md-2">Created At</td>
                                <td class="col-md-2">Updated At</td>
                                <td class="col-md-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($news as $theNews)
                            <tr>
                                <td>{{ $theNews->id }}</td>
                                <td>{{ $theNews->title }}</td>
                                @if($theNews->image_path)
                                <td><img src="/storage/{{ $theNews->image_path }}" style="height: 50px;" /></td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ date("Y/m/d", strtotime($theNews->created_at)) }}</td>
                                <td>{{ date("Y/m/d", strtotime($theNews->updated_at)) }}</td>
                                <td>
                                    <form action="{{ route('admin.news.destroy', $theNews->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.news.edit', $theNews->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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