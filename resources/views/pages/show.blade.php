@extends("layouts.app")

@php
	$user = $data["user"] ?? [];
	$loginUser = $data["loginUser"] ?? [];
	$check = $user->id == $loginUser->id ? true : false;
@endphp

@section('title')
Find Matches | Admyrer 
@endsection

@section("content")

<x-main-nav :user="$loginUser"></x-main-nav>
<p class="d-none " id="curr_ID">{{$user->id}}</p>

    <script>
        var meta = document.createElement('meta');
            meta.name = "robots";
            meta.content = "noindex";
            document.getElementsByTagName('head')[0].appendChild(meta);

        var meta1 = document.createElement('meta');
            meta1.name = "googlebot";
            meta1.content = "noindex";
            document.getElementsByTagName('head')[0].appendChild(meta1);
    </script>

<div class="container mt-5 container-fluid container_new find_matches_cont dt_user_profile_parent">
	<div class="row r_margin">
		
		<div class="col-sm-3 profile_menu">
			<div class="dt_left_sidebar dt_profile_side">
				<div class="avatar">
					<a class="inline" href="" id="avater_profile_img">
						<img src={{$user->avatar ?? "/img/icon.png"}} alt="" class="responsive-img" />
					</a>
							<div class="dt_chng_avtr">
								<span class="btn-upload-image" onclick="document.getElementById('admin_profileavatar_img').click(); return false">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,17H7V3H21M21,1H7A2,2 0 0,0 5,3V17A2,2 0 0,0 7,19H21A2,2 0 0,0 23,17V3A2,2 0 0,0 21,1M3,5H1V21A2,2 0 0,0 3,23H19V21H3M15.96,10.29L13.21,13.83L11.25,11.47L8.5,15H19.5L15.96,10.29Z" /></svg> <?php echo __( 'Change Photo' );?>
								</span>
								<input type="file" id="admin_profileavatar_img" data-username="" data-userid="" class="hide" accept="image/x-png, image/gif, image/jpeg" name="avatar">
							</div>
							<div class="dt_avatar_progress hide">
								<div class="admin_avatar_imgprogress progress">
									<div class="admin_avatar_imgdeterminate determinate" style="width: 0%"></div >
								</div>
							</div>
							<div class="admin_avatar_imgprogress progress hide">
								<div class="admin_avatar_imgdeterminate determinate" style="width: 0%"></div >
							</div>
				</div>
				<div class="dt_othr_ur_info">
					<h6 class="text-capitalize"> 
						{{$user->first_name}} {{$user->last_name}}
						{{-- <span tooltip="<?php echo __( 'This user is Not verified' );?>" flow="down">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#e18805" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M17,15.59L15.59,17L12,13.41L8.41,17L7,15.59L10.59,12L7,8.41L8.41,7L12,10.59L15.59,7L17,8.41L13.41,12L17,15.59Z" /></svg>
						</span> --}}
					</h6>
				</div>
					<div class="dt_usr_opts_mnu">
						<a onclick="Like()" href="javascript:void(0);" id="btn_add_friend" data-ajax-post="/user/add_friend" data-ajax-params="to=" data-ajax-callback="callback_add_friend" class="green_bg tooltipped" data-position="bottom" title="<?php echo __( 'Add Friend' );?>">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6 6v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z"/></svg>
							</a>
						{{-- <a href="javascript:void(0);" id="btn_delete_friend" data-ajax-post="/user/add_friend" data-ajax-params="to=" data-ajax-callback="callback_add_friend" class="red_bg tooltipped" data-position="bottom" data-tooltip="<?php echo __( 'UnFriend' );?>">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm7 6.586l2.121-2.122 1.415 1.415L20.414 19l2.122 2.121-1.415 1.415L19 20.414l-2.121 2.122-1.415-1.415L17.586 19l-2.122-2.121 1.415-1.415L19 17.586z"/></svg>
							</a>
						
							<a href="javascript:void(0);" class="green_bg tooltipped" data-position="bottom" data-tooltip="">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm5.793 8.914l3.535-3.535 1.415 1.414-4.95 4.95-3.536-3.536 1.415-1.414 2.12 2.121z"/></svg>
							</a> --}}
						<a data-bs-toggle="modal" data-bs-target="#chatConversations" href="javascript:void(0);" class="yellow_bg tooltipped" id="btn_open_private_conversation" data-ajax-post="/chat/open_private_conversation" data-ajax-params="from=<?php echo $user->id;?>&web_device_id=<?php echo $user->web_device_id;?>" data-ajax-callback="open_private_conversation" data-position="bottom" data-tooltip="<?php echo __( 'Message' );?>">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14 22.5L11.2 19H6a1 1 0 0 1-1-1V7.103a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1V18a1 1 0 0 1-1 1h-5.2L14 22.5zm1.839-5.5H21V8.103H7V17H12.161L14 19.298 15.839 17zM2 2h17v2H3v11H1V3a1 1 0 0 1 1-1z"/></svg>
						</a>
							
						<a href="javascript:void(0);" data-target="user_prof_dropdown" class="dropdown-trigger">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M12 3c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 14c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-7c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
						</a>
						<ul id="user_prof_dropdown" class="dropdown-content" tabindex="0">
								<li>
									<a href="javascript:void(0);" data-ajax-post="/useractions/" data-ajax-params="userid=" class="block_text">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,0A12,12 0 0,1 24,12A12,12 0 0,1 12,24A12,12 0 0,1 0,12A12,12 0 0,1 12,0M12,2A10,10 0 0,0 2,12C2,14.4 2.85,16.6 4.26,18.33L18.33,4.26C16.6,2.85 14.4,2 12,2M12,22A10,10 0 0,0 22,12C22,9.6 21.15,7.4 19.74,5.67L5.67,19.74C7.4,21.15 9.6,22 12,22Z" /></svg>&nbsp;&nbsp;&nbsp;
									</a>
								</li>
									<li>
										<a href="javascript:void(0);" data-ajax-post="/useractions/unreport" data-ajax-params="userid=<?php echo $user->id;?>&web_device_id=<?php echo $user->web_device_id;?>" data-ajax-callback="callback_unreport" class="report_text">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M13,9H18.5L13,3.5V9M10,14.59L7.88,12.46L6.46,13.88L8.59,16L6.46,18.12L7.88,19.54L10,17.41L12.12,19.54L13.54,18.12L11.41,16L13.54,13.88L12.12,12.46L10,14.59Z" /></svg>&nbsp;&nbsp;&nbsp;<?php echo __( 'Remove report' );?>
										</a>
									</li>
								<li>
									<a href="/settings/<?php echo $user->username;?>" data-ajax="/settings/<?php echo $user->username;?>" class="dt_edt_prof_link">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" /></svg>&nbsp;&nbsp;&nbsp;<?php echo __( 'Edit' );?>
									</a>
								</li>
						</ul>
					</div>
				{{-- <div class="home_usr_stats">
					<div>
						<div>
							<b>0</b>
							<p>0></p>
						</div>
						<div>
							<b>0</b>
							<p>0</p>
						</div>
						<div>
							<b>0</b>
							<p>0</p>
						</div>
					</div>
				</div> --}}
				
			</div>
		</div>
		
		<div class="col-sm-9">
			<div class="mtc_usrd_content dt_profile_about">
				<div class="row no_margin r_margin">
					<div class="col s12 m6">
						<div class="mtc_usrd_slider">
				            <figure class="dt_cover_photos">
								<div class="dt_cp_photos_list">
									<div class="dt_cp_l_photos">
										<div class="inline"></div>
									</div>
								</div>
							</figure>
						</div>
					</div>

					<div class="col s12 m6">
						<div class="mtc_usrd_sidebar dt_profile_about_side">
							<div class="mtc_usrd_summary">
								<h5 class="text-capitalize fs-5"><?php echo __( 'About' );?> {{$user->first_name}} {{$user->last_name}}</h5>
							</div>
							<div class="sidebar_usr_info dt_profile_about_info">
									{{-- <div class="desc text-capitalize">{{$user->about ?? "N/A"}}</div> --}}
								<div class="row">
										<div class="col s6">
											<div>
												<p class="info_title"><?php echo __( 'Location' );?></p>
												<span class="text-capitalize">{{$user->location ?? "N/A"}}</span>
											</div>
										</div>
						
										<div class="col s6">
											<div>
												<p class="info_title"><?php echo __( 'Country' );?></p>
												<span class="text-capitalize">{{$user->country ?? "N/A"}}</span>
											</div>
										</div>
								</div>
							</div>
								@if(false)
								<div class="center mtc_usrd_actions dt_profile_about_action">
									<div class="like">
										<a href="javascript:void(0);" id="like_btn" data-replace-text="<?php echo __('Liked');?>" data-replace-dom=".like_text" data-ajax-post="/useractions/" data-ajax-params="email_on_profile_like=<?php echo $user->email_on_profile_like;?>&username=<?php echo $user->username;?>" data-ajax-callback="callback_">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path></svg>
											<span class="bold like_text" ><?php  echo __( 'Liked' )?></span>
										</a>
									</div>
									<div class="dislike">
										<a href="javascript:void(0);" id="dislike_btn" data-replace-text="<?php echo __('Disliked');?>" data-replace-dom=".dislike_text" data-ajax-post="/useractions/" data-ajax-params="username=<?php echo $user->username;?>" data-ajax-callback="callback_">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
											<span class="bold dislike_text"><?php echo __( 'Disliked' )?></span>
										</a>
									</div>
								</div>
								@endif
						</div>
					</div>
				</div>
			</div>

            <!-- Right Main Area -->

                <div class="dt_user_about">                    
                    <div class="about_block"> <!-- Profile Info -->
                        <h4><?php echo __( 'Profile Info ' );?></h4>
						<div class="row">
							<?php if( true ) {?>
								<div class="col-sm-6 mb-3">
									<div class="dt_profile_info">
										<h5><svg xmlns="http://www.w3.org/2000/svg" width="66" height="17" viewBox="0 0 66 17"> <g id="Group_8834" data-name="Group 8834" transform="translate(-266.936 -201.15)"> <rect id="Rectangle_3373" data-name="Rectangle 3373" width="17" height="16" transform="translate(266.936 201.15)" fill="currentColor"></rect> <circle id="Ellipse_331" data-name="Ellipse 331" cx="8.5" cy="8.5" r="8.5" transform="translate(289.936 201.15)" fill="currentColor"></circle> <path id="Polygon_5" data-name="Polygon 5" d="M10,0,20,17H0Z" transform="translate(312.936 201.15)" fill="currentColor"></path> </g> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'Basic' );?></h5>
										
										<?php if( !empty( $user->gender ) ) {?>
											<div class="row">
												<div class="col s6">
													<p class="info_title text-capitalize"><?php echo __( 'Gender' );?></p>
												</div>
												<div class="col s6">
													<p class="text-capitalize"><?php echo __($user->gender);?></p>
												</div>
											</div>
										<?php } ?>
										<?php if( !empty( $user->language ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title "><?php echo __( 'Preferred Language' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo __($user->language);?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->relationship ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Relationship status' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->relationship;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->work_status ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Work status' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->work_status;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->education ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Education Level' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->education;?></p>
											</div>
										</div>
										<?php } ?>

									</div>
								</div>
							<?php } ?>
							
							<?php if( true ) {?>
								<div class="col-sm-6 mb-3">
									<div class="dt_profile_info">
										<h5><svg xmlns="http://www.w3.org/2000/svg" width="29.585" height="27.208" viewBox="0 0 29.585 27.208"> <g id="Group_8837" data-name="Group 8837" transform="translate(-580.386 -196.85)"> <circle id="Ellipse_332" data-name="Ellipse 332" cx="11" cy="11" r="11" transform="translate(584 201)" fill="currentColor" opacity="0.5"></circle> <path id="Path_215764" data-name="Path 215764" d="M580.386,224.058h8.733s-2.744-17.216,6.238-18.214a76.247,76.247,0,0,1,0-8.982s-11.214-.739-13.748,9.482C580.561,210.974,580.386,224.058,580.386,224.058Z" fill="currentColor"></path> <path id="Path_215765" data-name="Path 215765" d="M595.356,224.058h-8.733s2.744-17.216-6.238-18.214a76.247,76.247,0,0,0,0-8.982s11.214-.739,13.748,9.482C595.182,210.974,595.356,224.058,595.356,224.058Z" transform="translate(14.614)" fill="currentColor"></path> </g> </svg>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="26.014" height="27.384" viewBox="0 0 26.014 27.384"> <g id="Group_8836" data-name="Group 8836" transform="translate(-619.841 -196.85)"> <circle id="Ellipse_333" data-name="Ellipse 333" cx="11" cy="11" r="11" transform="translate(622 202.234)" fill="currentColor" opacity="0.5"></circle> <path id="Path_215766" data-name="Path 215766" d="M619.612,212s-5.182-15.272,11.324-17.384c1.919,7.869,1.919,9.213,1.919,9.213l-8.637,1.344-1.152,7.869Z" transform="translate(1 2.234)" fill="currentColor"></path> <path id="Path_215767" data-name="Path 215767" d="M632.084,212s5.182-15.272-11.324-17.384c-1.919,7.869-1.919,9.213-1.919,9.213l8.637,1.344,1.152,7.869Z" transform="translate(13 2.234)" fill="currentColor"></path> </g> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'Looks' );?></h5>

										<?php if( !empty( $user->ethnicity ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Ethnicity' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->ethnicity;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->body ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Body Type' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->body;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->height ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Height' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->height;?>cm</p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->hair_color ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Hair color' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->hair_color;?></p>
											</div>
										</div>
										<?php } ?>

									</div>
								</div>
							<?php } ?>
							
							<?php if( true ) {?>
								<div class="col-sm-6 mb-3">
									<div class="dt_profile_info">
										<h5><svg xmlns="http://www.w3.org/2000/svg" width="21.405" height="23.299" viewBox="0 0 21.405 23.299"> <path id="Path_5417" data-name="Path 5417" d="M3710.164,10486.625v1.147a19.122,19.122,0,0,1-2.192,8.952l-.264.574-2.008-1.147a17.086,17.086,0,0,0,2.157-7.8l.012-.574v-1.147Zm-6.886-3.443h2.3v5.051a14.6,14.6,0,0,1-3.1,8.608l-.264.344-1.779-1.378a12.646,12.646,0,0,0,2.835-7.574l.012-.46Zm1.147-4.591a5.5,5.5,0,0,1,4.063,1.722,5.654,5.654,0,0,1,1.676,4.018h-2.3a3.443,3.443,0,0,0-6.887,0v3.442a10.6,10.6,0,0,1-2.6,6.887l-.241.229-1.664-1.606a7.844,7.844,0,0,0,2.2-5.165l.011-.345v-3.442a5.654,5.654,0,0,1,1.676-4.018A5.5,5.5,0,0,1,3704.426,10478.591Zm0-4.591a10.2,10.2,0,0,1,7.3,2.983,10.421,10.421,0,0,1,3.03,7.347v3.442a23.806,23.806,0,0,1-.688,5.739l-.161.573-2.215-.573a20.538,20.538,0,0,0,.758-5.051l.011-.688v-3.442a8.125,8.125,0,0,0-1.194-4.247,8.334,8.334,0,0,0-3.236-2.983,9.28,9.28,0,0,0-4.315-.8,7.686,7.686,0,0,0-4.1,1.606l-1.641-1.606A10.216,10.216,0,0,1,3704.426,10474Zm-8.068,3.9,1.629,1.606a8.222,8.222,0,0,0-1.6,4.591v2.525a8.235,8.235,0,0,1-.872,3.673l-.172.345-2-1.148a5.921,5.921,0,0,0,.746-2.524v-2.64A10.347,10.347,0,0,1,3696.357,10477.9Z" transform="translate(-3693.35 -10474)" fill="currentColor"></path> </svg>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="21.149" height="21.001" viewBox="0 0 21.149 21.001"> <path id="Path_4935" data-name="Path 4935" d="M3416.05,1822.683h5.824a19.048,19.048,0,0,0,3.1,9.438,10.65,10.65,0,0,1-8.927-9.438Zm0-2.125a10.65,10.65,0,0,1,8.927-9.438,19.048,19.048,0,0,0-3.1,9.438Zm21.149,0h-5.824a19.043,19.043,0,0,0-3.1-9.438,10.65,10.65,0,0,1,8.927,9.438Zm0,2.125a10.65,10.65,0,0,1-8.927,9.438,19.043,19.043,0,0,0,3.1-9.438Zm-13.2,0h5.25a4.46,4.46,0,1,1-5.25,0Zm0-2.125a4.46,4.46,0,1,1,5.25,0Z" transform="translate(-3416.05 -1811.12)" fill="currentColor"></path> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'Personality' );?></h5>

										<?php if( !empty( $user->character ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Character' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->character_txt;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->children ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Children' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->children;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->friends ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Friends' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->friends;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->pets ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Pets' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->pets;?></p>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							
							<?php if( true ) {?>
								<div class="col-sm-6 mb-3">
									<div class="dt_profile_info">
										<h5><svg xmlns="http://www.w3.org/2000/svg" width="56.643" height="29.066" viewBox="0 0 56.643 29.066"> <g id="Group_8840" data-name="Group 8840" transform="translate(-1169.067 -190.435)"> <path id="Union_8" data-name="Union 8" d="M6381.07,24H6356l.008-.006a42.8,42.8,0,0,1,11.924-4.657V11.5h2v3h0V18.9a48.431,48.431,0,0,1,9.18-.886c.651,0,1.312.013,1.961.04V24Zm-19.049-13.372A4.345,4.345,0,0,0,6358.962,12h-.032V11a10.008,10.008,0,0,1,9-9.95V1a1.033,1.033,0,0,1,.29-.709,1.015,1.015,0,0,1,1.42,0,1.037,1.037,0,0,1,.288.709v.051a10.009,10.009,0,0,1,9,9.95v.946a5.576,5.576,0,0,0-3.417-1.228,4.639,4.639,0,0,0-3.1,1.132,4.86,4.86,0,0,0-7.062.149A5.3,5.3,0,0,0,6362.021,10.629Z" transform="translate(-5185.932 195.5)" fill="currentColor"></path> <path id="Path_215769" data-name="Path 215769" d="M1170.067,188.435V194.9s6.116-.961,7.165-6.465Z" transform="translate(-1 2)" fill="currentColor"></path> <path id="Path_6517" data-name="Path 6517" d="M3645.71,6525.79A3.364,3.364,0,0,0,3648,6527a3.237,3.237,0,0,0,1.24-.28l.39-.15a5.7,5.7,0,0,1,2.37-.57,5.157,5.157,0,0,1,3.49,1.58l.22.21-1.42,1.42A3.364,3.364,0,0,0,3652,6528a3.237,3.237,0,0,0-1.24.28l-.39.15a5.7,5.7,0,0,1-2.37.57,5.157,5.157,0,0,1-3.49-1.58l-.22-.21ZM3642,6511a3,3,0,0,0,6,0h6a.99.99,0,0,1,1,1v7a.99.99,0,0,1-1,1h-4v-2h3v-5h-3.42l-.01.04a4.978,4.978,0,0,1-4.35,2.95l-.22.01a5.027,5.027,0,0,1-2.72-.8,5.106,5.106,0,0,1-1.85-2.16l-.01-.04H3637v5h3v9h3v2h-4a.99.99,0,0,1-1-1v-8h-2a.99.99,0,0,1-1-1v-7a.99.99,0,0,1,1-1Zm3.71,10.79A3.364,3.364,0,0,0,3648,6523a3.237,3.237,0,0,0,1.24-.28l.39-.15a5.7,5.7,0,0,1,2.37-.57,5.157,5.157,0,0,1,3.49,1.58l.22.21-1.42,1.42A3.364,3.364,0,0,0,3652,6524a3.237,3.237,0,0,0-1.24.28l-.39.15a5.7,5.7,0,0,1-2.37.57,5.157,5.157,0,0,1-3.49-1.58l-.22-.21Z" transform="translate(-2430 -6312.15)" fill="currentColor"></path> </g> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'Lifestyle' );?></h5>

										<?php if( !empty( $user->live_with ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'I live with' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->live_with;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->car ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Car' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->car;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->religion ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Religion' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->religion;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->smoke ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Smoke' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->smoke;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->drink ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Drink' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->drink;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->travel ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Travel' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->travel;?></p>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							
							<?php if( true ) {?>
								<div class="col-sm-6 mb-3">
									<div class="dt_profile_info">
										<h5><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path fill="currentColor" d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228z"/></svg>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h3.482a1 1 0 0 0 .817-.423L11.752.85a.5.5 0 0 1 .632-.159l1.814.907a2.5 2.5 0 0 1 1.305 2.853L14.6 8zM7 10.588V19h11.16L21 12.104V10h-6.4a2 2 0 0 1-1.938-2.493l.903-3.548a.5.5 0 0 0-.261-.571l-.661-.33-4.71 6.672c-.25.354-.57.644-.933.858zM5 11H3v8h2v-8z"/></svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __( 'Favourites' );?></h5>

										<?php if( !empty( $user->music ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Music Genre' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->music;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->dish ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Dish' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->dish;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->song ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Song' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->song;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->hobby ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Hobby' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->hobby;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->city ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'City' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->city;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->sport ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Sport' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->sport;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->book ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Book' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->book;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->movie ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Movie' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->movie;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->colour ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'Color' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->colour;?></p>
											</div>
										</div>
										<?php } ?>
										<?php if( !empty( $user->tv ) ) {?>
										<div class="row">
											<div class="col s6">
												<p class="info_title"><?php echo __( 'TV Show' );?></p>
											</div>
											<div class="col s6">
												<p class="text-capitalize"><?php echo $user->tv;?></p>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							
							<div class="col-sm-6">
							</div>
						</div>
                    </div>
                </div>
            <!-- End Right Main Area -->

		</div>
		
	</div>
</div>
<!-- End Profile  -->


{{-- modal --}}
  
  <!-- The Modal -->
  <div class="modal fade" id="chatConversations">
	<div class="modal-dialog modal-dialog-centered modal-l">
	  <div class="modal-content p-0">
  
		<!-- Modal Header -->
		<div class="modal-header">
		  <h6 class="modal-title text-capitalize">Chat with {{$user->first_name}}</h6>
		  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		</div>
  
		<!-- Modal body -->
		<div class="modal-body">
			<div class="chat_container msg-container">
				<div class="wrap1 unique d-none">
					<div class="">
						<p class='mb-0 msgIcon mx-3'><img width="30px" height="30px" src='{{$user->avatar ?? "/img/icon.png"}}' alt=""/></p>
						<div class="msgBodys mt-0">
							<p class='mb-0 p-2'>Hi {{$user->first_name}}, What question do you have today ?</p>
						</div>
					</div>
				</div>
		
				<div class="wrap2 unique mt -2 d-none">
					<p class='mb-0 msgIcon mx-3 text-end mb-0'>
					<img src='{{$loginUser->avatar ?? "/img/icon.png"}}' alt="" class='sender_img' />
					</p>
					<div class="sentMsg mt-0">
						<div class="myMsg">
							<p class="mb-0 p-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. In sapiente impedit eveniet harum ea, rerum amet eaque! Iure, alias! Laboriosam perspiciatis porro non suscipit iusto provident voluptatibus quidem excepturi optio.</p>
						</div>
					</div>
				</div>		
			</div>
		</div>
  
		<!-- Modal footer -->
		<div class="modal-foote">
			<div class="send d-flex">
				<textarea class="message" name="" placeholder="Type message......" id=""></textarea>
				<button onclick="sendMsg()" class="px-2">Send Message</button>
			</div>
		</div>
  
	  </div>
	</div>
  </div>




<x-footer></x-footer>

@push("javascript")

<script>

	var message = document.querySelector(".message")
    var sender_img = document.querySelector(".sender_img")

	const sendMsg = () => {
        if(message.value != ""){
          $(".msg-container").append(`
          <div class="wrap2 unique mt -2">
          <p class='mb-0 msgIcon mx-3 text-end mb-0'>
          <img src='${sender_img.src ?? "/img/icon.png"}' alt="" className='' width=${20} />
          </p>
          <div class="sentMsg mt-0">
              <div class="myMsg">
                  <p class="mb-0 p-2">${message.value}</p>
              </div>
            </div>
          </div>`)
          $(".modal-body").scrollTop($(".modal-body").height()*100);
          message.value = ""
        }else{
            alert("Please type a message")
        }
    }

	var curr_ID = document.getElementById("curr_ID");

	function Like(){
		console.log(curr_ID)

		axios.post("/post-follows", {
			followsID: curr_ID.innerHTML,
		})
		.then(res => console.log(res))
		.catch(error => console.log(error))
	}
</script>
	
@endpush

@section("content")