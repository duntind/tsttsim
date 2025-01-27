@extends('layouts.default')
@section('heading')
    <h1 class="m-0 text-dark">Product Detail</h1>
@endsection
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{ $product->name }} {{ $product->storage }}
                            ({{ $product->color }})</h3>
                        <div class="col-12">
                            <img src="/images/{{ $product->image }}" class="product-image" alt="Product Image">
                        </div>

                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $product->name }} {{ $product->storage }} ({{ $product->color }})</h3>
                        <p>{{ $product->description }}</p>

                        <hr>

                        <h4 class="mt-3">Specifications</h4>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Brand</td>
                                    <td>{{ $product->brand }}</td>
                                </tr>
                                <tr>
                                    <td>Primary Camera</td>
                                    <td>{{ $product->primary_camera }}</td>
                                </tr>
                                <tr>
                                    <td>Secondary Camera</td>
                                    <td>{{ $product->secondary_camera }}</td>
                                </tr>
                                <tr>
                                    <td>Display</td>
                                    <td>{{ $product->display }}</td>
                                </tr>
                                <tr>
                                    <td>Chipset</td>
                                    <td>{{ $product->chipset }}</td>
                                </tr>

                            </tbody>
                        </table>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                ${{ $product->price }}
                            </h2>
                            <h4 class="mt-0">
                                @if ($product->inventoryItems->where('status','available')->count() > 0)
                                <small>In Stock</small>
                                @else
                                <small>Out Of Stock</small>
                                @endif
                            </h4>
                        </div>
                        @can('isCustomer')                           
                        @if ($product->inventoryItems->where('status','available')->count() > 0)
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <!-- select -->
                                        <form method="POST" action="/cartItems">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <select  name="quantity" class="custom-select">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>                                            
                                        </div>                                       
                                    </div>

                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-primary btn-lg btn-flat">
                                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                            Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                                @error('quantity')
                                <span class="error invalid-feedback" style="display: inline;">
                                    {{ $errors->first('quantity') }} </span>
                                @enderror
                                </div>  
                                @endif                                                             
                                @elsecan('isAdmin')
                                <div class="mt-4">
                                <p class="text-danger">Only customer usertype can purchase</p>
                            </div>
                            @else
                            <div class="mt-4">
                                <p class="text-danger">Please <a href={{ Route('login') }}> Sign In</a> to continue</p>
                            </div>
                        @endcan
                            </div>
                        
                    
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@endsection
