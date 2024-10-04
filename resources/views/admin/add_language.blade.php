@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
Add Language | Admyrer
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
        <h3>Add New Language & Key</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Languages</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add New Language & Key</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add New Language</h6>
					<div class="alert alert-info">Note: This may take up to 5 minutes.</div>
                    <div class="email-settings-alert"></div>
                    <form class="email-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Language Name </label>
                                <input type="text" id="lang" name="lang" class="form-control">
                                <small class="admin-info">Use only english letters, no spaces allowed. E.g: russian</small>
                                
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Language</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add New Key</h6>
                    <div class="key-settings-alert"></div>
                    <form class="key-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Key Name </label>
                                <input type="text" id="lang_key" name="lang_key" class="form-control">
                                <small class="admin-info">Use only english letters, no spaces allowed, example: this_is_a_key</small>
                                
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Key</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
           </div>
            <!-- ./ Content -->

        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->



@endsection