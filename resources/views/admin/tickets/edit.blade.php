@extends('layouts.admin.app')

@php
$statuses = ['registered','processing','answered','closed'];
@endphp

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="subject">Subject </label>
                        <input type="text" id="subject" placeholder="Subject" class="form-control" value="{{ $ticket->subject }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="content">Content </label>
                        <textarea id="content" class="form-control"  disabled>{{ $ticket->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status </label>
                        <select id="status" name="status" class="form-control" >
                        @foreach($statuses as $status)
                            @if($ticket->status == $status)
                            <option value="{{ $status }}" selected>{{ $status }}</option>
                            @else
                            <option value="{{ $status }}">{{ $status }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.tickets.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
