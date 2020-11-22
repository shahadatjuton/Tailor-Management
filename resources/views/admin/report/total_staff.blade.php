@extends('layouts.backend.master')

@section('title', 'Manage Report')

@push('css')

@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    <link href="{{asset('assets/backend/css/invoice.css')}}" rel="stylesheet">
{{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <!------ Include the above in your HEAD tag ---------->

    <!--Author      : @arboshiki-->
    <div id="invoice">

        <div class="toolbar hidden-print">
            <p style="margin-left: 400px">Total Staff</p>
            <div class="text-right">
{{--                <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>--}}
                <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
            </div>
            <hr>
        </div>
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            <h4>TAYLOR MANAGEMENT SYSTEM</h4>
                        </div>
                        <div class="col company-details">
                            <div> 19/1, Panthapath,Dhaka – 1205, Bangladesh</div>
                            <div> <b>Phone:</b> +880123456789</div>

                            <div> <b>E-mail:</b> managementtailor@gmail.com</div>
                        </div>
                    </div>
                </header>
                <main>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($total_staff as $key=>$staff)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->email}}</td>
                                <td>{{$staff->role->role_name}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </main>


                <div class="float-right">
                    <div class="signature-right">
                        ........................
                        <h4>Signature</h4>
                    </div>
                </div>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection

@push('js')
    <script type="text/javascript">

    </script>
@endpush
