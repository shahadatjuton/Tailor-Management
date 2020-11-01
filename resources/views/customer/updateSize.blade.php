@extends('layouts.backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="card-header">
            <hr>
            <h4 class="text-center">Update Dress Size</h4>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div>
                    <form method="POST" action="{{ route('customer.cart.order.size.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$order_detail->id}}">
                        <div class="card-body">
                            <div class="form-row">
                                <!-- /.form-group -->
                                <div class="form-group col-md-6">
                                    <label>Dress Name</label>
                                    <input type="text" value="{{$order_detail->dress->title}}" class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Quantity</label>
                                    <input type="text" value="{{$order_detail->quantity}}" class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Size *</label>
                                    <textarea  name="size" class="form-control" rows="4" cols="50">
                                        {{$order_detail->size}}
                                    </textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Instruction</label>
                                    <textarea   class="form-control" rows="4" cols="50" readonly>
                                        {{$order_detail->instruction}}
                                    </textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
