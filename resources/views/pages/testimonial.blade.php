@extends("layouts.app")

@php
    $notification = $data["notification"] ?? [];
	$user = $data["user"] ?? [];
	$dates = $data["dates"] ?? [];
	$schedule = $data["schedule"] ?? [];
	$follows = $data["follows"] ?? [];
	$testy = $data["testy"] ?? [];
@endphp

@section('title')
Testimonials | Admyrer 
@endsection

@section("content")
<x-main-nav :schedule="$schedule" :dates="$dates" :notification="$notification" :user="$user"></x-main-nav>
<p class="d-none " id="curr_ID">{{$user->username}}</p>

{{-- main bar --}}
<div class="container container-fluid container_new page-margin find_matches_cont">

	<div class="row r_margin">

        {{-- sidiebar --}}
        <x-dashboard-sidebar :user="$user" :testyactive="true"></x-dashboard-sidebar>		

		<div class="col-sm-9">
			<!-- People i liked  -->
			<div class="container-fluid dt_ltst_users">
				<div class="dt_home_rand_user">
					<h6 class="bold mb-4"><?php echo __( "Your Testimonials" );?></h6>
                    <p data-bs-toggle="modal" data-bs-target="#__web__" id="_sendReq" class="bg-success _sendReq d-none px-2 py-1 text-white rounded" style="width: fit-content; font-size:12px">Start Web Date With Selected Users</p>
					<div class="row">
                        <div class="testy col-sm-5 bg-dark">
                            <form action="/createTestimonial" method="post">
                                @csrf
                                @if (count($testy) > 0)
                                    <h6 class="text-center mb-3 text-white fw-bold">Edit Your Testimony</h6> 
                                    <p class="text-center" style="color: lightgray">Let us know what you feel about our website to serve you better.</p>
                                    <input type="hidden" name="avatar" value="{{$user->avatar}}">
                                    <input value="{{$testy[0]->name}}" required name="name" type="text" placeholder="Enter your name" class="mb-3">
                                    <textarea required name="comment" style="border: 1px solid rgb(224, 224, 224)" name="" placeholder="Type here..." id="">{{$testy[0]->comment}}</textarea>
                                    <button class="btn mt-3">Save Edit</button>
                                @else
                                    <h6 class="text-center mb-3 text-white fw-bold">Add a Testimony</h6>
                                    <p class="text-center text-white" style="color: lightgray">Let us know what you feel about our website to serve you better.</p>
                                    <input type="hidden" name="avatar" value="{{$user->avatar}}">
                                    <input required name="name" type="text" placeholder="Enter your name" class="mb-3">
                                    <textarea required name="comment" style="border: 1px solid rgb(224, 224, 224)" name="" placeholder="Type here..." id=""></textarea>
                                    <button class="btn mt-3">Submit Request</button>
                                @endif
                            </form>
                        </div>

                        @foreach ($testy as $item)
                            <div class="col-sm-5 _testies">
                                <p style="font-size: 12px">My Testimony</p>
                                <h5 class="mb-3 fw-semibold text-capitalize">{{$item->name}}</h5>
                                <p class="text-capitalize" style="color: rgb(98, 98, 98)">{{$item->comment}}</p>
                            </div>
                        @endforeach
                    </div>
					{{-- <x-dashboard-empty></x-dashboard-empty>  --}}
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