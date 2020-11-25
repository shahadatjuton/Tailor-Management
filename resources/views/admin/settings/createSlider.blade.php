@extends('layouts.backend.master')

@section('title', 'Slider')

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
            <h1 class="m-0 text-dark">...</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
                  <div class="imageShow">
                      <img id="showImage" class=" img-fluid img-circle float-left"
                           alt="Slider Image"  width="140" height="120">
                  </div>
                  <a class="btn btn-success btn-sm float-right " href="{{route('admin.slider.list')}}">
                      <i class="fa fa-list">  Slider List</i>
                  </a>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('admin.slider.store')}}" method="post" id="createDress" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <!-- /.form-group -->
                        <div class="form-group col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Upload Image</label>
                            <input type="file" id="image" class="form-control" name="image" onchange="document.getElementById('showImage').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="form-group col-md-4 offset-3">
                            <label>Description</label>
                            <textarea name="description" rows="4" cols="50"></textarea>
                        </div>
                        <div class="form-group col-md-4 offset-5">
                            <a href="{{route('admin.slider.list')}}" class="btn btn-dark">Back</a>
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
    <script>
        $(function () {

            $('#createDress').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name"
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
