@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
Push Notifications | Admyrer
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
        <h3>Push Notifications Settings</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Mobile & API Settings</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Push Notifications Settings</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Push Notifications Settings</h6>
					<div class="alert alert-info">This system allows your script to send push notifications to any application who uses our API.<br> To get started, <a href="https://onesignal.com/" target="_blank">Register Here</a>.</div>
                    <div class="email-settings-alert"></div>
                    <form class="email-settings" method="POST">
                        <div>
                            <div class="float-left">
                                <label for="push" class="main-label">Push Notifications System</label>
                                <br><small class="admin-info">Enable this feature and users will get notificed on their browser / app while the app is closed.</small>
                            </div>
                            <div class="form-group float-right switcher">
                                <input type="hidden" name="push" value="0">
                                <input type="checkbox" name="push" id="push-enabled" value="1" checked>
                                <label for="push-enabled" class="check-trail"><span class="check-handler"></span></label>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">OneSignal APP ID</label>
                                <input type="text" id="push_id" name="push_id" class="form-control" value="c6d8ecf6-e3b8-4c49-b208-07a23364a6ed">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">REST API Key</label>
                                <input type="text" id="push_key" name="push_key" class="form-control" value="MjBjNDFmNjItMzhiMC00NmIxLWI2ZmItMjliODkxYThiYTc5">
                                
                            </div>
                        </div>
                        <p class="help-block">Need Help? <a href="https://documentation.onesignal.com/v3.0/docs/setup" target="_blank">Read The Documentation</a></p>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
        </div>



        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>

$(function() {
    $('.switcher input[type=checkbox]').click(function () {
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        if ($(this).is(":checked") === true) {
            objData[configName] = $(this).val();
        }
        else{
            if ($('input[name='+configName+']')[0]) {
                objData[configName] = $($('input[name='+configName+']')[0]).val();
            }
        }
        objData['hash_id'] = hash_id;
        $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
    $('input[type=text], input[type=number], input[type=password], textarea').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
                if (data.status == 200) {
                    thisElement.removeClass('warning');
                    thisElement.addClass('success');
                } else {
                    thisElement.addClass('error');
                }
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
                //thisElement.focus();
            });
    }, 500));
});
</script>            </div>
            <!-- ./ Content -->

        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>


</body>
</html>

@endsection