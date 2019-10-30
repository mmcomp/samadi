<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>{{ config('app.name') }}</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body background="images/bg-01.jpg">
    <div>
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 style="text-align: right;font-family: b yekan;color: red;" class="title">{{__('main.register_form')}}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row row-space">
                            <div style="text-align: right;font-family: b yekan;" class="col-2">
                                <div style="text-align: right;font-family: b yekan;" class="input-group">
                                    <label class="label">{{__('main.name')}}</label>
                                    <input style="text-align: right;font-family: b yekan;" class="input--style-4" type="text" name="name">
                                </div>
                            </div>
                            <div style="text-align: right;font-family: b yekan;" class="col-2">
                                <div style="text-align: right;font-family: b yekan;" class="input-group">
                                    <label class="label">{{__('main.sirname')}}</label>
                                    <input style="text-align: right;font-family: b yekan;" class="input--style-4" type="text" name="sir_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div style="text-align: right;font-family: b yekan;" class="input-group">
                                    <label class="label">{{__('main.birthdate')}}</label>
                                    <div style="text-align: right;font-family: b yekan;" class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthdate">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div style="text-align: right;font-family: b yekan;" class="input-group">
                                    <label class="label">{{__('main.gender')}}</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">{{__('main.male')}}
                                            <input type="radio" checked="checked" name="gender" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">{{__('main.female')}}
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div style="text-align: right;font-family: b yekan;" class="input-group">
                                    <label class="label">{{__('main.email')}}</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div style="text-align: right;font-family: b yekan;" class="input-group">
                                    <label class="label">{{__('main.mobile')}}</label>
                                    <input class="input--style-4" type="text" name="mobile">
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right;font-family: b yekan;" class="input-group">
                            <label class="label">{{__('main.country')}}</label>
                            <div style="text-align: right;font-family: b yekan;" class="rs-select2 js-select-simple select--no-search">
                                <select style="text-align: right;font-family: b yekan;" name="country_id">
                                    <option style="text-align: right;font-family: b yekan;" disabled="disabled" selected="selected"> {{__('main.country_of_bank_account')}} </option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div style="font-family: b yekan;" class="p-t-15">
                            <button style="font-family: b yekan;" class="btn btn--radius-2 btn--blue" type="submit">{{__('main.register_data')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->