@extends('layouts.admin.app')

@section('js')
<script>
function removeSelected(iscover) {
    if(iscover===true) {
        $(".preimgcover").remove();
        $('#cover').val('');
    }else {
        $(".preimg").remove();
        $('#image').val('');
    }
}

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

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.products.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Product</h2>
                        @if(!$isCustomer)
                        <div class="form-group">
                            <label for="sku">SKU <span class="text-danger">*</span></label>
                            <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control" value="{{ old('sku') }}">
                        </div>
                        @endif

                        @if(!$isCustomer)
                        <div class="form-group">
                            <label for="name_fa">Name Farsi<span class="text-danger">*</span></label>
                            <input type="text" name="name_fa" id="name_fa" placeholder="Name" class="form-control" value="{{ old('name_fa') }}">
                        </div>
                        <div class="form-group">
                            <label for="name_en">Name English</label>
                            <input type="text" name="name_en" id="name_en" placeholder="Name" class="form-control" value="{{ old('name_en') }}">
                        </div>
                        <div class="form-group">
                            <label for="name_ar">Name Arabic</label>
                            <input type="text" name="name_ar" id="name_ar" placeholder="Name" class="form-control" value="{{ old('name_ar') }}">
                        </div>
                        <div class="form-group">
                            <label for="name_tr">Name Turkey</label>
                            <input type="text" name="name_tr" id="name_tr" placeholder="Name" class="form-control" value="{{ old('name_tr') }}">
                        </div>
                        @else
                        <div class="form-group">
                            <label for="name_fa">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name_fa" id="name_fa" placeholder="Name" class="form-control" value="{{ old('name_fa') }}">
                        </div>
                        @endif
                        <div>
                            <p>
                            Description should be seperated by |
                            </p>
                        </div>
                        @if(!$isCustomer)
                        <div class="form-group">
                            <label for="description_fa">Description Farsi</label>
                            <textarea class="form-control" name="description_fa" id="description_fa" rows="5" placeholder="Description">{{ old('description_fa') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Description English</label>
                            <textarea class="form-control" name="description_en" id="description_en" rows="5" placeholder="Description">{{ old('description_en') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_ar">Description Arabic</label>
                            <textarea class="form-control" name="description_ar" id="description_ar" rows="5" placeholder="Description">{{ old('description_ar') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description_tr">Description Turkey</label>
                            <textarea class="form-control" name="description_tr" id="description_tr" rows="5" placeholder="Description">{{ old('description_tr') }}</textarea>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="description_fa">Description</label>
                            <textarea class="form-control" name="description_fa" id="description_fa" rows="5" placeholder="Description">{{ old('description_fa') }}</textarea>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="cover">Cover </label> <i onclick="removeSelected(true);" class="fa fa-times" style="color: red;"></i><br/>
                            Drag image to the "Choose File" button below:<br/>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Images</label> <i onclick="removeSelected();" class="fa fa-times" style="color: red;"></i><br/>
                            Drag image to the "Choose File" button below:<br/>
                            <input type="file" name="image[]" id="image" class="form-control" multiple>
                            <small class="text-warning">You can use ctr (cmd) to select multiple images</small>
                        </div>
                        <!-- <div class="form-group">
                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="{{ old('quantity') }}">
                        </div> -->
                        <div class="form-group">
                            <label for="price">Price (USD)<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">PHP</span>
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
                            </div>
                        </div>
                        @if(!$isCustomer)
                        <div class="form-group">
                            <label for="sale_price">Sale Price (USD)<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">PHP</span>
                                <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price" class="form-control" value="{{ old('sale_price') }}">
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="file_path">File <span class="text-danger">*</span></label>
                            <input type="file" name="file_path" id="file_path" placeholder="File" class="form-control">
                        </div>
                        @if(!$brands->isEmpty())
                        <div class="form-group">
                            <label for="brand_id">Brand </label>
                            <select name="brand_id" id="brand_id" class="form-control select2">
                                <option value=""></option>
                                @foreach($brands as $brand)
                                    <option @if(old('brand_id') == $brand->id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        @if(!isset($isCustomer) || (isset($isCustomer) && $isCustomer==false))
                        @include('admin.shared.status-select', ['status' => 0])
                        @else
                        <input type="hidden" name="status" value="0" />
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h2>Categories</h2>
                        @include('admin.shared.categories', ['categories' => $categories, 'selectedIds' => []])
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
