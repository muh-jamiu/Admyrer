@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
Reports | Admyrer
@endsection

@section("dashboard")


<!-- Layout wrapper -->
<div class="layout-wrapper">

   


        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                <div class="container-fluid">
    <div>
        <h3>Manage Reports</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Reports</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Manage Reports</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
					<div id="dashboard-daterangepicker" class="btn btn-outline-light pull-right">
                            All                        </div>
                  <h6 class="card-title">Manage Reports</h6>
                  <div class="row">
                      <div class="col-md-9" style="margin-bottom:0;">
                      </div>
                      <div class="col-md-3" style="margin-bottom:0;">
                        
                       </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                   <div class="table-responsive1">
                     
  

           </div>
            <!-- ./ Content -->

        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->


@endsection