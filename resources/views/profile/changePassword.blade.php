@extends('layouts.backend.master')

@section('title', 'Manage Profile')

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
            <h1 class="m-0 text-dark">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
               <h4>Update Profile</h4>
                  <div class="row">
                      <div class="col-md-4 offset-4-col-md">
                          <div class="imageShow">
                              <img id="showImage" class="profile-user-img img-fluid img-circle" src="{{asset('storage/profile/'.Auth::user()->image)}}"
                                   alt="User profile picture" style="margin-left: 450px">
                          </div>
                      </div>
                  </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('profile.changePassword')}}" method="post" enctype="multipart/form-data" id="changePassword">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <!-- /.form-group -->
                        <div class="form-group col-md-4 offset-4">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="form-group col-md-4 offset-4">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group col-md-4 offset-4">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group col-md-4 offset-5">
                            <a href="{{route('profile.view')}}" class="btn btn-dark">Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
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

            $('#changePassword').validate({
                rules: {
                    current_password: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    current_password:{
                        required: "Please provide your current password",
                        minlength: "Your password must be at least 4 characters long"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    password_confirmation:  {
                        required: "Please provide a password",
                        equalTo: "Your password does not match!"
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
