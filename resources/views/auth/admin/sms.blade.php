@extends('layouts.front.app')

@section('og')
<meta property="og:type" content="home" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:description" content="{{ config('app.name') }}" />
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
    <div>
        <h1>
        @if($customer)
            {{ $customer->name }} {{ $customer->sir_name }}
            شماره تلفن شما تایید شد
        @else
            شماره تلفن تایید نشد
        @endif
        </h1>
    </div>
    </section>
    <!-- /.content -->
@endsection
