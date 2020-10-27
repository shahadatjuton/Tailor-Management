@extends('layouts.backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Additional Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">user-info</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="imageShow float-right">
            <img id="showImage" class=" img-fluid img-circle float-left"
                 alt="User Image"  width="140" height="120">
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div>
                    <form method="POST" action="{{ route('customer.info.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="image" class="form-control" name="image" onchange="document.getElementById('showImage').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        {{--================================================--}}
                        <div class="card-header">
                            <hr>
                            <h4 class="text-center">Give Your Body Size For Making New Dress</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <!-- /.form-group -->
                                <div class="form-group col-md-8 offset-2">
                                    <label>Details of size</label><br>
                                    <textarea name="size" rows="4" cols="60"></textarea>
                                </div>
                            </div>
                        </div>
                        {{--===================       Address   =============================--}}

                        <div class="card-header">
                            <hr>
                            <h4 class="text-center">Give Your Present Adress</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <!-- /.form-group -->
                                <div class="form-group col-md-4">
                                    <label>House No</label>
                                    <input type="text" name="house" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Road No</label>
                                    <input type="text" name="road" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Zone</label>
                                    <input type="text" name="zone" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>City / Town</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Contact Number</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
