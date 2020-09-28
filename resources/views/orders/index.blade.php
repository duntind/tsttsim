@extends('layouts.default')
@section('heading')
    <h1 class="m-0 text-dark">Your Orders</h1>
@endsection
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">orders</li>            
        </ol>
    </div><!-- /.col -->
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date & Time Of Order</th>
                                        <th>Item ID</th>
                                        <th>Product</th>
                                        <th>Shipping Address</th>                                        
                                        <th>Status</th>                                                                                                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::user()->orders as $order)
                                        <tr>    
                                            <td>{{ $order->created_at}}</td>                                        
                                            <td>{{ $order->inventory_item_id}}</td>
                                            <td>{{ $order->inventoryItem->product->name}}</td>
                                            <td>{{ $order->shipping_address}}</td>                                                                                       
                                            <td>{{ $order->status}}</td>                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Product</th>
                                        <th>Shipping Address</th>                                        
                                        <th>Status</th>  
                                        <th>Date & Time Of Order</th>                                                                              
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>    
@endsection

