@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
General Settings | Admyrer
@endsection

@section("dashboard")
<div class="layout-wrapper" style="height: fit-content !important">

        <h3>General Configuration</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Settings</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">General Configuration</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6 float-left">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">General Configuration</h6>
                    <div class="user-settings-alert"></div>
                    <form class="user-settings" method="POST">
                    	<div class="float-left">
                            <label for="developer_mode" class="main-label">Developer Mode</label>
                            <br><small class="admin-info">By enabling developer mode, error reporting will be enabled, <br>it's not recommended to enable this mode without the help of a developer,<br> this may occur some issues in your website.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="developer_mode" value="0" />
                            <input type="checkbox" name="developer_mode" id="chck-developer_mode" value="1" >
                            <label for="chck-developer_mode" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
						<div>
							<div class="float-left">
								<label for="maintenance_mode" class="main-label">Maintenance Mode</label>
								<br><small class="admin-info">Turn the whole site under Maintenance. <br> You can get the site back by visiting https://quickdatescript.com/?access=admin</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="maintenance_mode" value="0">
								<input type="checkbox" name="maintenance_mode" id="maintenance_mode-enabled" value="1" >
								<label for="maintenance_mode-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="pro_system" class="main-label">Pro System</label>
								<br><small class="admin-info">Enable Premium Features.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="pro_system" value="0">
								<input type="checkbox" name="pro_system" id="pro_system-enabled" value="1" checked>
								<label for="pro_system-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="free_features" class="main-label">Free Mode</label>
								<br><small class="admin-info">Convert all paid features to free. </small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="free_features" value="0">
								<input type="checkbox" name="free_features" id="free_features-enabled" value="1" >
								<label for="free_features-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
							
						
						
						
						
						<div>
							<div class="float-left">
								<label for="developers_page" class="main-label">Developers (API System)</label>
								<br><small class="admin-info">Allows users to retrieve informations from your website</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="developers_page" value="0">
								<input type="checkbox" name="developers_page" id="developers_page-enabled" value="1" checked>
								<label for="developers_page-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>

                      	 <label class="form-check-label" for="defualtLang">Default Language</label>
                        <select class="form-control show-tick" id="default_language" name="default_language">
                            <option value="" disabled selected>Default Language</option><option value="english" selected>English</option><option value="arabic" >Arabic</option><option value="dutch" >Dutch</option><option value="french" >French</option><option value="german" >German</option><option value="italian" >Italian</option><option value="portuguese" >Portuguese</option><option value="russian" >Russian</option><option value="spanish" >Spanish</option><option value="turkish" >Turkish</option>                        </select>
						<small class="admin-info">Set your site default language.</small>
						<hr>
						<label for="default_unit">Default Distance Unit</label>
                        <select class="form-control show-tick" id="default_unit" name="default_unit">
                            <option value="" disabled="" selected="">Default Unit</option>
                            <option value="km" selected="">KM</option>
                            <option value="mile" >Mile</option>
                        </select>
						<small class="admin-info">Set the distance unit used in search system. </small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="pop_up_18" class="main-label">+18 Pop-up</label>
                            <br><small class="admin-info">Show +18 Pop-up when user access the site.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="pop_up_18" value="off" />
                            <input type="checkbox" name="pop_up_18" id="chck-pop_up_18" value="on" >
                            <label for="chck-pop_up_18" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">+18 Block Time</label>
                                <input type="text" name="time_18" class="form-control" value="1" oninput="this.value = this.value.replace(/[^1-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                <small class="admin-info">Set the amount of hours to block a user which isn't above 18 years old.</small>
                            </div>
                        </div>
                        
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">User Configuration</h6>
                    <div class="clearfix">
                        <form class="form links-settings-form"  method="POST">
                            <div class="links-form-alert"></div>
							<div>
							<div class="float-left">
								<label for="deleteAccount" class="main-label">User Account Deletion</label>
								<br><small class="admin-info">Allow users to delete their account.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="deleteAccount" value="0">
								<input type="checkbox" name="deleteAccount" id="deleteAccount-enabled" value="1" checked>
								<label for="deleteAccount-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
							<div>
							<div class="float-left">
								<label for="show_user_on_homepage" class="main-label">Show Users On Homepage</label>
								<br><small class="admin-info">Show users profile on home page.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="show_user_on_homepage" value="0">
								<input type="checkbox" name="show_user_on_homepage" id="show_user_on_homepage-enabled" value="1" checked>
								<label for="show_user_on_homepage-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<label for="showed_user">Showed users</label>
							<select class="form-control show-tick" id="showed_user" name="showed_user">
								<option value="25" >25</option>
								<option value="50" >50</option>
								<option value="75" >75</option>
								<option value="100" >100</option>
								<option value="125" >125</option>
								<option value="150" selected="">150</option>
							</select>
							<small class="admin-info">Max Number of users to be displayed in home page.</small>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="connectivitySystem" class="main-label">Friends System</label>
								<br><small class="admin-info">Enable the ability for users to make friends.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="connectivitySystem" value="0">
								<input type="checkbox" name="connectivitySystem" id="connectivitySystem-enabled" value="1" checked>
								<label for="connectivitySystem-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Friends System Limit</label>
									<input type="text" name="connectivitySystemLimit" class="form-control" value="5000">
									<small class="admin-info">Set the max number of friends a user can have. </small>
								</div>
							</div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="opposite_gender" class="main-label">Opposite Gender</label>
								<br><small class="admin-info">Show only opposite genders in search system.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="opposite_gender" value="0">
								<input type="checkbox" name="opposite_gender" id="opposite_gender-enabled" value="1" >
								<label for="opposite_gender-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
							<div>
								<div class="float-left">
									<label for="invite_links_system" class="main-label">User Invite System</label>
									<br><small class="admin-info">Allow users to invite other users to your site.</small>
								</div>
								<div class="form-group float-right switcher">
									<input type="hidden" name="invite_links_system" value="0">
									<input type="checkbox" name="invite_links_system" id="invite_links_system-enabled" value="1" >
									<label for="invite_links_system-enabled" class="check-trail"><span class="check-handler"></span></label>
								</div>
								<div class="clearfix"></div>
							</div>
							
                            <div class="form-group form-float">

                                <div class="form-line">
                                    <label class="form-label">
                                        How many links can a user generate?
                                    </label>
                                    <input type="text" id="user_links_limit" name="user_links_limit" class="form-control" value="10">
                                    <div class="clearfix"></div>
                                </div>
                               
                            </div>
                             <div class="form-group form-float">
                                    <label class="form-label" class="main-label">User can generate X links within?</label>
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="expire_user_links" name="expire_user_links">
                                              <option value="hour" >1 Hour</option>
                                              <option value="day" >1 Day</option>
                                              <option value="week" >1 Week</option>
                                              <option value="month"  selected>1 Month</option>
                                              <option value="year" >1 Year</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Max Likes & Swaps</label>
                                <input type="text" name="max_swaps" class="form-control" value="50">
								<small class="admin-info">Set the limit of max likes and swaps a user can make everday.</small>
                            </div>
                        </div>
                        <div>
							<div class="float-left">
								<label for="success_stories_system" class="main-label">Success Stories System</label>
								<br><small class="admin-info">Allow users to add success stories on your site.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="success_stories_system" value="0">
								<input type="checkbox" name="success_stories_system" id="success_stories_system-enabled" value="1" checked>
								<label for="success_stories_system-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
						</div>
                            <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Notifications Settings</h6>
                    <div class="notifications-settings-alert"></div>
                    <form class="notifications-settings" method="POST">
						<div>
							<div class="float-left">
								<label for="emailNotification" class="main-label">E-mail Notifications</label>
								<br><small class="admin-info">Send user notifications via email</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="emailNotification" value="0">
								<input type="checkbox" name="emailNotification" id="emailNotification-enabled" value="1" >
								<label for="emailNotification-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
						</div>

                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Image & Media Settings</h6>
                    <div class="notifications-settings-alert"></div>
                    <form class="notifications-settings" method="POST">
						 <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Default Image Path</label>
                                <input type="text" name="userDefaultAvatar" class="form-control" value="upload/photos/d-avatar.jpg">
                                 <small class="admin-info">https://quickdatescript.com/PATH</small>
                            </div>
                        </div>

                        <!-- <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Private Pictures Blur Percentage</label>
                                <input type="text" name="img_blur_amount" class="form-control" value="50">
								<small class="admin-info">Set the blur percentage for private pictures, 0 - 100</small>
                            </div>
                        </div> -->
                        <div class="clearfix"></div>
                        <hr>

						<div class="float-left">
							<label for="watermark_system" class="main-label">Watermark Overlay</label>
							<br><small class="admin-info">This feature will create an overlay watermark over images & videos. <br> The used icon path is: ./themes/love/img/icon.png</small>
						</div>
						<div class="form-group float-right switcher">
							<input type="hidden" name="watermark_system" value="0">
							<input type="checkbox" name="watermark_system" id="watermark_system-enabled" value="1" >
							<label for="watermark_system-enabled" class="check-trail"><span class="check-handler"></span></label>
						</div>
						<div class="clearfix"></div>
                        <hr>

                        <label for="user_registration" class="main-label">Avatar Crop Settings</label><div class="clearfix"></div> <br>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Avatar Width</label>
                                <input type="text" name="profile_picture_width_crop" class="form-control" value="400">
								<small class="admin-info">Set the width of avatar the system will use to crop. </small>
                            </div>
                            <div class="form-line focused">
                                <label class="form-label">Avatar Height</label>
                                <input type="text" name="profile_picture_height_crop" class="form-control" value="400">
								<small class="admin-info">Set the height of avatar the system will use to crop.</small>
                            </div>
                            <div class="form-line focused">
                                <label class="form-label">Avatar Quality </label>
                                <input type="text" name="profile_picture_image_quality" class="form-control" value="80">
								<small class="admin-info">Set the width of avatar the system will use to use, range from ~50:100</small>
                            </div>
                        </div>
                        <hr>
                        <div>
							<div class="float-left">
								<label for="review_media_files" class="main-label">Review Media Files</label>
								<br><small class="admin-info">Approve / Decline an image before publishing.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="review_media_files" value="0">
								<input type="checkbox" name="review_media_files" id="review_media_files-enabled" value="1" >
								<label for="review_media_files-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Photos Upload Limit</label>
                                <input type="text" name="max_photo_per_user" class="form-control" value="12">
								<small class="admin-info">Set a limit for photos uploads a user can make, PRO users can uplaod unlimited photos.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
						
						<div>
							<div class="float-left">
								<label for="lock_private_photo" class="main-label">Lock Private Photos</label>
								<br><small class="admin-info">User can lock his image and request money for viewing it.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="lock_private_photo" value="0">
								<input type="checkbox" name="lock_private_photo" id="lock_private_photo-enabled" value="1" >
								<label for="lock_private_photo-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<label class="form-check-label" for="show_user_on_homepage">Unlock Fee</label>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="lock_private_photo_fee" class="form-control" value="30">
									<small class="admin-info">How much does it cost to unlock the locked photo?</small>
								</div>
							</div>
							<hr>
						</div>
						
						<div>
							<div class="float-left">
								<label for="lock_pro_video" class="main-label">Lock Private Videos</label>
								<br><small class="admin-info">User can lock his videos and request money for viewing it.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="lock_pro_video" value="0">
								<input type="checkbox" name="lock_pro_video" id="lock_pro_video-enabled" value="1" >
								<label for="lock_pro_video-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<label for="show_user_on_homepage">Unlock Fee</label>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="lock_pro_video_fee" class="form-control" value="40">
									<small class="admin-info">How much does it cost to unlock the locked video?</small>
								</div>
							</div>
							<hr>
						</div>


                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 float-left">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Login & Registration</h6>
                    <div class="general-settings-alert"></div>
                    <form class="general-settings" method="POST">
                    	<div>
							<div class="float-left">
								<label for="user_registration" class="main-label">User Registration</label>
								<br><small class="admin-info">Allow users to create accounts in your site.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="user_registration" value="0">
								<input type="checkbox" name="user_registration" id="user_registration-enabled" value="1" checked>
								<label for="user_registration-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div class="float-left">
								<label for="emailValidation" class="main-label">Account Validation</label>
								<br><small class="admin-info">Send an activation link after registration.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="emailValidation" value="0">
								<input type="checkbox" name="emailValidation" id="emailValidation-enabled" value="1" >
								<label for="emailValidation-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<label for="defualtLang">Account Validation Method</label>
							<br>
							<small class="admin-info">Choose the validation type, by SMS or E-mail, if you choose SMS, make sure you have configured the SMS configration.</small>
							<div class="form-group">
								<select class="form-control show-tick" id="sms_or_email" name="sms_or_email">
									<option value="mail" selected>E-mail address</option>
									<option value="sms" >SMS / Phone Number</option>
								</select>
							</div>
							<div>
								<hr>
							<div class="float-left">
								<label for="activation_limit_system" class="main-label">Activation Limits</label>
								<br><small class="admin-info">Limit the amount of activation SMS & E-mails can request.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="activation_limit_system" value="0">
								<input type="checkbox" name="activation_limit_system" id="activation_limit_system-enabled" value="1" checked>
								<label for="activation_limit_system-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
						</div>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Max Requests Allowed</label>
                                <input type="text" name="max_activation_request" class="form-control" value="5">
								<small class="admin-info">Set the max allowed requests a user can send. </small>
                            </div>
                            <div class="form-line focused">
                                <label class="form-label">Time Between Requests</label>
                                <input type="text" name="activation_request_time_limit" class="form-control" value="5">
								<small class="admin-info">Set the time a user should wait before sending another request (in minutes)</small>
                            </div>
                        </div>
							<hr>
							<div>
							<div class="float-left">
								<label for="disable_phone_field" class="main-label">Phone Number Field</label>
								<br><small class="admin-info">Require phone number from users on sign up.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="disable_phone_field" value="off">
								<input type="checkbox" name="disable_phone_field" id="disable_phone_field-enabled" value="on" >
								<label for="disable_phone_field-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Allowed E-mail Providers</label>
                                <input type="text" name="specific_email_signup" class="form-control" value="">
								<small class="admin-info">Allow signs ups from specific Email provider. for example gmail.com, leave empty to allow from all</small>
                            </div>
                        </div>
                        <hr>
                        <div>
							<div class="float-left">
								<label for="prevent_system" class="main-label">Prevent Login System</label>
								<br><small class="admin-info">Enable this feature to track and stop brute-force attacks.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="prevent_system" value="0">
								<input type="checkbox" name="prevent_system" id="prevent_system-enabled" value="1" >
								<label for="prevent_system-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
						</div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Bad Login Limit</label>
                                <input type="text" id="bad_login_limit" name="bad_login_limit" class="form-control" value="4">
								<small class="admin-info">How many times a user can try to login before a lockout?</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Lockout Time (Minutes)</label>
                                <input type="text" id="lock_time" name="lock_time" class="form-control" value="10">
								<small class="admin-info">For how long should the user stay locked out?</small>
                            </div>
                        </div>
                        <hr>
                        <div>
							<div class="float-left">
								<label for="image_verification" class="main-label">Image Verification</label>
								<br><small class="admin-info">Require Image verification when user sign up. </small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="image_verification" value="0">
								<input type="checkbox" name="image_verification" id="image_verification-enabled" value="1" >
								<label for="image_verification-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="pending_verification" class="main-label">Require Verification</label>
								<br><small class="admin-info">Require admin approve to enable user account. </small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="pending_verification" value="0">
								<input type="checkbox" name="pending_verification" id="pending_verification-enabled" value="1" >
								<label for="pending_verification-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						 <div>
							<div class="float-left">
								<label for="verification_on_signup" class="main-label">Require Verification Docs</label>
								<br><small class="admin-info">Require the user to upload his ID on sign up.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="verification_on_signup" value="0">
								<input type="checkbox" name="verification_on_signup" id="verification_on_signup-enabled" value="1" >
								<label for="verification_on_signup-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="two_factor" class="main-label">Two-factor authentication</label>
								<br><small class="admin-info">Send confirmation code to email or to SMS when user logins</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="two_factor" value="0">
								<input type="checkbox" name="two_factor" id="two_factor-enabled" value="1" checked>
								<label for="two_factor-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<label for="defualtLang">Two-factor Authentication Method</label>
							<br>
							<small class="admin-info">Select the system the 2FA should use.</small>
							<div class="form-group">
								<select class="form-control show-tick" id="two_factor_type" name="two_factor_type">
									<option value="email" selected>E-mail</option>
									<option value="phone" >Phone</option>
									<option value="both" >Both</option>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
                        <hr>
						<div class="float-left">
                            <label for="reserved_usernames_system" class="main-label">Reserved usernames System</label>
                            <br><small class="admin-info">Reserved usernames System</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="reserved_usernames_system" value="0" />
                            <input type="checkbox" name="reserved_usernames_system" id="chck-reserved_usernames_system" value="1" >
                            <label for="chck-reserved_usernames_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Reserved usernames</label>
                                <textarea name="reserved_usernames" class="form-control">404,about,age-block,app,apps,article,base,blog,contact,create-app,create-story,credit,developers,disliked,faqs,find-matches,forgot,friend-requests,friends,gifts,hot,index,info,interest,liked,likes,live-users,live,login,mail-otp,maintenance,matches,my-info,myprofile,oauth,page,popularity,privacy,pro-success,pro,profile,refund,register,reset,settings-2fa,settings-affiliate,settings-blocked,settings-delete,settings-email,settings-instagram,settings-links,settings-password,settings-payments,settings-privacy,settings-profile,settings-sessions,settings-social,settings,steps,stories,story,terms,third-party-payment,third-party-theme,transactions,unusual-login,user-live,user-info,userverify,verifymail,verifymailotp,verifyphone,verifyphoneotp,video-call,video,visits</textarea>
                                <small class="admin-info">Reserved usernames</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="recaptcha" class="main-label">reCaptcha</label>
                            <br><small class="admin-info">Enable reCaptcha to prevent spam.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="recaptcha" value="off" />
                            <input type="checkbox" name="recaptcha" id="chck-recaptcha" value="on" >
                            <label for="chck-recaptcha" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label" class="main-label">ReCaptcha site key</label>
                                <input type="text" name="recaptcha_site_key" class="form-control" value="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label" class="main-label">ReCaptcha secret key</label>
                                <input type="text" name="recaptcha_secret_key" class="form-control" value="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">API Settings</h6>
                    <div class="clearfix">
                        <form class="form general-api-form" method="POST">
						<div class="form-group form-float">
                            <div class="form-line">
                               <label for="social_media_links" class="main-label">Google Place API</label>
                                <input type="text" id="google_place_api" name="google_place_api" class="form-control" value="AIzaSyB7rRpQJyQJZYzxrvStRGFkbB0MxXWGrO0">
                            </div>
                            <small>You can disable Google Place API by leaving this field empty.</small>
                        </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">
                                        YouTube API Key
                                    </label>
                                    <input type="text" id="yt_api" name="yt_api" class="form-control" value="">
									<small class="admin-info">Used for videos from youtube.</small>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">
                                        Giphy API Key
                                    </label>
                                    <input type="text" id="giphy_api" name="giphy_api" class="form-control" value="GIjbMwjlfGcmNEgB0eqphgRgwNCYN8gh">
									<small class="admin-info">Used for gifs</small>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">
                                        Google Map API Key
                                    </label>
                                    <input type="text" id="google_map_api_key" name="google_map_api_key" class="form-control" value="">
									<small class="admin-info">Used for showing google map</small>
                                </div>
                            </div>
                            <div class="clearfix"></div>
							<hr>
							<div class="float-left">
								<label for="filter_by_cities" class="main-label">Filter By Cities</label>
								<br><small class="admin-info">Allow Filter By Cities</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="filter_by_cities" value="0">
								<input type="checkbox" name="filter_by_cities" id="filter_by_cities-enabled" value="1" checked>
								<label for="filter_by_cities-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">
                                        GeoNames UserName
                                    </label>
                                    <input type="text" id="geo_username" name="geo_username" class="form-control" value="">
									<small class="admin-info">Your GeoNames UserName</small>
                                </div>
                            </div>
                            <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Instergram Importer Settings</h6>
                    <div class="notifications-settings-alert"></div>
                    <form class="notifications-settings" method="POST">
						<div class="float-left">
							<label for="instagram_importer" class="main-label">Instergram Importer</label>
							<br><small class="admin-info">Users Can Import Their Images From Instagram</small>
						</div>
						<div class="form-group float-right switcher">
							<input type="hidden" name="instagram_importer" value="0">
							<input type="checkbox" name="instagram_importer" id="instagram_importer-enabled" value="1" >
							<label for="instagram_importer-enabled" class="check-trail"><span class="check-handler"></span></label>
						</div>
						<div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Instergram Application ID</label>
                                <input type="text" name="instagram_importer_app_id" class="form-control" value="683543439343306">
								<small class="admin-info">Your Instergram Application ID</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label">Instagram App Secret</label>
                                <input type="text" name="instagram_importer_app_secret" class="form-control" value="c2a985a6430a6db46f2da79c783816e2">
								<small class="admin-info">Your Instagram App Secret</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="alert alert-info">
                            Please add https://quickdatescript.com/settings-instagram as redirect url to your instagram app
                        </div>

                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
            
        </div>
        <!--
        <div class="col-lg-4 col-md-4 float-right">
            <div class="card">
                <div class="header">
                    <h2>Chat Settings</h2>
                </div>
                <div class="card-body">
                    <h6 class="card-title">User Settings</h6>
                    <div class="alert alert-success chat-settings-alert"></div>
                    <form class="chat-settings" method="POST">
                        <label class="form-check-label" for="chatSystem">Chat System <span class="black" data-toggle="popover" data-trigger="hover" data-content="Enable chat system to chat with friends on the buttom of the page."><i class="fa fa-question-circle fa-fw"></i></span></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="chatSystem" id="chatSystem-enabled" value="1" >
                            <label class="form-check-label" for="chatSystem-enabled">Enabled</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="chatSystem" id="chatSystem-disabled" value="0" checked>
                            <label class="form-check-label" for="chatSystem-disabled" class="m-l-20">Disabled</label>
                        </div>
                        <label class="form-check-label" for="message_seen">Message Seen Alert <span class="black" data-toggle="popover" data-trigger="hover" data-content="Checks if the message was seen in chat system, Recommended for powerful servers"><i class="fa fa-question-circle fa-fw"></i></span></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="message_seen" id="message_seen-enabled" value="1" >
                            <label class="form-check-label" for="message_seen-enabled">Enabled</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="message_seen" id="message_seen-disabled" value="0" checked>
                            <label class="form-check-label" for="message_seen-disabled" class="m-l-20">Disabled</label>
                        </div>
                        <label class="form-check-label" for="message_typing">Typing System<span class="black" data-toggle="popover" data-trigger="hover" data-content="Checks if the user is typing in chat system, Recommended for powerful servers"><i class="fa fa-question-circle fa-fw"></i></span></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="message_typing" id="message_typing-enabled" value="1" >
                            <label class="form-check-label" for="message_typing-enabled">Enabled</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="message_typing" id="message_typing-disabled" value="0" checked>
                            <label class="form-check-label" for="message_typing-disabled" class="m-l-20">Disabled</label>
                        </div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 float-right">
            <div class="card">
                <div class="header">
                    <h2 class="pull-left">Upload Settings</h2></a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <h6 class="card-title">User Settings</h6>
                    <div class="alert alert-success upload-settings-alert"></div>
                    <form class="upload-settings" method="POST">
                        <label class="form-check-label" for="fileSharing">File Sharing <span class="black" data-toggle="popover" data-trigger="hover" data-content="Share & upload videos,images,files,sounds, etc.."><i class="fa fa-question-circle fa-fw"></i></span></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fileSharing" id="fileSharing-enabled" value="1" >
                            <label class="form-check-label" for="fileSharing-enabled">Enabled</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fileSharing" id="fileSharing-disabled" value="0" checked>
                            <label class="form-check-label" for="fileSharing-disabled" class="m-l-20">Disabled</label>
                        </div>
                        <label class="form-check-label" for="video_upload">Video Upload <span class="black" data-toggle="popover" data-trigger="hover" data-content="Enable video upload to share & upload videos to the site."><i class="fa fa-question-circle fa-fw"></i></span></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="video_upload" id="video_upload-enabled" value="1" >
                            <label class="form-check-label" for="video_upload-enabled">Enabled</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="video_upload" id="video_upload-disabled" value="0" checked>
                            <label class="form-check-label" for="video_upload-disabled" class="m-l-20">Disabled</label>
                        </div>
                        <label class="form-check-label" for="audio_upload">Audio Upload <span class="black" data-toggle="popover" data-trigger="hover" data-content="Enable audio upload to share & upload music to the site."><i class="fa fa-question-circle fa-fw"></i></span></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="audio_upload" id="audio_upload-enabled" value="1" >
                            <label class="form-check-label" for="audio_upload-enabled">Enabled</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="audio_upload" id="audio_upload-disabled" value="0" checked>
                            <label class="form-check-label" for="audio_upload-disabled" class="m-l-20">Disabled</label>
                        </div>
                        <label class="form-check-label" for="css_upload">CSS Upload <span class="black" data-toggle="popover" data-trigger="hover" data-content="Allow users to upload their own CSS file to design their profile."><i class="fa fa-question-circle fa-fw"></i></span></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="css_upload" id="css_upload-enabled" value="1" >
                            <label class="form-check-label" for="css_upload-enabled">Enabled</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="css_upload" id="css_upload-disabled" value="0" checked>
                            <label class="form-check-label" for="css_upload-disabled" class="m-l-20">Disabled</label>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="allowedExtenstion" name="allowedExtenstion" class="form-control" value="0">
                                <label class="form-label">Allowed extenstions (separated with comma,)</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="mime_types" name="mime_types" class="form-control" value="0">
                                <label class="form-label">Allowed MIME Types (separated with comma,)</label>
                            </div>
                        </div>
                        <label class="form-check-label" for="maxUpload">Max upload size for videos, images, sounds, and files</label>
                        <select class="form-control show-tick" id="maxUpload" name="maxUpload">
                              <option value="2000000"    >2 MB</option>
                              <option value="6000000"    >6 MB</option>
                              <option value="12000000"   >12 MB</option>
                              <option value="24000000"   >24 MB</option>
                              <option value="48000000"   >48 MB</option>
                              <option value="96000000"   >96 MB</option>
                              <option value="256000000"  >256 MB</option>
                              <option value="512000000"  >512 MB</option>
                              <option value="1000000000" >1 GB</option>
                              <option value="5000000000" >5 GB</option>
                              <option value="10000000000" >10 GB</option>
                        </select>
                        <div class="clearfix"></div>
                        <br><br>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">

                    </form>
                </div>
            </div>
        </div>        -->

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
    $('input[type=text], input[type=number]').on('input', delay(function() {
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
<!-- ./ Layout wrapper -->

<script src="https://quickdatescript.com/admin-panel/vendors/sweetalert/sweetalert.min.js"></script>
<script src="https://quickdatescript.com/admin-panel/vendors/select2/js/select2.min.js"></script>
    <script src="https://quickdatescript.com/admin-panel/assets/js/examples/select2.js"></script>
    <script src="https://quickdatescript.com/admin-panel/assets/js/app.min.js"></script>
    <script type="text/javascript">
        function ChangeMode(mode) {
            if (mode == 'day') {
                $('body').removeClass('dark');
                $('.admin_mode').html('<span id="night-mode-text">Night mode</span><svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>');
                $('.admin_mode').attr('onclick', "ChangeMode('night')");
            }
            else{
                $('body').addClass('dark');
                $('.admin_mode').html('<span id="night-mode-text">Day mode</span><svg class="feather feather-moon float-right" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>');
                $('.admin_mode').attr('onclick', "ChangeMode('day')");
            }
            hash_id = $('#hash_id').val();
            $.get("https://quickdatescript.com",{hash_id: hash_id,mode:mode}, function(data) {});
        }
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
            var hash = $('.main_session').val();
              $.ajaxSetup({ 
                data: {
                    hash: hash
                },
                cache: false 
              });
        });
        $('body').on('click', function (e) {
            $('.dropdown-animating').removeClass('show');
            $('.dropdown-menu').removeClass('show');
        });
        function searchInFiles(keyword) {
            if (keyword.length > 2) {
                $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=search_in_pages', {keyword: keyword}, function(data, textStatus, xhr) {
                    if (data.html != '') {
                        $('#search_for_bar').html(data.html)
                    }
                    else{
                        $('#search_for_bar').html('')
                    }
                });
            }
            else{
                $('#search_for_bar').html('')
            }
        }
        jQuery(document).ready(function($) {
            jQuery.fn.highlight = function (str, className) {
                if (str != '') {
                    var aTags = document.getElementsByTagName("h2");
                    var bTags = document.getElementsByTagName("label");
                    var cTags = document.getElementsByTagName("h3");
                    var dTags = document.getElementsByTagName("h6");
                    var searchText = str.toLowerCase();

                    if (aTags.length > 0) {
                        for (var i = 0; i < aTags.length; i++) {
                            var tag_text = aTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(aTags[i]).addClass(className)
                            }
                        }
                    }

                    if (bTags.length > 0) {
                        for (var i = 0; i < bTags.length; i++) {
                            var tag_text = bTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(bTags[i]).addClass(className)
                            }
                        }
                    }

                    if (cTags.length > 0) {
                        for (var i = 0; i < cTags.length; i++) {
                            var tag_text = cTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(cTags[i]).addClass(className)
                            }
                        }
                    }

                    if (dTags.length > 0) {
                        for (var i = 0; i < dTags.length; i++) {
                            var tag_text = dTags[i].textContent.toLowerCase();
                            if (tag_text.indexOf(searchText) != -1) {
                                $(dTags[i]).addClass(className)
                            }
                        }
                    }
                }
            };
            jQuery.fn.highlight("",'highlight_text');
        });
        $(document).on('click', '#search_for_bar a', function(event) {
            event.preventDefault();
            location.href = $(this).attr('href');
        });
        function ReadNotify() {
            hash_id = $('#hash_id').val();
            $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'ReadNotify', hash_id: hash_id});
            location.reload();
        }
        function delay(callback, ms) {
          var timer = 0;
          return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
              callback.apply(context, args);
            }, ms || 0);
          };
        }
        function logout(){
            document.cookie = 'JWT=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/;SameSite=None;Secure';
            window.location = "https://quickdatescript.com";
        }
    </script>


@endsection