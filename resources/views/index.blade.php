@extends('layouts.default')
@section('heading')
<h1 class = "m-0 text-dark">Products</h1>
@endsection
@section('breadcrumb')
<div class = "col-sm-6">
<ol  class = "breadcrumb float-sm-right">
<li  class = "breadcrumb-item active">Products</li>
<li  class = "breadcrumb-item"></li>
    </ol>
  </div><!-- /.col -->
@endsection
@section('content')
<section class="content">
  <div class="container-fluid">

   @cannot('isAdmin')
    <!-- /.card -->
   <div class="row">
     @foreach ($products as $product)       
       
    <div class="col-lg-3">    
      <div class="card">
      <img class="card-img-top" src="/images/{{$product->image}}" alt="Card image cap"  width="100" height="300">
        <div class="card-body">
          <div class="products-list">
          <a href ="{{ route('products.show', $product->id) }}" class="product-title"> {{$product->name}} {{$product->storage}} ({{$product->color}}) </a>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
            <strong class="lead">${{$product->price}}</strong>
            </div>
            <small class="text-success"> In Stock</small>
          </div>
        </div>
      </div>      
    </div>
    @endforeach
   </div>
   @else
   <div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                
                <a href="/product/create" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Amount In Stock</th> 
                            <th>Action</th>                                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>                                            
                                <td>{{ $product->name}}</td>
                                <td>{{ $product->brand}}</td>
                                <td>{{ $product->inventoryItems->where('status', 'available')->count()}}</td>                                                                                       
                                <td class="project-actions text-center">
                                    <a class="btn btn-info btn-sm" href="">
                                        <i class="fas fa-edit">
                                        </i>
                                        Edit
                                    </a>                                                                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Google ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>                                        
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endcannot
  </div>
   
  </section>  
@endsection
@section('scripts')
<script src="holder.js"></script>      
@endsection    