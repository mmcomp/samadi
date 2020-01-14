@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.tickets.addhistory') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}" />
                    <div class="form-group">
                        <label for="answer">Answer <span class="text-danger">*</span></label>
                        <textarea name="answer" id="answer" class="form-control" >{{ old('answer') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_path">Attachment</label>
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
        <div class="box">
            <div class="box-header">
                Ticket History
            </div>
            <div class="box-body">
                <h5>Unit : {{ $ticket->unit }}<h3>
                <h4>Subject : {{ $ticket->subject }}</h4>
                <h5>Created At: {{ date("Y-m-d H:i:s", strtotime($ticket->created_at)) }}</h5>
                <p>
                    {{ $ticket->content }}
                </p>
            </div>
        </div>
        @foreach($histories as $history)
        <div class="box">
            <div class="box-body">
                <h5>Created At: {{ date("Y-m-d H:i:s", strtotime($history->created_at)) }}</h5>
                @if($history->employee)
                <h4>{{ $history->employee->name }} {{ $history->employee->sir_name }}</h4>
                @endif
                <p>
                    {{ $history->answer }}
                </p>
                @if($history->attachment)
                <a href="{{ $history->attachment->file_path }}" target="_blank">Attachment</a>
                @endif
            </div>
        </div>
        @endforeach
    </section>
    <!-- /.content -->
@endsection
