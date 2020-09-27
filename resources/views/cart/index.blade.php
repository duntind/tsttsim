@extends('layouts.default')
@section('heading')
    <h1 class="m-0 text-dark">Cart</h1>
@endsection
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Cart</li>

        </ol>
    </div><!-- /.col -->
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->

                        <!-- info row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->cartItems as $cartItem)
                                            <tr>
                                                <td>{{ $cartItem->quantity }} @if ($cartItem->quantity > $cartItem->product->inventoryItems->where('status', 'available')->count())
                                                <span class="error invalid-feedback" style="display: inline;">You are over the stock amount of {{$cartItem->product->inventoryItems->where('status', 'available')->count()}}</span>
                                                    
                                                @endif</td>
                                                <td>{{ $cartItem->product->name }}</td>
                                                <td>{{ $cartItem->quantity * $cartItem->product->price }}</td>
                                                <td> 
                                                <form method="POST" action="/cartItems/{{$cartItem->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" href="#"><i
                                                            class="fas fa-trash"></i>Delete</button>
                                                    </form></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <form role="form" id="addOrderForm" method="POST" action="/orders" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                    <div class="col-6">                                     
                                        <div class="form-group">
                                            <label>Full Name<span class="text-danger">*</span></label>
                                            <input type="text" name="full_name" class="form-control"
                                                 placeholder="Enter Full Name"
                                                value="{{ old('full_name') }}">
                                            @error('full_name')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('full_name') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Credit Card<span class="text-danger">*</span></label>
                                            <input type="text" name="credit_card" class="form-control"
                                                placeholder="Enter Payment Details"
                                                value="{{ old('credit_card') }}">
                                            @error('credit_card')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('credit_card') }} </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Billing Address<span class="text-danger">*</span></label>
                                    <input type="text" name="billing_address" class="form-control" 
                                        placeholder="Enter Billing Address" value="{{ old('billing_address') }}">
                                    @error('billing_address')
                                    <span class="error invalid-feedback" style="display: inline;">
                                        {{ $errors->first('billing address') }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Shipping Address<span class="text-danger">*</span></label>
                                    <input type="text" name="shipping_address" class="form-control" 
                                        placeholder="Enter Shipping Address" value="{{ old('shipping_address') }}">
                                    @error('shipping_address')
                                    <span class="error invalid-feedback" style="display: inline;">
                                        {{ $errors->first('shipping_address') }} </span>
                                    @enderror
                                </div>                                                         
                            </form> 
                            </div>
                          
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Amount Due</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td> $ {{ Auth::user()->cartItems->sum('total_price') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <th>Total: </th>
                                            <td>$ {{ Auth::user()->cartItems->sum('total_price') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="submit"  form ="addOrderForm" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                    Submit
                                    Payment
                                </button>

                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
    $.validator.setDefaults({

    });
    $('#addOrderForm').validate({
        ignore: [],
        rules: {
            full_name: {
                required: true,
            },
            credit_card: {
                required: true,                
            },
            billing_address: {
                required: true,                
            },
            shipping_address: {
                required: true,                
            },
            
        },
        messages: {
            

        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },

        submitHandler: function(form) { // <- pass 'form' argument in
            $(".btn").attr("disabled", true);
            form.submit(); // <- use 'form' argument here.
        }
    });
    });    

</script>
<!-- SweetAlert2 -->
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
@if(session('error'))
<script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });            
      Toast.fire({
          icon: 'error',
          title: 'Please check your cart.'
        }); 
    });
  
  </script>
  @endif
@endsection
