@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.products.update', $product->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist" id="tablist">
                                <li role="presentation" @if(!request()->has('combination')) class="active" @endif><a href="#info" aria-controls="home" role="tab" data-toggle="tab">Info</a></li>
                                <li role="presentation" @if(request()->has('combination')) class="active" @endif><a href="#combinations" aria-controls="profile" role="tab" data-toggle="tab">Combinations</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content" id="tabcontent">
                                <div role="tabpanel" class="tab-pane @if(!request()->has('combination')) active @endif" id="info">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h2>{{ ucfirst($product->name_fa) }}</h2>
                                            @if(!$isCustomer)
                                            <div class="form-group">
                                                <label for="sku">SKU <span class="text-danger">*</span></label>
                                                <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control" value="{!! $product->sku !!}">
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="name_fa">Name Farsi<span class="text-danger">*</span></label>
                                                <input type="text" name="name_fa" id="name_fa" placeholder="Name" class="form-control" value="{!! $product->name_fa !!}">
                                            </div>
                                            @if(!$isCustomer)
                                            <div class="form-group">
                                                <label for="name_en">Name English<span class="text-danger">*</span></label>
                                                <input type="text" name="name_en" id="name_en" placeholder="Name" class="form-control" value="{!! $product->name_en !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name_ar">Name Arabic<span class="text-danger">*</span></label>
                                                <input type="text" name="name_ar" id="name_ar" placeholder="Name" class="form-control" value="{!! $product->name_ar !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name_tr">Name Turkey<span class="text-danger">*</span></label>
                                                <input type="text" name="name_tr" id="name_tr" placeholder="Name" class="form-control" value="{!! $product->name_tr !!}">
                                            </div>
                                            @endif
                                            <div>
                                                <p>
                                                Description should be seperated by |
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="description_fa">Description Farsi</label>
                                                <textarea class="form-control ckeditor" name="description_fa" id="description_fa" rows="5" placeholder="Description">{!! $product->description_fa  !!}</textarea>
                                            </div>
                                            @if(!$isCustomer)
                                            <div class="form-group">
                                                <label for="description_en">Description English</label>
                                                <textarea class="form-control ckeditor" name="description_en" id="description_en" rows="5" placeholder="Description">{!! $product->description_en  !!}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="description_ar">Description Arabic</label>
                                                <textarea class="form-control ckeditor" name="description_ar" id="description_ar" rows="5" placeholder="Description">{!! $product->description_ar  !!}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="description_tr">Description Turkey</label>
                                                <textarea class="form-control ckeditor" name="description_tr" id="description_tr" rows="5" placeholder="Description">{!! $product->description_tr  !!}</textarea>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <img src="{{ $product->cover }}" alt="" class="img-responsive img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"></div>
                                            <div class="form-group">
                                                <label for="cover">Cover </label><br/>
                                                <input type="file" name="cover" id="cover" class="form-control">
                                            </div>                                            
                                            <div class="form-group">
                                                <label for="file_path"><a href="{{ asset("storage/$product->file_path") }}" target="_blank">File </a><span class="text-danger">*</span></label>
                                                <input type="file" name="file_path" id="file_path" placeholder="File" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                @foreach($images as $image)
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <img src="{{ asset("storage/$image->src") }}" alt="" class="img-responsive img-thumbnail"> <br /> <br>
                                                            <a onclick="return confirm('Are you sure?')" href="{{ route('admin.product.remove.thumb', ['src' => $image->src]) }}" class="btn btn-danger btn-sm btn-block">Remove?</a><br />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row"></div>
                                            <div class="form-group">
                                                <label for="image">Images </label><br/>
                                                <input type="file" name="image[]" id="image" class="form-control" multiple>
                                                <span class="text-warning">You can use ctr (cmd) to select multiple images</span>
                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label for="quantity">Quantity <span class="text-danger">*</span></label>
                                                @if($productAttributes->isEmpty())
                                                    <input
                                                            type="text"
                                                            name="quantity"
                                                            id="quantity"
                                                            placeholder="Quantity"
                                                            class="form-control"
                                                            value="{!! $product->quantity  !!}"
                                                    >
                                                @else
                                                    <input type="hidden" name="quantity" value="{{ $qty }}">
                                                    <input type="text" value="{{ $qty }}" class="form-control" disabled>
                                                @endif
                                                @if(!$productAttributes->isEmpty())<span class="text-danger">Note: Quantity is disabled. Total quantity is calculated by the sum of all the combinations.</span> @endif
                                            </div>
                                            -->
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                @if($productAttributes->isEmpty())
                                                    <div class="input-group">
                                                        <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                                        <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{!! $product->price !!}">
                                                    </div>
                                                @else
                                                    <input type="hidden" name="price" value="{!! $product->price !!}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                                        <input type="text" id="price" placeholder="Price" class="form-control" value="{!! $product->price !!}" disabled>
                                                    </div>
                                                @endif
                                                @if(!$productAttributes->isEmpty())<span class="text-danger">Note: Price is disabled. Price is derived based on the combination.</span> @endif
                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label for="sale_price">Sale Price</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">{{ config('cart.currency') }}</span>
                                                    <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price" class="form-control" value="{{ $product->sale_price }}">
                                                </div>
                                            </div>
                                            -->
                                            @if(!$brands->isEmpty())
                                                <div class="form-group">
                                                    <label for="brand_id">Brand </label>
                                                    <select name="brand_id" id="brand_id" class="form-control select2">
                                                        <option value=""></option>
                                                        @foreach($brands as $brand)
                                                            <option @if($brand->id == $product->brand_id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                @if(!isset($isCustomer) || (isset($isCustomer) && $isCustomer==false))
                                                @include('admin.shared.status-select', ['status' => $product->status])
                                                @else
                                                <input type="hidden" name="status" value="0" />
                                                @endif
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <div class="col-md-4">
                                            <h2>Categories</h2>
                                            @include('admin.shared.categories', ['categories' => $categories, 'ids' => $selectedIds])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="box-footer">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.products.index') }}" class="btn btn-default btn-sm">Back</a>
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane @if(request()->has('combination')) active @endif" id="combinations">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @include('admin.products.create-attributes', compact('attributes'))
                                        </div>
                                        <div class="col-md-8">
                                            @include('admin.products.attributes', compact('productAttributes'))
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
@section('css')
    <style type="text/css">
        label.checkbox-inline {
            padding: 10px 5px;
            display: block;
            margin-bottom: 5px;
        }
        label.checkbox-inline > input[type="checkbox"] {
            margin-left: 10px;
        }
        ul.attribute-lists > li > label:hover {
            background: #3c8dbc;
            color: #fff;
        }
        ul.attribute-lists > li {
            background: #eee;
        }
        ul.attribute-lists > li:hover {
            background: #ccc;
        }
        ul.attribute-lists > li {
            margin-bottom: 15px;
            padding: 15px;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        function backToInfoTab() {
            $('#tablist > li:first-child').addClass('active');
            $('#tablist > li:last-child').removeClass('active');

            $('#tabcontent > div:first-child').addClass('active');
            $('#tabcontent > div:last-child').removeClass('active');
        }
        $(document).ready(function () {
            const checkbox = $('input.attribute');
            $(checkbox).on('change', function () {
                const attributeId = $(this).val();
                if ($(this).is(':checked')) {
                    $('#attributeValue' + attributeId).attr('disabled', false);
                } else {
                    $('#attributeValue' + attributeId).attr('disabled', true);
                }
                const count = checkbox.filter(':checked').length;
                if (count > 0) {
                    $('#productAttributeQuantity').attr('disabled', false);
                    $('#productAttributePrice').attr('disabled', false);
                    $('#salePrice').attr('disabled', false);
                    $('#default').attr('disabled', false);
                    $('#createCombinationBtn').attr('disabled', false);
                    $('#combination').attr('disabled', false);
                } else {
                    $('#productAttributeQuantity').attr('disabled', true);
                    $('#productAttributePrice').attr('disabled', true);
                    $('#salePrice').attr('disabled', true);
                    $('#default').attr('disabled', true);
                    $('#createCombinationBtn').attr('disabled', true);
                    $('#combination').attr('disabled', true);
                }
            });
        });
        function readURL(input, iscover) {
            if(iscover===true) {
                $(".preimgcover").remove();
            }else {
                $(".preimg").remove();
            }
            let readers = []
            if (input.files) {
                for(let i = 0;i < input.files.length;i++) {
                    let tmpReader = new FileReader();

                    tmpReader.onload = function (e) {
                        if(iscover===true) {
                            $('#cover').before('<img class="preimgcover" src="' + e.target.result + '" style="height: 70px;" />');
                        }else {
                            $('#image').before('<img class="preimg" src="' + e.target.result + '" style="height: 70px;" />');
                        }
                    }

                    tmpReader.readAsDataURL(input.files[i]);

                    readers.push(tmpReader);
                }
            }
        }

        $("#image").change(function(){
            readURL(this);
        });

        $("#cover").change(function(){
            readURL(this, true);
        });
    </script>
@endsection