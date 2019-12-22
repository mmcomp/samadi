@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.offers.category_store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="offers_id">Offer <span class="text-danger">*</span></label>
                        <select name="offers_id" id="offers_id" class="form-control">
                        @foreach($offers as $offer)
                            @if($offer->id == old('offers_id'))
                            <option value="{{ $offer->id }}" selected>{{ $offer->name }}</option>
                            @else
                            <option value="{{ $offer->id }}">{{ $offer->name }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Category <span class="text-danger">*</span></label>
                        <select name="categories_id" id="categories_id" class="form-control">
                        @foreach($categories as $category)
                            @if($category->id == old('categories_id'))
                            <option value="{{ $category->id }}" selected>{{ $category->name_fa }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name_fa }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.offers.category') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
