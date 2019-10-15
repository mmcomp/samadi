@extends('layouts.front.app')

@section('content')
    <hr>
    <!-- Main content -->
    <section class="container content">
        <div class="col-md-12">@include('layouts.errors-and-messages')</div>
        <div class="col-md-4 col-md-offset-4">
            <h2>{{__('main.login_to_your_account')}}</h2>
            <form action="{{ route('login') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">{{__('main.email')}}</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">{{__('main.password')}}</label>
                    <input type="password" name="password" id="password" value="" class="form-control" placeholder="xxxxx">
                </div>
                <div class="row">
                    <button class="btn btn-default btn-block" type="submit">{{__('main.login_now')}}</button>
                </div>
            </form>
            <div class="row">
                <hr>
                <a href="{{route('password.request')}}">{{__('main.i_forgot_my_password')}}</a><br>
                <a href="{{route('register')}}" class="text-center">{{__('main.no_account?_register_here.')}}</a>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
