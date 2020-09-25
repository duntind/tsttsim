@extends('layouts.default')
@section('heading')
<h1 class = "m-0 text-dark">Cart</h1>
@endsection
@section('breadcrumb')
<div class = "col-sm-6">
<ol  class = "breadcrumb float-sm-right">
<li  class = "breadcrumb-item active">Cart</li>

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
                    <th>Product</th>                    
                    <th>Description</th>
                    <th>Subtotal</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Call of Duty</td>
                    <td>455-981-221</td>                  
                    <td>$64.50</td>
                  </tr>                  
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                  <div class="row">
                    <div class="col-6">                  
                <div class="form-group">
                    <label>Billing Address<span class="text-danger">*</span></label>
                    <input type="text" name="primary_camera" class="form-control"
                        id="primary_camera" placeholder="Enter Primary Camera"
                        value="{{ old('primary_camera') }}">
                    @error('primary_camera')
                    <span class="error invalid-feedback" style="display: inline;">
                        {{ $errors->first('primary_camera') }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">  
                <div class="form-group">
                    <label>Shipping Address<span class="text-danger">*</span></label>
                    <input type="text" name="primary_camera" class="form-control"
                        id="primary_camera" placeholder="Enter Primary Camera"
                        value="{{ old('primary_camera') }}">
                    @error('primary_camera')
                    <span class="error invalid-feedback" style="display: inline;">
                        {{ $errors->first('primary_camera') }} </span>
                    @enderror
                </div>
            </div>
        </div>
                <div class="form-group">
                    <label>Full Name<span class="text-danger">*</span></label>
                    <input type="text" name="primary_camera" class="form-control"
                        id="primary_camera" placeholder="Enter Primary Camera"
                        value="{{ old('primary_camera') }}">
                    @error('primary_camera')
                    <span class="error invalid-feedback" style="display: inline;">
                        {{ $errors->first('primary_camera') }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Payment<span class="text-danger">*</span></label>
                    <input type="text" name="primary_camera" class="form-control"
                        id="primary_camera" placeholder="Enter Primary Camera"
                        value="{{ old('primary_camera') }}">
                    @error('primary_camera')
                    <span class="error invalid-feedback" style="display: inline;">
                        {{ $errors->first('primary_camera') }} </span>
                    @enderror
                </div>                
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Amount Due</p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>$250.30</td>
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
                      <th>Total:</th>
                      <td>-</td>
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
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
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
