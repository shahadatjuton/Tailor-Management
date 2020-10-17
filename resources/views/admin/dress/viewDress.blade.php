@extends('layouts.backend.master')

@section('title', 'Manage Dress')

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
            <h1 class="m-0 text-dark">Manage Dress</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dress</li>
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
                  <div class="col-md-4 mb-4" style="margin-left: 250px">
                      <img src="{{asset('storage/dress/'.$dress->image)}}" height="60" width="80">
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <ul>
                              <li>Name of The Design</li>
                              <li>Price</li>
                              <li>Created By</li>
                              <li>Description</li>

                          </ul>
                      </div>
                      <div class="col-md-6">
                          <ul>
                              <li>{{$dress->title}}</li>
                              <li>{{$dress->price}}</li>
                              <li> {{$dress->created_by}}</li>
                              <li>{{$dress->description}}</li>
                          </ul>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 offset-3">
                          <div class="action">
                              <button type="button"  class="btn btn-danger waves-effect btn-sm" onclick="deletedata({{$dress->id}})">
                                  <i class="fas fa-trash-alt"></i>
                              </button>
                              <form  id="delete-data-{{$dress->id}}" action="{{route('admin.dress.destroy',$dress->id)}}"
                                     method="post" style="display:none;"
                              >
                                  @csrf
                                  @method('DELETE')
                              </form>
                              <button type="button"  class="btn btn-success waves-effect btn-sm" onclick="acceptdata({{$dress->id}})">
                                  <i class="fas fa-check"></i>
                              </button>
                              <form  id="accept-data-{{$dress->id}}" action="{{route('admin.dress.accept',$dress->id)}}"
                                     method="post" style="display:none;"
                              >
                                  @csrf
                                  @method('PUT')
                              </form>
                          </div>
                      </div>
                  </div>

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
    <script type="text/javascript">

        function deletedata(id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this data!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-data-' + id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

        function acceptdata(id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You want to accept the design!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Accept',
                cancelButtonText: 'Cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('accept-data-' + id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'The Design Does Not Accepted :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
