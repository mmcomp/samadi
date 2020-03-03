@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($transactions)
            <div class="box">
                <div class="box-body">
                    <h2>Income Transactions</h2>
                    @include('layouts.search_date', ['route' => route('admin.transactions.income')])
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Product</td>
                                <td class="col-md-2">Amount</td>
                                <td class="col-md-2">Date</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ ($transaction->product)?$transaction->product->name_fa:'-' }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ date("Y/m/d", strtotime($transaction->updated_at)) }}</td>
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