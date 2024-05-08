@extends("layouts.app")

@section('title')
Forgot Password | Admyrer
@endsection

@section("content")
<style>body > #container {padding: 0 !important;}#nav-not-logged-in,.page_footer:not(.dt_auth_footr_page){display: none !important;visibility: hidden !important;}</style>

<div class="dt_login_body">
	<div class="dt_login_body_inner">
		<img src="/img/login-banner.png" class="login_baner">
		<img src="/img/login-banner-mask.svg" class="login_banner_mask">
		<img src="/img/login-banner-lines.svg" class="login_banner_lines">
		
		<nav role="navigation">
			<div class="nav-wrapper">
				<div class="left header_logo">
					<a id="logo-container" href="/" class="brand-logo"><img src="/img/logo.png" /></a>
				</div>
				<ul class="right not_usr_nav">
					<li><a href="/login" data-ajax="/login" class="btn btn-flat"><?php echo __( 'Login' );?></a></li>
					<li><a href="/register" data-ajax="/register" class="btn-flat btn white waves-effect"><?php echo __( 'Register' );?></a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container-fluid auth_bg_img">
			<div class="container dt_login_bg">
				<div class="">
					<div class="dt_login_con">
						<div class="row dt_login login">
							<form method="POST" action="/Useractions/forget_password" class="login">
								<p><span class="bold"><?php echo __( 'Password recovery,' );?></span> <?php echo __( 'Please enter your registered email address to proceed.' );?></p>
								<div class="alert alert-success" role="alert" style="display:none;"></div>
								<div class="alert alert-danger" role="alert" style="display:none;"></div>
								<div class="row">
									<div class="input-field">
										<input id="email" name="email" type="email" class="validate" required autofocus>
										<label for="email" class="mx-3"><?php echo __( 'Email' );?></label>
									</div>
								</div>
								<div class="dt_login_footer valign-wrapper">
									<button class="btn btn-large waves-effect waves-light bold btn_primary btn_round" type="submit" name="action"><span><?php echo __( 'Proceed' );?></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection