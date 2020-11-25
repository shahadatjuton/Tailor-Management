@extends('layouts.backend.master')

@section('title', 'Manage Slider')

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
            <h1 class="m-0 text-dark">Manage Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
               <h4>Slider List</h4>
                  <a class="btn btn-success btn-sm float-right " href="{{route('admin.slider.create')}}">
                      <i class="fa fa-plus-circle"> Create Slider</i>
                  </a>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $key=>$slider)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td><img src="{{asset('storage/slider/'.$slider->image)}}" height="40" width="60"></td>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->description}}</td>
                        <td>
                            @if($slider->status == 0)
                                <p class="bg-danger" href="{{route('admin.slider.active',$slider->id)}}">Inactive</p>
                            @else
                                 <p class="bg-success" href="{{route('admin.slider.inactive',$slider->id)}}">Active</p>
                            @endif
                        </td>
                        <td>
                            @if($slider->status == 1)
                                <a class="btn btn-danger btn-sm" href="{{route('admin.slider.inactive',$slider->id)}}">Inactive</a>
                            @else
                                <a class="btn btn-success btn-sm" href="{{route('admin.slider.active',$slider->id)}}">Active</a>
                            @endif
                            <a href="{{route('admin.slider.edit',$slider->id)}}" class="btn btn-primary btn-sm" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="button"  class="btn btn-danger waves-effect btn-sm" onclick="deletedata({{$slider->id}})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form  id="delete-data-{{$slider->id}}" action="{{route('admin.slider.destroy',$slider->id)}}"
                                   method="post" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
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

    </script>
@endpush
