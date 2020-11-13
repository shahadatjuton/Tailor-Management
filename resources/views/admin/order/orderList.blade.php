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
               <h4>Dress List</h4>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key=>$order)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$order->invoice_no}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>
                            @if($order->payment_status == 0)
                                <div class="bg-warning">
                                    <p class="text-center">Unpaid</p>
                                </div>
                            @else
                                <div class="bg-success">
                                    <p class="text-center">Paid</p>
                                </div>
                            @endif
                        </td>
                        <td>{{$order->created_at->toDateString()}}</td>
                        <td>{{$order->possible_date}}</td>
                        <td>
                            <a href="{{route('customer.cart.order.details',$order->id)}}" class="btn btn-primary btn-sm" title="Accept">
                                <i class="fas fa-check-circle"></i>
                            </a>
                            <a href="{{route('admin.order.show',$order->id)}}" class="btn btn-primary btn-sm" title="Edit">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
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
