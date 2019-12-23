@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.news.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <textarea name="title" id="title" class="form-control" >{{ old('title') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_path">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image_path" id="image_path" class="form-control">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.news.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
