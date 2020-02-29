@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <div class="alert alert-danger">
                Corrent Credit : {{ $credit }}
            </div>
            <form method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="credit">Credit Change (Amount can be negative) <span class="text-danger">*</span></label>
                        <input type="number" name="credit" id="credit" placeholder="Credit" class="form-control" value="{!! old('credit')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description (You must provide a Description for customer credit changes) <span class="text-danger">*</span></label>
                        <input type="text" name="description" id="description" placeholder="Description" class="form-control" value="{!! old('description')  !!}">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
