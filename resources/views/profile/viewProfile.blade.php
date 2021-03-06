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
            <h1 class="m-0 text-dark">View Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <section class="col-lg-6 offset-md-3 ">

                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/profile/'.$user->image)}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>


                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name</b> <a class="float-right">{{$user->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>E-mail</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="float-right">{{$user->role->role_name}}</a>
                            </li>
                        </ul>

                        <a href="{{route('profile.edit',$user->id)}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                    </div>
                    <!-- /.card-body -->

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
