@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($slides)
            <div class="box">
                <div class="box-body">
                    <h2>Slides</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Image</td>
                                <td class="col-md-2">Created At</td>
                                <td class="col-md-2">Updated At</td>
                                <td class="col-md-2">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($slides as $slide)
                            <tr>
                                <td>{{ $slide->id }}</td>
                                @if($slide->image_path)
                                <td><img src="/storage/{{ $slide->image_path }}" style="height: 50px;" /></td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ date("Y/m/d", strtotime($slide->created_at)) }}</td>
                                <td>{{ date("Y/m/d", strtotime($slide->updated_at)) }}</td>
                                <td>
                                    <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
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