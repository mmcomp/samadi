@extends('layouts.admin.app')

@section('css')
<style>
.checked {
  color: orange;
}
</style>
@endsection

@section('js')
<script>
function addCredit() {
    let amount = prompt('How much do you want to increase your credit?');
}
</script>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Pivejhan Jewellery</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                Pivejhan Jewellery Design Site Dashboard
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border" style="text-align: center;">
                <h3 class="box-title pull-left">Profile</h3>

                @if($isCustomer)
                    @for($i = 1;$i <= min($abbas->star, 5);$i++)
                        <span class="fa fa-star checked pull-left"></span>
                    @endfor
                    @for($i = $abbas->star+1;$i <= 5;$i++)
                        <span class="fa fa-star pull-left"></span>
                    @endfor

                    <span class="alert alert-success" style="margin-left: -100px;">
                        <i class="fa fa-address-card"></i>
                        {{ $abbas->credit }}
                        Credit
                        <button class="btn btn-success" onclick="addCredit();"><i class="fa fa-plus"></i></button>
                    </span>
                @endif
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <form method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
                @if($error!='')
                <div class="alert alert-danger alert-dismissible">
                    {{ $error }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $abbas->name }}" />
                        </div>

                        <div class="form-group">
                            <label for="image_path">Image</label>
                            <input type="file" class="form-control" id="image_path" name="image_path" />
                        </div>

                        <div class="form-group">
                            <label for="repassword">Confirm Password</label>
                            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sir_name">Sir Name</label>
                            <input type="text" class="form-control" id="sir_name" name="sir_name" placeholder="Sir Name" value="{{ $abbas->sir_name }}" />
                        </div>
                        <div class="form-group">
                            <div class="alert alert-warning">
                            If you dont want to change Password , leave password and confirm password blank
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                @if($isCustomer)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthdate">Birth Date</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Birth Date" value="{{ str_replace(' 00:00:00', '', $abbas->birthdate) }}" />
                        </div>

                        <div class="form-group">
                            <label for="national_code">National ID</label>
                            <input type="text" class="form-control" id="national_code" name="national_code" placeholder="National ID" value="{{ $abbas->national_code }}" />
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option disabled>
                                    Gender
                                </option>
                                <option value="male"
                                @if($abbas->gender=='male')
                                selected
                                @endif
                                >
                                    Male
                                </option>
                                <option value="female"
                                @if($abbas->gender=='female')
                                selected
                                @endif
                                >
                                    Female
                                </option>
                                <option value="other"
                                @if($abbas->gender=='other')
                                selected
                                @endif
                                >
                                    Other
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="account_code">Account Number</label>
                            <input type="text" class="form-control" id="account_code" name="account_code" placeholder="Account Number" value="{{ $abbas->account_code }}" />
                        </div>

                        <div class="form-group">
                            <label for="account_description">Account Description</label>
                            <input type="text" class="form-control" id="account_description" name="account_description" placeholder="Account Description" value="{{ $abbas->account_description }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $abbas->address }}" />
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            @if($abbas->verified==1)
                            <i class="fa fa-check" style="color: green;"></i>
                            @endif
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ $abbas->mobile }}" />
                        </div>

                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select class="form-control" id="country_id" name="country_id">
                                <option disabled>
                                    Country
                                </option>
                                @foreach($countries as $country)
                                    @if($country->id==$abbas->country_id)
                                    <option value="{{ $country->id }}" selected>
                                        {{ $country->name }}
                                    </option>
                                    @else
                                    <option value="{{ $country->id }}">
                                        {{ $country->name }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="account_type">Account Type</label>
                            <select class="form-control" id="account_type" name="account_type">
                                <option disabled>
                                    Account Type
                                </option>
                                <option value="iran_bank_sheba"
                                @if($abbas->account_type=='iran_bank_sheba')
                                selected
                                @endif
                                >
                                    Iranian Bank Sheba Code
                                </option>
                                <option value="iran_bank_card"
                                @if($abbas->account_type=='iran_bank_card')
                                selected
                                @endif
                                >
                                    Iranian Bank Card Number
                                </option>
                                <option value="paypal"
                                @if($abbas->account_type=='paypal')
                                selected
                                @endif
                                >
                                    PayPal
                                </option>
                                <option value="bitcoin_wallet"
                                @if($abbas->account_type=='bitcoin_wallet')
                                selected
                                @endif
                                >
                                    Bitcoin Wallet
                                </option>
                                <option value="other"
                                @if($abbas->account_type=='other')
                                selected
                                @endif
                                >
                                    Other
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="aboutme">About Me</label>
                            <input type="text" class="form-control" id="aboutme" name="aboutme" placeholder="About Me" value="{{ $abbas->aboutme }}" />
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success">
                            Save
                        </button>
                    </div>
                </div>
            </div>
            </form>
            <!-- /.box-body -->
            <div class="box-footer">
                
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
