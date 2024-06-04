@extends("layouts.app")

@php
$notification = $data["notification"] ?? [];
$user = $data["user"] ?? [];
	$schedule = $data["schedule"] ?? [];
$lives = $data["lives"] ?? [];
	$dates = $data["dates"] ?? [];
@endphp

@section('title')
Live Users | Admyrer 
@endsection

@section("content")

<x-main-nav :schedule="$schedule" :dates="$dates" :notification="$notification" :user="$user"></x-main-nav>

{{-- main bar --}}
<div class="container container-fluid container_new page-margin find_matches_cont">

	<div class="row r_margin">

        {{-- sidiebar --}}
        <x-dashboard-sidebar :user="$user" :liveactive="true"></x-dashboard-sidebar>		

		<div class="col-sm-9">
			<!-- People i liked  -->
			<div class="container-fluid dt_ltst_users">
				<div class="dt_home_rand_user">
					<h6 class="bold mb-3"><?php echo __( 'Live Streaming Users' );?></h6>
					
					@if (count($lives) > 0)
						<div class="row" id="liked_users_container">
							@foreach ($lives as $key => $likeUser)				
								<div class="col-sm-3 m6 s12 matches visit likeUserrs" >
									<div class="card valign-wrapper" style="border: none !important">
										<div class="card-image">
											<a href={{"/@". $likeUser->username}}>
												<img src={{ $likeUser->avatar ?? "/img/icon.png"}} alt="">
											</a>
										</div>
										<div class="card-content">
											<a href={{"/@". $likeUser->username}} data-ajax="" class="text-capitalize"><span class="card-titl fw-bold">{{$likeUser->name}}</span></a>
											<p class="text-capitalize"><span class="time ajax-time age" title="">{{$likeUser->gender}}</span></p>
											<p class="text-capitalize">{{$likeUser->country}}</p>
											<div class="">
												<button onclick="joinStream(`{{$user->username}}`, null, null, null, null, true,)" class="btn bg-danger" data-ajax-post="/useractions/remove_like" data-ajax-params="userid=" data-ajax-callback="callback_liked_remove_like">
                                                Join Live
													{{-- <a href="javascript:void(0);" id="btn_delete_friend" data-ajax-post="/user/add_friend" data-ajax-params="to=" data-ajax-callback="callback_add_friend" class="red_bg tooltipped" data-position="bottom" data-tooltip="<?php echo __( 'UnFriend' );?>">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm7 6.586l2.121-2.122 1.415 1.415L20.414 19l2.122 2.121-1.415 1.415L19 20.414l-2.121 2.122-1.415-1.415L17.586 19l-2.122-2.121 1.415-1.415L19 17.586z"/></svg>
													</a> --}}
                                                </button>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					@endif

					@if (count($lives)  == 0)
						<x-dashboard-empty></x-dashboard-empty>  						
					@endif
				</div>
			</div>
			<!-- People i liked -->
		</div>
		<!-- End Search Users  -->

	</div>
</div>

<x-footer></x-footer>


@push("javascript")
<script>
</script>
    
@endpush

@endsection