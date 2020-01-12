@if(!$products->isEmpty())
    @php
    if(!isset($admin)){
        $admin = $abbas;
    }
    @endphp
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            @if(!$isCustomer)
            <td>Designer</td>
            @endif
            <td>Price (USD)</td>
            <td>Status</td>
            <td>Register Date</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($admin->hasPermission('view-product'))
                        <a target="_blank" href="/product/{{ $product->id }}">{{ $product->name_en }}</a>
                        <!-- <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name_fa }}</a><br/>
                        {{ $product->name_en }}<br/>
                        {{ $product->name_ar }}<br/>
                        {{ $product->name_tr }} -->
                    @else
                    <a target="_blank" href="/product/{{ $product->id }}">{{ $product->name_fa }}</a>
                        <!-- {{ $product->name_en }}<br/>
                        {{ $product->name_ar }}<br/>
                        {{ $product->name_tr }} -->
                    @endif
                </td>
                @if(!$isCustomer)
                <td>{{ ($product->customer)?$product->customer->name . ' ' . $product->customer->sir_name:'-' }}</td>
                @endif
                <td>{{ config('cart.currency') }} {{ $product->price }}</td>
                <td>@include('layouts.status', ['status' => $product->status])</td>
                <td>{{ $product->created_at->format("Y/m/d") }}</td>
                <td>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                            @if($admin->hasPermission('update-product'))<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>@endif
                            @if($admin->hasPermission('delete-product'))<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>@endif
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif