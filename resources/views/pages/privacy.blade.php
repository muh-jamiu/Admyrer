
@extends("layouts.app")

@section('title')
Privacy | Admyrer
@endsection

@section("content")

<div class="container container-fluid container_new find_matches_cont dt_terms">
	<div class="row r_margin">
		<div class="col-sm-3 profile_menu">
			<div class="dt_left_sidebar">
				<ul class="menu">
					<li class="">
						<a href="/terms" data-ajax="/terms"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M20 22H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1zm-1-2V4H5v16h14zM7 6h4v4H7V6zm0 6h10v2H7v-2zm0 4h10v2H7v-2zm6-9h4v2h-4V7z"/></svg> <?php echo __( 'Terms of use' );?></a>
					</li>
					<li class="">
						<a class="active" href="/privacy" data-ajax="/privacy"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z"/></svg> <?php echo __( 'Privacy Policy' );?></a>
					</li>
					<li class="">
						<a href="/about" data-ajax="/about"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M3 4.995C3 3.893 3.893 3 4.995 3h14.01C20.107 3 21 3.893 21 4.995v14.01A1.995 1.995 0 0 1 19.005 21H4.995A1.995 1.995 0 0 1 3 19.005V4.995zM5 5v14h14V5H5zm2.972 13.18a9.983 9.983 0 0 1-1.751-.978A6.994 6.994 0 0 1 12.102 14c2.4 0 4.517 1.207 5.778 3.047a9.995 9.995 0 0 1-1.724 1.025A4.993 4.993 0 0 0 12.102 16c-1.715 0-3.23.864-4.13 2.18zM12 13a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7zm0-2a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg> <?php echo __( 'About us' );?></a>
					</li>
					<li class="">
						<a href="/faqs" data-ajax="/faqs"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z"/></svg> <?php echo __( 'faqs' );?></a>
					</li>
					<li class="">
						<a href="/refund" data-ajax="/refund"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M15 4H5v16h14V8h-4V4zM3 2.992C3 2.444 3.447 2 3.999 2H16l5 5v13.993A1 1 0 0 1 20.007 22H3.993A1 1 0 0 1 3 21.008V2.992zM13 12v4h-2v-4H8l4-4 4 4h-3z"/></svg> <?php echo __( 'refund' );?></a>
					</li>
					<li class="divider" tabindex="-1"></li>
					<li class="">
						<a href="/contact" data-ajax="/contact"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z"/></svg> <?php echo __( 'Contact us' );?></a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="col-sm-9">
			<div class="dt_settings_bg_wrap">
				<h2 class="bold terms" style="font-size: 22px">
					<div><?php echo __( 'Privacy Policy' );?></div>
				</h2>
				<div class="dt_terms_content_body terms">
					<p style="line-height: 40px; font-size:1.2em">Privacy Policy for Admyrer AI-Powered Dating Platform Effective Date: 1/1/2024 Admyrer is committed to protecting the privacy and security of our users. This Privacy Policy explains how we collect, use, and share personal information on our AI-powered dating platform. Information We Collect * Personal information (name, email, birthdate, gender) * Profile information ( interests, preferences, photos) * Interactions and communications on the platform * Technical information (IP address, browser type, device type) How We Use Your Information * Provide and improve our services * Personalize matches and recommendations * Communicate with you about the platform and updates * Ensure safety and security Information Sharing * Third-party service providers (e.g., payment processors) * Partners for joint marketing initiatives * Law enforcement or legal requests Data Protection * Encryption of sensitive information * Secure servers and databases * Access controls and two-factor authentication User Rights * Access and update personal information * Request deletion of data * Object to certain processing activities Changes to This Privacy Policy We may update this Privacy Policy. We will notify you of significant changes and encourage you to review the revised policy. Contact Us For questions or concerns about this Privacy Policy, please contact admyrer135@gmail.com By using Admyrer, you consent to the terms of this Privacy Policy. We prioritize your privacy and strive to create a safe and respectful community.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<x-footer></x-footer>

@endsection