@extends('layouts.default')
@section('heading')
<h1 class = "m-0 text-dark">Dashboard</h1>
@endsection
@section('breadcrumb')
<div class = "col-sm-6">
<ol  class = "breadcrumb float-sm-right">
<li  class = "breadcrumb-item active">Home</li>
<li  class = "breadcrumb-item"></li>
    </ol>
  </div><!-- /.col -->
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title"> Support</h3>
        </div> <!-- /.card-body -->
        <div class="card-body">
            <button type="button" class="btn btn-default">
                Staff Helpdesk
              </button>
              <button type="button" class="btn btn-default">
                Staff Helpdesk
              </button>
              <button type="button" class="btn btn-default">
                Staff Helpdesk
              </button>
              <button type="button" class="btn btn-default">
                Staff Helpdesk
              </button>
        </div><!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title"> Services</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <button type="button" class="btn btn-default">
                Staff Helpdesk
              </button>
              <button type="button" class="btn btn-default">
                Staff Helpdesk
              </button>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
  </section>    
@endsection