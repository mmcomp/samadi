@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.offers.update', $offer->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $offer->name ?: old('name')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <input type="text" name="description" id="description" placeholder="Sir Name" class="form-control" value="{!! $offer->description ?: old('description')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start date <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" id="start_date" placeholder="Start date" class="form-control" value="{!! $offer->start_date ?: old('start_date')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date <span class="text-danger">*</span></label>
                        <input type="date" name="end_date" id="end_date" placeholder="End Date" class="form-control" value="{!! $offer->end_date ?: old('end_date')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="percent">Percent <span class="text-danger">*</span></label>
                        <input type="number" name="percent" id="percent" placeholder="Percent" class="form-control" value="{!! $offer->percent ?: old('percent')  !!}">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.offers.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
