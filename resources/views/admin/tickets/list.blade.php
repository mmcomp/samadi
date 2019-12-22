@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($tickets)
            <div class="box">
                <div class="box-body">
                    <h2>Tickets</h2>
                    @include('layouts.search', ['route' => route('admin.tickets.index')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Unit</td>
                                <td class="col-md-2">Subject</td>
                                <td class="col-md-2">Content</td>
                                <td class="col-md-2">Status</td>
                                <td class="col-md-2">Answer</td>
                                <td class="col-md-2">Created At</td>
                                <td class="col-md-2">Updated At</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->unit }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ $ticket->content }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->answer }}</td>
                                <td>{{ date("Y/m/d", strtotime($ticket->created_at)) }}</td>
                                <td>{{ date("Y/m/d", strtotime($ticket->updated_at)) }}</td>
                                <td>
                                    @if(!$isCustomer)
                                    <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                    @endif
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