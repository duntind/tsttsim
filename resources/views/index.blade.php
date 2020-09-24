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
  
  </div>
   
  </section>  
@endsection
@section('scripts')
<script src="holder.js"></script>      
@endsection    