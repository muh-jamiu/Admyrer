@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
Socail Login | Admyrer
@endsection

@section("dashboard")
<!-- ./ Sidebar group -->

<!-- Layout wrapper -->
<div class="layout-wrapper">

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                <div class="container-fluid">
    <div>
        <h3>Social Login Settings</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Settings</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Social Login Settings</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Social Login Settings</h6>
                    <div class="social-settings-alert"></div>
                    <form class="social-settings" method="POST">
						
						<div>
							<div class="float-left">
								<label for="facebookLogin" class="main-label">Facebook</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their Facebook account.</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="facebookLogin" value="0">
								<input type="checkbox" name="facebookLogin" id="facebookLogin-enabled" value="1" checked>
								<label for="facebookLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="VkontakteLogin" class="main-label">Vkontakte</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their Vkontakte account</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="VkontakteLogin" value="0">
								<input type="checkbox" name="VkontakteLogin" id="VkontakteLogin-enabled" value="1" checked>
								<label for="VkontakteLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="googleLogin" class="main-label">Google+</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their Google+ account, (App requires reviewing)</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="googleLogin" value="0">
								<input type="checkbox" name="googleLogin" id="googleLogin-enabled" value="1" >
								<label for="googleLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="twitterLogin" class="main-label">Twitter</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their Twitter account</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="twitterLogin" value="0">
								<input type="checkbox" name="twitterLogin" id="twitterLogin-enabled" value="1" >
								<label for="twitterLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="wowonder_login" class="main-label">WoWonder (Your Own Site) <a href="#" data-toggle="modal" data-target="#wowonder">?</a></label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their WoWonder account</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="wowonder_login" value="0">
								<input type="checkbox" name="wowonder_login" id="wowonder_login-enabled" value="1" checked>
								<label for="wowonder_login-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="qqLogin" class="main-label">QQ Login</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their QQ account</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="qqLogin" value="0">
								<input type="checkbox" name="qqLogin" id="qqLogin-enabled" value="1" >
								<label for="qqLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="WeChatLogin" class="main-label">WeChat Login</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their WeChat account</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="WeChatLogin" value="0">
								<input type="checkbox" name="WeChatLogin" id="WeChatLogin-enabled" value="1" >
								<label for="WeChatLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="DiscordLogin" class="main-label">Discord Login</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their Discord account</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="DiscordLogin" value="0">
								<input type="checkbox" name="DiscordLogin" id="DiscordLogin-enabled" value="1" checked>
								<label for="DiscordLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
						<div>
							<div class="float-left">
								<label for="MailruLogin" class="main-label">Mailru Login</label>
								<br><small class="admin-info">Enable the ability for users to login to your site using their Mailru account</small>
							</div>
							<div class="form-group float-right switcher">
								<input type="hidden" name="MailruLogin" value="0">
								<input type="checkbox" name="MailruLogin" id="MailruLogin-enabled" value="1" >
								<label for="MailruLogin-enabled" class="check-trail"><span class="check-handler"></span></label>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="linkedinLogin" class="main-label">Linkedin Login</label>
                            <br><small class="admin-info">Enable the ability for users to login to your site using their Linkedin account.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="linkedinLogin" value="0" />
                            <input type="checkbox" name="linkedinLogin" id="chck-linkedinLogin" value="1" >
                            <label for="chck-linkedinLogin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="OkLogin" class="main-label">ok.ru Login</label>
                            <br><small class="admin-info">Enable the ability for users to login to your site using their ok.ru account.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="OkLogin" value="0" />
                            <input type="checkbox" name="OkLogin" id="chck-OkLogin" value="1" >
                            <label for="chck-OkLogin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">API Keys</h6>
                    <div class="api-settings-alert"></div>
                    <form class="api-settings" method="POST">
						<div class="alert alert-info">Please note that some websites may require app verification.</div>
						<label class="form-label main-label" style="background: #1877F2; color: #fff; margin-bottom: 12px;">Facebook Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="facebookAppId" name="facebookAppId" class="form-control" value="396590724233303" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="facebookAppKey" name="facebookAppKey" class="form-control" value="579a79cceeb5d6cf3ae1b59db3555cf0" placeholder="Application Secret Key">
                            </div>
                        </div>
						<hr>
						<label class="form-label main-label" style="background: #DD5144; color: #fff; margin-bottom: 12px;">Google+ Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="googleAppId" name="googleAppId" class="form-control" value="716215768781-1riglii0rihhc9gmp53qad69tt8o2e03.apps.googleusercontent.com" placeholder="Client ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="googleAppKey" name="googleAppKey" class="form-control" value="7OAaNaItHuEtdy_nWMEvLBpV" placeholder="Client Secret Key">
                            </div>
                        </div>
						<hr>
						<label class="form-label main-label" style="background: #1DA1F2; color: #fff; margin-bottom: 12px;">Twitter Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="twitterAppId" name="twitterAppId" class="form-control" value="" placeholder="Consumer Key">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="twitterAppKey" name="twitterAppKey" class="form-control" value="" placeholder="Consumer Secret">
                            </div>
                        </div>
						<hr>
						<label class="form-label main-label" style="background: #2787F5; color: #fff; margin-bottom: 12px;">Vkontakte Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="VkontakteAppId" name="VkontakteAppId" class="form-control" value="7950653" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="VkontakteAppKey" name="VkontakteAppKey" class="form-control" value="oln1cvb671njK3zuymzL" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>
						<label class="form-label main-label" style="background: #a84849; color: #fff; margin-bottom: 12px;">WoWonder Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="wowonder_app_ID" name="wowonder_app_ID" class="form-control" value="769492894a8b71a10f67" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="wowonder_app_key" name="wowonder_app_key" class="form-control" value="6f048a764290664a50e6a68e207ba2a3c9562b1" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="wowonder_domain_uri" name="wowonder_domain_uri" class="form-control" value="https://demo.wowonder.com" placeholder="WoWonder Domain">
								<small class="admin-info">The domain of your website that uses WoWonder Social Network.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="wowonder_domain_icon" name="wowonder_domain_icon" class="form-control" value="https://demo.wowonder.com/themes/default/img/icon.png" placeholder="WoWonder Icon">
								<small class="admin-info">Link to your icon, example: <a href="https://demo.wowonder.com/themes/default/img/icon.png">https://demo.wowonder.com/themes/default/img/icon.png</a></small>
                            </div>
                        </div>
                        <hr>
						<label class="form-label main-label" style="background: #009BC0; color: #fff; margin-bottom: 12px;">QQ Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="qqAppId" name="qqAppId" class="form-control" value="" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="qqAppkey" name="qqAppkey" class="form-control" value="" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>
						<label class="form-label main-label" style="background: #90D573; color: #fff; margin-bottom: 12px;">WeChat Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="WeChatAppId" name="WeChatAppId" class="form-control" value="" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="WeChatAppkey" name="WeChatAppkey" class="form-control" value="" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>
						<label class="form-label main-label" style="background: #6E85D2; color: #fff; margin-bottom: 12px;">Discord Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="DiscordAppId" name="DiscordAppId" class="form-control" value="887070272887353366" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="DiscordAppkey" name="DiscordAppkey" class="form-control" value="9_ZnHNOTzABVkWacqHPdaQKyeb7StmhW" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>
						<label class="form-label main-label" style="background: #005CF1; color: #fff; margin-bottom: 12px;">Mailru Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="MailruAppId" name="MailruAppId" class="form-control" value="" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="MailruAppkey" name="MailruAppkey" class="form-control" value="" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>
                        <label class="form-label main-label" style="background: #0077B5; color: #fff; margin-bottom: 12px;">LinkedIn Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="linkedinAppId" name="linkedinAppId" class="form-control" value="77t9m85f2gcisb"  placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="linkedinAppKey" name="linkedinAppKey" class="form-control" value="vAVg2v2B9rGPBNEm"  placeholder="Application Secret Key">
                            </div>
                        </div>
                        <hr>
                        <label class="form-label main-label" style="background: #005CF1; color: #fff; margin-bottom: 12px;">ok.ru Configuration</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="OkAppId" name="OkAppId" class="form-control" value="" placeholder="Application ID">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="OkAppPublickey" name="OkAppPublickey" class="form-control" value="" placeholder="Application Public Key">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="OkAppSecretkey" name="OkAppSecretkey" class="form-control" value="" placeholder="Application Secret Key">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="143df602a55fa43b4454d778d1fe8555f9d162d0">
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->

    <div id="wowonder" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">WoWonder Integration</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This feature allows you to integrate users from your own website that uses <a href="http://www.wowonder.com" target="_blank">WoWonder</a>.</p>
                    <p>To get started please follow those steps:</p>
                    <ul>
                        <li>Go to http://yoursite.com/developers, you'll get the following <a target="_blank" href="https://quickdatescript.com/admin-panel/images/Screenshot_1.png">Page</a></li>
                        <li>Click on "Create an app", and fill the required information.</li>
                        <li>On the form, make sure the info are similar as shown <a target="_blank" href="https://quickdatescript.com/admin-panel/images/Screenshot_2.png">Here</a>.</li>
                        <li>Save the form, get the <a  target="_blank" href="https://quickdatescript.com/admin-panel/images/Screenshot_4.png">Keys</a>, and use them <a target="_blank" href="https://quickdatescript.com/admin-panel/images/Screenshot_3.png">Here</a>.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
          </div>
            <!-- ./ Content -->

        </div>
        <!-- ./ Content body -->
</div>
<!-- ./ Layout wrapper -->


</body>
</html>

@endsection