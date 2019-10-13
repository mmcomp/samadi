@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.categories.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="parent">Parent Category</label>
                        <select name="parent" id="parent" class="form-control select2">
                            <option></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_fa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name_fa">Name Farsi<span class="text-danger">*</span></label>
                        <input type="text" name="name_fa" id="name_fa" placeholder="Name" class="form-control" value="{{ old('name_fa') }}">
                    </div>
                    <div class="form-group">
                        <label for="name_en">Name English<span class="text-danger">*</span></label>
                        <input type="text" name="name_en" id="name_en" placeholder="Name" class="form-control" value="{{ old('name_en') }}">
                    </div>
                    <div class="form-group">
                        <label for="name_ar">Name Arabic<span class="text-danger">*</span></label>
                        <input type="text" name="name_ar" id="name_ar" placeholder="Name" class="form-control" value="{{ old('name_ar') }}">
                    </div>
                    <div class="form-group">
                        <label for="name_tr">Name Turkey<span class="text-danger">*</span></label>
                        <input type="text" name="name_tr" id="name_tr" placeholder="Name" class="form-control" value="{{ old('name_tr') }}">
                    </div>
                    <div class="form-group">
                        <label for="description_fa">Description Farsi</label>
                        <textarea class="form-control ckeditor" name="description_fa" id="description_fa" rows="5" placeholder="Description">{{ old('description_fa') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_en">Description English</label>
                        <textarea class="form-control ckeditor" name="description_en" id="description_en" rows="5" placeholder="Description">{{ old('description_en') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_ar">Description Arabic</label>
                        <textarea class="form-control ckeditor" name="description_ar" id="description_ar" rows="5" placeholder="Description">{{ old('description_ar') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_tr">Description Turkey</label>
                        <textarea class="form-control ckeditor" name="description_tr" id="description_tr" rows="5" placeholder="Description">{{ old('description_tr') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover </label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Disable</option>
                            <option value="1">Enable</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
