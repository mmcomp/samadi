@extends('layouts.admin.app')

@php
$statuses = ['registered','processing','answered','closed'];
@endphp

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.slides.update', $slide->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    @if($slide->image_path)
                    <img src="/storage/{{ $slide->image_path }}" />
                    @endif
                    <div class="form-group">
                        <label for="image_path">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image_path" id="image_path" class="form-control">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.slides.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
