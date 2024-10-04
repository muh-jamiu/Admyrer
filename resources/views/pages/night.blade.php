@extends("layouts.app")

@php
$notification = $data["notification"] ?? [];
$user = $data["user"] ?? [];
	$schedule = $data["schedule"] ?? [];
$lives = $data["clubs"] ?? [];
	$dates = $data["dates"] ?? [];
@endphp

@section('title')
Night Clubs | Admyrer 
@endsection

@section("content")

<x-main-nav :schedule="$schedule" :dates="$dates" :notification="$notification" :user="$user"></x-main-nav>

{{-- main bar --}}
<div class="container container-fluid container_new page-margin find_matches_cont">

	<div class="row r_margin">

        {{-- sidiebar --}}
        <x-dashboard-sidebar :user="$user" :nightactive="true"></x-dashboard-sidebar>		

		<div class="col-sm-9">
			<!-- People i liked  -->
			<div class="container-fluid dt_ltst_users">
				<div class="dt_home_rand_user">
					<h6 class="bold mb-3"><?php echo __( 'Night Clubs' );?></h6>
					
					@if (count($lives) > 0)
						<div class="row" id="liked_users_container">
							@foreach ($lives as $key => $likeUser)				
								<div class="col-sm-3 m6 s12 matches visit likeUserrs" >
									<div class="card valign-wrapper" style="border: none !important">
										<div class="card-image">
											<a href={{"/@". $likeUser->username}}>
												<img src={{"/img/icon.png"}} alt="">
											</a>
										</div>
										<div class="card-content">
											<a href={{"/@". $likeUser->username}}data-ajax="" class="text-capitalize"><span class="card-titl fw-bold">{{$likeUser->username}}</span></a>
                                            <p class="mb-1">{{$likeUser->name}}</p>
											<div class="mb-3 mt-2">
												@if (!$likeUser->password)
													<button onclick="joinStream(null, null, null, null, null, null, true)" class="btn bg-danger" data-ajax-post="/useractions/remove_like" data-ajax-params="userid=" data-ajax-callback="callback_liked_remove_like">
														Join Club
													</button>
												@endif
												@if ($likeUser->password)
													<button onclick="getPass(`{{$likeUser->password}}`)" data-bs-toggle="modal" data-bs-target="#_passClub_" class="btn bg-danger" data-ajax-post="/useractions/remove_like" data-ajax-params="userid=" data-ajax-callback="callback_liked_remove_like">
														Private Club
													</button>
													<input type="hidden" id="realPass" class="realPass" name="" value="{{$likeUser->password}}">
												
												@endif
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

<div class="modal fade" id="_passClub_">
	<div class="modal-dialog modal-dialog-centered modal-l">
		<div class="modal-content p-0">
	
		<!-- Modal Header -->
		<div class="modal-header">
			<h6 class="modal-title text-capitalize">Provide Club Password</h6>
			<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		</div>
	
		<!-- Modal body -->
		<div class="modal-body">	
			<label for="">Password</label>
			<input id="_Enterpass" type="text" placeholder="Enter Password" class="px-2" style="width: 94% !important">
			<p style="font-size: 10px" class="text-danger">You must provide club password before you can join this club.</p>
	
			<button onclick="checkPass()" data-bs-dismiss="modal" class="btn btn-danger mt-2 mb-3">Join Club</button>
		</div>
	
		<!-- Modal footer -->
		<div class="modal-foote">
		</div>
	
		</div>
	</div>
</div>

<x-footer></x-footer>


@push("javascript")
<script>
	let realPass;
	var _Enterpass = document.getElementById("_Enterpass")
	function checkPass(params) {
		if(realPass == _Enterpass.value){
			Swal.fire({
				position: "top-end",
				icon: "success",
				title:`Password Check Successful`,
				showConfirmButton: false,
				timer: 1500
			});
			joinStream(null, null, null, null, null, null, true)
			_Enterpass.value = ""
		}else{
			Swal.fire({
				position: "top-end",
				icon: "error",
				title:`Invalid club password`,
				showConfirmButton: false,
				timer: 1500
			});
			_Enterpass.value = ""
		}
	}

	function getPass(params) {
		realPass = params
	}

</script>
    
@endpush

@endsection