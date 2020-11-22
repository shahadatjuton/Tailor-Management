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
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Invoice No</th>
                        <th>Dress Name</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderDetails as $key=> $order)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$Order->invoice_no}}</td>
                        <td>{{\App\Dress::find($order->dress_id)->title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->size}}</td>
                        <td>
                            @if($order->status == 1)
                                <div class="bg-warning">
                                    <p>Size requires changes</p>
                                </div>
                            @elseif($order->status == 2)
                                    <div class="bg-primary">
                                        <p>Size updated</p>
                                    </div>
                            @else
                                   <div class="bg-success">
                                        <p>All Right</p>
                                    </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.order.details',$order->id)}}" class="btn btn-primary btn-sm" title="show">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.card-body -->
                <div class="card-body">
                    <form action="{{route('admin.order.store')}}" method="post" id="createUser" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <input type="hidden" name="order_id" value="{{$Order->id}}">
                            <!-- /.form-group -->
                            <div class="form-group col-md-8 offset-2">
                                <label>Select Delivery Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="form-group col-md-4 offset-5">
                                <a href="{{route('admin.order.index')}}" class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-success">Submit</button>
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
