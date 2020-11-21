@extends('layouts.backend.master')

@section('title', 'Manage Order')

@push('css')

@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
               <h4>Order Details</h4>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                          <ul style="list-style: none">
                              <li>Invoice No..</li>
                              <li>Dress Name</li>
                              <li>Quantity</li>
                              <li>Size</li>
                          </ul>
                      </div>
                      <div class="col-md-6">
                          <ul style="list-style: none">
                              <li>{{$order_details->order->invoice_no}}</li>
                              <li>{{$order_details->dress->title}}</li>
                              <li>{{$order_details->quantity}}</li>
                              <li>{{$order_details->size}}</li>
                          </ul>
                      </div>
                  </div>
              </div><!-- /.card-body -->
                <div class="card-body">
                    <form action="{{route('staff.order.instruction')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <input type="hidden" name="order_details_id" value="{{$order_details->id}}">
                            <!-- /.form-group -->
                            <div class="form-group col-md-8 offset-2">
                                <label>Instruction About Dress Size</label>
                                <input type="text" name="instruction" class="form-control">
                            </div>
                            <div class="form-group col-md-4 offset-5">
                                <a href="{{route('staff.order.index')}}" class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>

                        </div>

                    </form>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection

@push('js')

@endpush
