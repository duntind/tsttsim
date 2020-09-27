@extends('layouts.default')
@section('heading')
    <h1 class="m-0 text-dark">Edit Device</h1>
@endsection
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Products</li>
            <li class="breadcrumb-item">Create</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-success card-outline">
                        <!-- /.card-header -->
                        <!-- form start -->
                    <form role="form" id="editProductForm" method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Product Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Product Name" value="{{$product->name}}">
                                            @error('name')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('name') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Brand<span class="text-danger">*</span></label>
                                            <input type="text" name="brand" class="form-control" placeholder=" Enter Brand"
                                                value="{{$product->brand}}">
                                            @error('brand')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('brand') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Primary Camera<span class="text-danger">*</span></label>
                                            <input type="text" name="primary_camera" class="form-control"
                                                id="primary_camera" placeholder="Enter Primary Camera"
                                                value="{{ $product->primary_camera }}">
                                            @error('primary_camera')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('primary_camera') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Secondary Camera<span class="text-danger">*</span></label>
                                            <input type="text" name="secondary_camera" class="form-control"
                                                id="secondary_camera" placeholder="Enter Secondary Camera"
                                                value="{{ $product->secondary_camera }}">
                                            @error('secondary_camera')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('secondary_camera') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Display<span class="text-danger">*</span></label>
                                            <input type="text" name="display" class="form-control" id="display"
                                                placeholder="Enter Display" value="{{ $product->display }}">
                                            @error('display')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('display') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Chipset<span class="text-danger">*</span></label>
                                            <input type="text" name="chipset" class="form-control" id="chipset"
                                                placeholder="Enter Chipset Info" value="{{ $product->chipset }}">
                                            @error('chipset')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('chipset') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Color<span class="text-danger">*</span></label>
                                            <input type="text" name="color" class="form-control"
                                                placeholder="Enter Device Color" value="{{ $product->color }}">
                                            @error('color')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('color') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Description<span class="text-danger">*</span></label>
                                            <input type="text" name="description" class="form-control"
                                                placeholder="Enter Description" value ="{{ $product->description }}">
                                            @error('description')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('description') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm 6">
                                        <div class="form-group">

                                            <label>Replace Image</label>
                                            <div class="custom-file">
                                                <input type="file"  name ="image" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <span class="text-info" style="display: inline;"> Leave this field blank if you don't want to replace photo</span>
                                            @error('image')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('image') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Add To Stock</label>
                                            <input type="number" name="stock" class="form-control" placeholder="">
                                                <span class="text-info" style="display: inline;">Use inventory table below to delete items from Inventory </span>

                                            @error('stock')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('stock') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Price<span class="text-danger">*</span></label>
                                            <input type="number" name="price" class="form-control" placeholder="Enter Price"
                                                value="{{ $product->price }}">
                                            @error('price')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('price') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Storage<span class="text-danger">*</span></label>
                                            <input type="text" name="storage" class="form-control" placeholder="Enter Price"
                                                value="{{ $product->storage }}">
                                            @error('storage')
                                            <span class="error invalid-feedback" style="display: inline;">
                                                {{ $errors->first('storage') }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Inventory</h3>                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Inventory ID</th>
                                        <th>Date Added</th>
                                        <th> Status</th> 
                                        <th>Action</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->InventoryItems as $inventoryItem)
                                        <tr>                                            
                                        <td>{{$inventoryItem->product->name}}</td>
                                            <td>{{$inventoryItem->id}}</td>
                                            <td>{{$inventoryItem->created_at}}</td>
                                            <td>{{$inventoryItem->status}}</td>                                                                                       
                                            <td> @if ($inventoryItem->status != "sold")
                                                <form method="POST" action="/inventoryItems/{{$inventoryItem->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i>Delete</button>
                                                    </form>                                                
                                                @endif                                                                                           
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Inventory ID</th>
                                        <th>Date Added</th>
                                        <th> Status</th> 
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
            <!-- /.row -->
        
    
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
    $.validator.setDefaults({

    });
    $('#editProductForm').validate({
        ignore: [],
        rules: {
            name: {
                required: true,
            },
            brand: {
                required: true,                
            },
            primary_camera: {
                required: true,                
            },
            secondary_camera: {
                required: true,                
            },
            image: {
                required:false,                
            },
            display: {
                required: true,                
            },
            color: {
                required: true,
            },
            chipset: {
                required: true,                
            },
            description: {
                required: true,
            },
            stock: {
                required: false,
                min:0,
                max:999,
                step:1,
            },
            storage: {
                required: true,
            },
            price: {
                required: true,
                min:0.2,
                max:99999,
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
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
          bsCustomFileInput.init();
        });
        </script>    
@endsection