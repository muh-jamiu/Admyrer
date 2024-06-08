@extends("layouts.app")

@php
    $notification = $data["notification"] ?? [];
	$user = $data["user"] ?? [];
	$dates = $data["dates"] ?? [];
	$schedule = $data["schedule"] ?? [];
	$follows = $data["follows"] ?? [];
@endphp

@section('title')
Web Date | Admyrer 
@endsection

@section("content")
<x-main-nav :schedule="$schedule" :dates="$dates" :notification="$notification" :user="$user"></x-main-nav>
<p class="d-none " id="curr_ID">{{$user->username}}</p>

{{-- main bar --}}
<div class="container container-fluid container_new page-margin find_matches_cont">

	<div class="row r_margin">

        {{-- sidiebar --}}
        <x-dashboard-sidebar :user="$user" :webactive="true"></x-dashboard-sidebar>		

		<div class="col-sm-9">
			<!-- People i liked  -->
			<div class="container-fluid dt_ltst_users">
				<div class="dt_home_rand_user">
					<h6 class="bold mb-4"><?php echo __( "Select one or more users you'll like to go on a date with." );?></h6>
                    <p data-bs-toggle="modal" data-bs-target="#__web__" id="_sendReq" class="bg-success _sendReq d-none px-2 py-1 text-white rounded" style="width: fit-content; font-size:12px">Start Web Date With Selected Users</p>
					
					@if (count($follows) > 0)
						<div class="row" id="liked_users_container">
							@foreach ($follows as $key => $likeUser)	
							@if ($likeUser->id != $user->id)				
								<div class="col-sm-3 m6 s12 matches visit likeUserrs" >
									<div class="card valign-wrapper" style="border: none !important">
										<div class="card-image">
											<a href={{"/@" . $likeUser->username}}>
												<img src={{$likeUser->avatar ?? "/img/icon.png"}} alt="">
											</a>
										</div>
										<div class="card-content">
											<a href={{"/@" . $likeUser->username}} data-ajax="" class="text-capitalize"><span class="card-titl fw-bold">{{$likeUser->first_name}} {{$likeUser->last_name}}</span></a>
											<p class="text-capitalize"><span class="time ajax-time age" title="">{{$likeUser->gender}}</span></p>
											<p class="text-capitalize">{{$likeUser->country}}</p>
                                            <input type="hidden" class="__username" name="" value="{{$likeUser->username}}">
											<div class="rand_bottom_bar">
												<button id="like_btn" class="btn waves-effect bg-danger like liked" data-ajax-post="/useractions/remove_like" data-ajax-params="userid=" data-ajax-callback="callback_liked_remove_like">
													<a href="javascript:void(0);" id="btn_delete_friend" data-ajax-post="/user/add_friend" data-ajax-params="to=" data-ajax-callback="callback_add_friend" class="red_bg tooltipped btn_delete_friend" data-position="bottom" data-tooltip="<?php echo __( 'UnFriend' );?>">
                                                        <i class="fa-solid fa-plus __icon text-white"></i>
													</a></button>
											</div>
										</div>
									</div>
								</div>
							@endif
							@endforeach
						</div>
					@endif

					@if (count($follows) == 0)
						<x-dashboard-empty></x-dashboard-empty>  						
					@endif
				</div>
			</div>
			<!-- People i liked -->
		</div>
		<!-- End Search Users  -->

	</div>
</div>

<div class="modal fade" id="__web__">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content p-0">
    
        <!-- Modal Header -->
        <div class="modal-header">
            <h6 class="modal-title text-capitalize">Start Web Date</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
    
        <!-- Modal body -->
        <div class="modal-body">
            <p style="font-size: 10px" class="text-danger">These are the list of users that will recieve notification and get to join your web date.</p>
            <div id="listin_" class="listin_"></div>
    
            <button onclick="sendReq()" data-bs-dismiss="modal" class="btn btn-danger mt-2 mb-3">Start</button>
            <p style="font-size: 10px">Users you sent request will be able to join your web date.</p>
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

	var curr_ID = document.getElementById("curr_ID");
	var _sendReq = document.querySelector("._sendReq")
	var liked = document.querySelectorAll(".liked")
	var rand_bottom_bar = document.querySelectorAll(".rand_bottom_bar")
	var __icon = document.querySelectorAll(".__icon")
	var __username = document.querySelectorAll(".__username")

    let userList = []
    rand_bottom_bar.forEach((element, index) => {
        element.addEventListener("click", () => {
            pushUser(__username[index].value)
            if(__icon[index].classList.contains("fa-plus")){
                __icon[index].classList.remove("fa-plus")
                __icon[index].classList.add("fa-minus")
                liked[index].classList.remove("bg-danger")
                liked[index].classList.add("bg-success")
            }else{
                remove(__username[index].value)
                __icon[index].classList.add("fa-plus")
                __icon[index].classList.remove("fa-minus")
                liked[index].classList.add("bg-danger")
                liked[index].classList.remove("bg-success")
            }
            
            if(userList.length > 0){
                _sendReq.classList.remove("d-none")
            }else{
                _sendReq.classList.add("d-none")
            }
            listin_.innerHTML = ""
            appendHtml()
        })
    });

    function pushUser(user) {
        if(!userList.includes(user)){
            userList.push(user)
        }
    }

    function remove(user){
        const index = userList.indexOf(user)
        if(index != -1){
            userList.splice(index, 1)
        }
    }

    function sendReq(params) {
        joinStream()
        axios.post("/web-date", {
            username: curr_ID.innerHTML
        })
        .then(res => {
            console.log(res)
        })
        .catch(error => {
            console.log(error)
        })
    }

    var listin_ = document.getElementById("listin_");
	function appendHtml() {
        userList.forEach((item, index) => {
            const listItem = document.createElement('p');
            listItem.textContent = index + 1 + ":) " + item;
            listin_.appendChild(listItem);
        });
    }

    

    $(document).ready(function(){
        $('#my_country').on('change',() => {
            $('.located_at').html(`&nbsp;&nbsp;<?php echo __('located_at');?> <span id="located">${$("#my_country option:selected" ).text()}</span>`);
        });
        $( document ).on( 'change', '#_located', function(e){
            var valueSelected = this.value;
            $('.located_at').html(`&nbsp;&nbsp;<?php echo __('located within');?> <span id="located">${valueSelected}</span>`);
        });
        setTimeout(function () {
            $('.btn-find-matches-search').removeAttr('disabled');
        },1000);
    
        $( document ).on( 'change', '#is_my_location', function(e){
            if( $('#is_my_location').prop('checked') === false) {
                $("#my_country").val('all');
                $('.located_at').html(`&nbsp;&nbsp;<?php echo __('located_at');?> <span id="located">${$("#my_country option:selected" ).text()}</span>`);
    
                $('#_located').prop("disabled", true);
                $('#_located').val( window.located );
    
    
                $('#my_country').removeAttr( 'disabled' );
                $('#my_country').prop("disabled", false);
                $('#my_country').formSelect();
                //$.get( window.ajax + 'profile/set_data', {'show_me_to': $('#my_country').attr('data-country')} );
            }else{
                var valueSelected = $('#_located').val();
                $('.located_at').html(`&nbsp;&nbsp;<?php echo __('located within');?> <span id="located">${valueSelected}</span>`);
    
                $('#_located').removeAttr( 'disabled' );
                $('#_located').val( window.located );
    
                $('#my_country').attr( 'disabled', 'disabled' );
                $('#my_country').prop("disabled", true);
                $('#my_country').find('option[value="'+$('#my_country').attr('data-country')+'"]').prop('selected', true);
                $('#my_country').formSelect();
                //$.get( window.ajax + 'profile/set_data', {'show_me_to': ''} );
            }
            e.preventDefault();
        });
    });
    
    function resetSearchData() {
        $.get(window.ajax + 'profile/resetSearch', function (data) {
            if (data.status == 200) {
                window.location.reload();
            }
        });
    }
    function Wo_ViewAnnouncement(id) {
        var announcement_container = $('.home-announcement');
            $.get(window.ajax + 'useractions/UpdateAnnouncementViews', {id:id}, function (data) {
                if (data.status == 200) {
                    announcement_container.slideUp(200, function () {
                        $(this).remove();
                    });
                }
            });
    }
    </script>
    
@endpush

@endsection