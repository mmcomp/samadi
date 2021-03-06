@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.tickets.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="unit">Unit <span class="text-danger">*</span></label>
                        <select name="unit" id="unit" class="form-control" >
                            <option value="sale">Sale</option>
                            <option value="technical">Technical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject <span class="text-danger">*</span></label>
                        <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control" >{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_path">Attachment </label>
                        <input type="file" name="file_path" id="file_path" class="form-control" />
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.tickets.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
