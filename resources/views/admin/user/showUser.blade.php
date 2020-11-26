@extends('layouts.backend.master')

@section('title', 'Manage User')

@push('css')
<style>
    ul li{
        list-style: none;
    }
</style>
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage User</h1>
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
          <section class="col-lg-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
               <h4>User List</h4>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="col-md-4 mb-4" style="margin-left: 250px">
                      <img src="{{asset('storage/profile/'.$user->image)}}" height="60" width="80" alt="{{$user->name}}">
                  </div>
                  @if($user->role->id !== 3)
                  <div class="row">
                      <div class="col-md-6">
                          <ul>
                              <li>Name</li>
                              <li>Email</li>
                              <li>Role</li>
                              <li>Created At</li>
                          </ul>
                      </div>
                      <div class="col-md-6">
                          <ul>
                              <li>{{$user->name}}</li>
                              <li>{{$user->email}}</li>
                              <li> {{$user->role->role_name}}</li>
                              <li>
                                  @if($user->created_at == null)
                                      <p>N/A</p>
                                  @else
                                      {{$user->created_at->format('d-M-Y')}}
                                  @endif
                              </li>
                          </ul>
                      </div>
                  </div>
                  @else
                      <div class="row">
                          <div class="col-md-6">
                              <ul>
                                  <li>Name</li>
                                  <li>Email</li>
                                  <li>Role</li>
                                  <li>Created At</li>
                                  @if($user_infos)
                                  <li>Phone</li>
                                  <li>Area</li>
                                  <li>City</li>
                                  @endif
                              </ul>
                          </div>
                          <div class="col-md-6">
                              <ul>
                                  <li>{{$user->name}}</li>
                                  <li>{{$user->email}}</li>
                                  <li> {{$user->role->role_name}}</li>
                                  <li>{{$user->created_at->format('d-M-Y')}}</li>

                                  @if($user_infos)

                                  <li>{{$user_infos->phone}}</li>
                                  <li>{{$user_infos->zone}}</li>
                                  <li>{{$user_infos->city}}</li>
                                      @endif

                              </ul>
                          </div>
                      </div>

                  @endif

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
