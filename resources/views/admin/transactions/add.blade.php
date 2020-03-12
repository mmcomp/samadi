@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h2>Add credit</h2>
                    <form method="POST"  enctype="multipart/form-data" action="{{ route('chargeyekpay') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                Charge Online
                                </label><br/>
                                <!-- <input type="button" onclick="alert('Unfortunately, the payment gateway is blocked until secondary notice');return false;" class="btn btn-primary" value="Pay Online Now" /> -->
                                <button  class="btn btn-primary">Pay Online Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                Please send amount in bitcoin to the wallet below and send a ticket to us with the transaction information and we will charge your wallet as soon as possible.
                            </p>
                            <br/>
                            <h3 class="text-center">
                            {{ env('BITCOIN_WALLET') }}
                            </h3>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection