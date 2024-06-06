@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
Amazon Settings | Admyrer
@endsection

@section("dashboard")

<!-- Layout wrapper -->
<div class="layout-wrapper">

 

    <!-- Content wrapper -->
    <div class="content-wrapper">
        

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                <div class="container-fluid">
    <div>
        <h3>File Upload Configuration</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Settings</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">File Upload Configuration</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">FFMPEG Configuration</h6>
                    <div class="clearfix">
                                                <form class="form general-settings-form"  method="POST">
                            <div class="ffmpeg-form-alert"></div>
                            <div>
                                <div class="float-left">
                                    <label for="ffmpeg_sys" class="main-label">FFMPEG System</label>
                                    <br><small class="admin-info">This system will compress, convert, and optimzise videos to mp4. <br>
This system require "ffmpeg" to be installed in your server.</small>
                                </div>
                                <div class="form-group float-right switcher">
                                    <input type="hidden" name="ffmpeg_sys" value="0">
                                    <input type="checkbox" name="ffmpeg_sys" id="ffmpeg_sys-enabled" value="1" checked>
                                    <label for="ffmpeg_sys-enabled" class="check-trail"><span class="check-handler"></span></label>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">
                                        FFMPEG Binary File Path
                                    </label>
                                    <input type="text" id="ffmpeg_binary" name="ffmpeg_binary" class="form-control" value="./ffmpeg/ffmpeg">
                                    <small class="admin-info">Example: Linux(/usr/bin/ffmpeg) or Windows(C:\\ffmpeg\bin\ffmpeg.exe)</small>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-line">
                                    <label class="form-label">
                                        Video Duration
                                        <div class="clearfix"></div>
                                    </label>
                                    <input type="number" id="max_video_duration" name="max_video_duration" class="form-control" value="30">
                                    <small class="admin-info">Set the max allowed seconds for the video.</small>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Debug FFMPEG</h6>
                    <div class="alert alert-info">This feature will test the FFMPEG Configuration and make sure the system is working fine.</div>
                    <form class="debug-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Debug Log</label>
                                <textarea name="debug_ffmpeg" id="debug_ffmpeg" class="form-control" cols="30" rows="5" style="height: 700px !important;" disabled>Click on Debug FFMPEG to show test results.</textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Please upload video for test</label>
                                <input type="file" name="video" accept="video/*" class="form-control" required>
                            </div>
                        </div>
                        <div class="debug-settings-alert"></div>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Debug FFMPEG</button>
                    </form>
                </div>
            </div>
        </div>
		<div class="col-lg-12 col-md-12">
            <h3>Storage &amp; CDN Configuration <br><hr></h3>
        </div>
        <div class="col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Amazon S3 Settings</h6>
                    
                    <form class="general-settings" method="POST">
						<div>
							<div class="float-left">
								<label for="amazone_s3" class="main-label">Amazon S3 Storage</label>
								<br><small class="admin-info">Enable Amazon Storage to store your files in Amazon S3.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="amazone_s3" value="0">
								<input type="checkbox" name="amazone_s3" id="amazone_s3-enabled" value="1" >
								<label for="amazone_s3-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Amazon Bucket Name</label>
                                <input type="text" id="bucket_name" name="bucket_name" class="form-control" value="">
								<small class="admin-info">Your Amazon S3 <a href="https://docs.aws.amazon.com/AmazonS3/latest/userguide/creating-bucket.html" target="_blank">Bucket Name</a></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Amazon S3 Key</label>
                                <input type="text" id="amazone_s3_key" name="amazone_s3_key" class="form-control" value="">
								<small class="admin-info">Your Amazon Key from <a href="https://docs.aws.amazon.com/general/latest/gr/aws-sec-cred-types.html" target="_blank">AWS credentials</a></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Amazon S3 Secret Key</label>
                                <input type="text" id="amazone_s3_s_key" name="amazone_s3_s_key" class="form-control" value="">
								<small class="admin-info">Your Amazon Secret from <a href="https://docs.aws.amazon.com/general/latest/gr/aws-sec-cred-types.html" target="_blank">AWS credentials</a></small>
                            </div>
                        </div>
                        <label for="region">Amazon S3 bucket Region</label>
                        <select class="form-control show-tick" id="region" name="region">
                          <option value="us-east-2"  >US East (Ohio)</option>
		                  <option value="us-west-1"  selected >US East (N. Virginia)</option>
                          <option value="us-west-1"  >US West (N. California)</option>
                          <option value="us-west-2"  >US West (Oregon)</option>
		                  <option value="ap-east-1"  >Asia Pacific (Hong Kong)</option>
                          <option value="ap-south-1"  >Asia Pacific (Mumbai)</option>
		                  <option value="ap-southeast-1"  >Asia Pacific (Singapore)</option>
		                  <option value="ap-southeast-2"  >Asia Pacific (Sydney)</option>
		                  <option value="ap-northeast-1"  >Asia Pacific (Tokyo)</option>

                            <option value="cn-north-1"  >China (Beijing)</option>
                            <option value="cn-northwest-1"  >China (Ningxia)</option>

                          <option value="ca-central-1"  >Canada (Central)</option>
		                  <option value="eu-central-1"  >EU (Frankfurt)</option>
		                  <option value="eu-west-1"  >EU (Ireland)</option>
                          <option value="eu-west-2"  >EU (London)</option>
                            <option value="eu-west-3"  >EU (Paris)</option>
                            <option value="eu-north-1"  >EU (Stockholm)</option>
                            <option value="me-south-1"  >Middle East (Bahrain)</option>
                          <option value="sa-east-1"  >South America (São Paulo)</option>
                            <option value="us-gov-east-1"  >AWS GovCloud (US-East)</option>
                            <option value="us-gov-west-1"  >AWS GovCloud (US-West)</option>
                        </select>
						<small class="admin-info">Your Amazon's S3 Region</small>
                        <div class="clearfix"></div>
                        <br>
						<div class="alert alert-info">
                           Before enabling Amazon S3, make sure you upload the whole "upload/" folder to your bucket. <br><br>
                            Before disabling Amazon S3, make sure you download the whole "upload/" folder to your server.<br><br>
                            We recommend to upload the folder and files via <a href="http://s3tools.org/s3cmd">S3cmd</a>.<br><br>
                            If your site is still brand new, you can escape the upload step, but make sure to click on "Test Connection".<br>
                        </div>
                        <div class="general-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestS3()">Test Connection</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Wasabi Configuration</h6>
                    <form class="wasabi_storage-settings" method="POST">
                         <div class="float-left">
                            <label for="wasabi_storage" class="main-label">Wasabi Storage</label>
                            <br><small class="admin-info">Enable Wasabi Storage to store your files in Wasabi Spaces.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="wasabi_storage" value="0" />
                            <input type="checkbox" name="wasabi_storage" id="chck-wasabi_storage" value="1" >
                            <label for="chck-wasabi_storage" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Wasabi Bucket Name</label>
                                <input type="text" id="wasabi_bucket_name" name="wasabi_bucket_name" class="form-control" value="">
                                <small class="admin-info">Your Wasabi Bucket Name.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Wasabi Access Key</label>
                                <input type="text" id="wasabi_access_key" name="wasabi_access_key" class="form-control" value="">
                                <small class="admin-info">Your Wasabi Access Key.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Wasabi Secret Key</label>
                                <input type="text" id="wasabi_secret_key" name="wasabi_secret_key" class="form-control" value="">
                                <small class="admin-info">Your Wasabi Secret Key.</small>
                            </div>
                        </div>
                        <label for="wasabi_bucket_region">Wasabi bucket region</label>
                        <select class="form-control show-tick" id="wasabi_bucket_region" name="wasabi_bucket_region">
                          <option value="us-west-1"  >us-west-1</option>
                          <option value="ap-northeast-1"  >ap-northeast-1</option>
                          <option value="ap-northeast-2"  >ap-northeast-2</option>
                          <option value="eu-central-1"  >eu-central-1</option>
                          <option value="eu-west-1"  >eu-west-1</option>
                          <option value="eu-west-2"  >eu-west-2</option>
                          <option value="us-central-1"  >us-central-1</option>
                          <option value="us-east-1"  selected >us-east-1</option>
                          <option value="us-east-2"  >us-east-2</option>
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">
                            Before enabling Wasabi, make sure you upload the whole "upload/" folder to your bucket. <br><br>
                            Before disabling Wasabi, make sure you download the whole "upload/" folder to your server. <br><br>
                        </div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        <div class="wasabi_storage_alert"></div>
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestWasabi()">Test & Verify Connection</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Google Cloud Settings</h6>

                    <form class="drive-settings" method="POST">
                         <div class="float-left">
                            <label for="cloud_upload" class="main-label">Google Cloud Storage</label>
                            <br><small class="admin-info">Enable Google Cloud Storage to store your files in Google Cloud.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="cloud_upload" value="0" />
                            <input type="checkbox" name="cloud_upload" id="chck-cloud_upload" value="1" >
                            <label for="chck-cloud_upload" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Google Cloud Bucket Name</label>
                                <input type="text" id="cloud_bucket_name" name="cloud_bucket_name" class="form-control" value="">
                                <small class="admin-info">Your Google Cloud Bucket Name.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Google Cloud File</label>
                                <input type="file" id="cloud_file" name="cloud_file" class="form-control">
                                <small class="admin-info">Should be a JSON file.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Google Cloud File Path</label>
                                <input type="text" id="cloud_file_path" class="form-control" value="" readonly>
                                <small class="admin-info">Path to your Google Cloud File in your server.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="alert alert-info">
                            Make sure you upload the whole "upload/" folder to your bucket.<br><br>
                            Make sure to keep (Google Cloud File) on your server. in Google Cloud File Path ()<br>
                        </div>
                        <div class="drive-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestCloud()">Test Cloud Connection</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Digitalocean Spaces Configuration</h6>
                    <form class="spaces-settings" method="POST">
                         <div class="float-left">
                            <label for="spaces" class="main-label">Digitalocean Spaces Storage</label>
                            <br><small class="admin-info">Enable Digitalocean Storage to store your files in Digitalocean Spaces.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="spaces" value="0" />
                            <input type="checkbox" name="spaces" id="chck-spaces" value="1" >
                            <label for="chck-spaces" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Digitalocean Space Name</label>
                                <input type="text" id="space_name" name="space_name" class="form-control" value="">
                                <small class="admin-info">Your Digitalocean Space Bucket name.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Digitalocean Key</label>
                                <input type="text" id="spaces_key" name="spaces_key" class="form-control" value="">
                                <small class="admin-info">Your Digitalocean Space credentials key.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Digitalocean Secret</label>
                                <input type="text" id="spaces_secret" name="spaces_secret" class="form-control" value="">
                                <small class="admin-info">Your Digitalocean Space credentials secret key.</small>
                            </div>
                        </div>
                        <label for="space_region">Digitalocean bucket region</label>
                        <select class="form-control show-tick" id="space_region" name="space_region">
                          <option value="nyc3"  selected >New York</option>
                          <option value="ams3"  >Amsterdam</option>
                          <option value="sgp1"  >Singapore</option>
                          <option value="FRA1"  >Frankfurt</option>
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">
                            Before enabling Digitalocean, make sure you upload the whole "upload/" folder to your bucket. <br><br>
                            Before disabling Digitalocean, make sure you download the whole "upload/" folder to your server. <br><br>
                            If your site is still brand new, you can escape the upload step, but make sure to click on "Test Connection". <br>
                        </div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        <div class="spaces-settings-alert"></div>
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestSpaces()">Test & Verify Connection</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">FTP Settings</h6>
                    <small>You can upload files directly from your server to another FTP server and load them from there.</small><br>
                    <small>Impotant: This may slow down your site's upload/delete speed, make sure to use fast FTP server.</small><br><br>
                    <form class="ftp-settings" method="POST">
                         <div class="float-left">
                            <label for="ftp_upload" class="main-label">FTP Storage</label>
                            <br><small class="admin-info">Enable FTP Storage to store your files in your own FTP server.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="ftp_upload" value="0" />
                            <input type="checkbox" name="ftp_upload" id="chck-ftp_upload" value="1" >
                            <label for="chck-ftp_upload" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">FTP Hostname</label>
                                <input type="text" id="ftp_host" name="ftp_host" class="form-control" value="">
                                <small class="admin-info">Your FTP hostname, could be IP or domain name.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">FTP Username</label>
                                <input type="text" id="ftp_username" name="ftp_username" class="form-control" value="">
                                <small class="admin-info">Your FTP account's username.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">FTP Password</label>
                                <input type="text" id="ftp_password" name="ftp_password" class="form-control" value="">
                                <small class="admin-info">Your FTP account's password.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">FTP Port</label>
                                <input type="text" id="ftp_port" name="ftp_port" class="form-control" value="">
                                <small class="admin-info">Your FTP server's port.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">FTP Path</label>
                                <input type="text" id="ftp_path" name="ftp_path" class="form-control" value="">
                                <small class="admin-info">The path to /upload files.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">FTP Endpoint</label>
                                <input type="text" id="ftp_endpoint" name="ftp_endpoint" class="form-control" value="">
                                <small class="admin-info">IP or domain where the FTP server is pointed to, example: wowonderftpstorage.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="alert alert-info">
                            Before enabling FTP, make sure you upload the whole "upload/" folder to your FTP server.<br><br>
                        Before disabling FTP, make sure you download the whole "upload/" folder to your server.<br><br>
                        If your site is still brand new, you can escape the upload step, but make sure to click on "Test Connection".<br>
                        </div>
                        <div class="ftp-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">

                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestFTP()">Test FTP Connection</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Backblaze Configuration</h6>
                    <form class="backblaze_storage-settings" method="POST">
                         <div class="float-left">
                            <label for="backblaze_storage" class="main-label">Backblaze Storage</label>
                            <br><small class="admin-info">Enable Backblaze Storage to store your files in Backblaze Spaces.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="backblaze_storage" value="0" />
                            <input type="checkbox" name="backblaze_storage" id="chck-backblaze_storage" value="1" >
                            <label for="chck-backblaze_storage" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Backblaze Bucket ID</label>
                                <input type="text" id="backblaze_bucket_id" name="backblaze_bucket_id" class="form-control" value="">
                                <small class="admin-info">Your Backblaze Bucket ID.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Backblaze Bucket Name</label>
                                <input type="text" id="backblaze_bucket_name" name="backblaze_bucket_name" class="form-control" value="">
                                <small class="admin-info">Your Backblaze Bucket Name.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Backblaze Bucket Region</label>
                                <input type="text" id="backblaze_bucket_region" name="backblaze_bucket_region" class="form-control" value="">
                                <small class="admin-info">Your Backblaze Bucket Region.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Backblaze Access Key ID</label>
                                <input type="text" id="backblaze_access_key_id" name="backblaze_access_key_id" class="form-control" value="">
                                <small class="admin-info">Your Backblaze Access Key ID.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Backblaze Access Key</label>
                                <input type="text" id="backblaze_access_key" name="backblaze_access_key" class="form-control" value="">
                                <small class="admin-info">Your Backblaze Access Key.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Backblaze Custom Endpoint (Optional)</label>
                                <input type="text" name="backblaze_endpoint" class="form-control" value="">
                                <small class="admin-info">Your Backblaze custom domain name, e.g: https://customCDNdomain.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">
                            Before enabling Backblaze, make sure you upload the whole "upload/" folder to your bucket. <br><br>
                            Before disabling Backblaze, make sure you download the whole "upload/" folder to your server. <br><br>
                        </div>
                        <div class="backblaze_storage_alert"></div>
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestBackblaze()">Test & Verify Connection</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
       </div>
            <!-- ./ Content -->

        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

</body>
</html>

@section("dashboard")