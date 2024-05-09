<!-- Header not-logged-in -->
<nav class="nav-not-logged-in bg-white" role="navigation" id="nav-not-logged-in">
	<div class="nav-wrapper container container_new">
		<div class="left header_logo">
			<a id="logo-container" href="/" class="brand-logo"><img src="" /></a>
		</div>
		<ul class="right">
			<li class="hide_mobi_login"><a style="color: #CC42BD" href="/login" data-ajax="/login" class="btn-flat waves-effect text-main qdt_hdr_auth_btns"><?php echo __( 'Login' );?></a></li>
			<li class="hide_mobi_login"><a style="background-color: #CC42BD !important"  href="/register" data-ajax="/register" class="btn-flat btn btn_primary waves-effect waves-light white-text qdt_hdr_auth_btns"><?php echo __( 'Register' );?></a></li>
			<div class="show_mobi_login">
				<a class="dropdown-trigger" href="#" data-target="#log_in_dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#222" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" /></svg></a>
				<ul id="log_in_dropdown" class="dropdown-content">
					<li>
						<a href="/login" data-ajax="/login" class="btn-flat waves-effect text-main qdt_hdr_auth_btns"><?php echo __( 'Login' );?></a>
					</li>
						<li>
							<a href="/register" data-ajax="/register" class="btn-flat btn btn_primary waves-effect waves-light white-text qdt_hdr_auth_btns"><?php echo __( 'Register' );?></a>
						</li>
				</ul>
			</div>
		</ul>
	</div>
</nav>
<!-- End Header not-logged-in -->