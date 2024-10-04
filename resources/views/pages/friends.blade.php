@extends("layouts.app")

@php
	$user = $data["user"] ?? [];
	$follows = $data["follows"] ?? [];
@endphp

@section('title')
Friends | Admyrer 
@endsection

@section("content")
<x-main-nav :user="$user"></x-main-nav>
<p class="d-none " id="curr_ID">{{$user->id}}</p>


<ul class="collapsible dt_new_home_filter" id="home_filters">
	<div class="container">
		<div class="dt_home_filters_head">
			<p></p>
			<button id="home_filters_close" class="btn main_fltr_close">
				<?php echo __('Close');?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
			</button>
		</div>
		<div class="filter_tabs_parent row">
			<ul class="tabs filter_tabs">
				<li class="tab">
					<a class="active" href="#basic">
						<svg xmlns="http://www.w3.org/2000/svg" width="66" height="17" viewBox="0 0 66 17"> <g id="Group_8834" data-name="Group 8834" transform="translate(-266.936 -201.15)"> <rect id="Rectangle_3373" data-name="Rectangle 3373" width="17" height="16" transform="translate(266.936 201.15)" fill="currentColor"/> <circle id="Ellipse_331" data-name="Ellipse 331" cx="8.5" cy="8.5" r="8.5" transform="translate(289.936 201.15)" fill="currentColor"/> <path id="Polygon_5" data-name="Polygon 5" d="M10,0,20,17H0Z" transform="translate(312.936 201.15)" fill="currentColor"/> </g> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __('Basic');?>
					</a>
				</li>
				<li class="tab">
					<a href="#looks">
						<svg xmlns="http://www.w3.org/2000/svg" width="29.585" height="27.208" viewBox="0 0 29.585 27.208"> <g id="Group_8837" data-name="Group 8837" transform="translate(-580.386 -196.85)"> <circle id="Ellipse_332" data-name="Ellipse 332" cx="11" cy="11" r="11" transform="translate(584 201)" fill="currentColor" opacity="0.5"/> <path id="Path_215764" data-name="Path 215764" d="M580.386,224.058h8.733s-2.744-17.216,6.238-18.214a76.247,76.247,0,0,1,0-8.982s-11.214-.739-13.748,9.482C580.561,210.974,580.386,224.058,580.386,224.058Z" fill="currentColor"/> <path id="Path_215765" data-name="Path 215765" d="M595.356,224.058h-8.733s2.744-17.216-6.238-18.214a76.247,76.247,0,0,0,0-8.982s11.214-.739,13.748,9.482C595.182,210.974,595.356,224.058,595.356,224.058Z" transform="translate(14.614)" fill="currentColor"/> </g> </svg>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="26.014" height="27.384" viewBox="0 0 26.014 27.384"> <g id="Group_8836" data-name="Group 8836" transform="translate(-619.841 -196.85)"> <circle id="Ellipse_333" data-name="Ellipse 333" cx="11" cy="11" r="11" transform="translate(622 202.234)" fill="currentColor" opacity="0.5"/> <path id="Path_215766" data-name="Path 215766" d="M619.612,212s-5.182-15.272,11.324-17.384c1.919,7.869,1.919,9.213,1.919,9.213l-8.637,1.344-1.152,7.869Z" transform="translate(1 2.234)" fill="currentColor"/> <path id="Path_215767" data-name="Path 215767" d="M632.084,212s5.182-15.272-11.324-17.384c-1.919,7.869-1.919,9.213-1.919,9.213l8.637,1.344,1.152,7.869Z" transform="translate(13 2.234)" fill="currentColor"/> </g> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __('Looks');?>
					</a>
				</li>
				<li class="tab">
					<a href="#background">
						<svg xmlns="http://www.w3.org/2000/svg" width="21.405" height="23.299" viewBox="0 0 21.405 23.299"> <path id="Path_5417" data-name="Path 5417" d="M3710.164,10486.625v1.147a19.122,19.122,0,0,1-2.192,8.952l-.264.574-2.008-1.147a17.086,17.086,0,0,0,2.157-7.8l.012-.574v-1.147Zm-6.886-3.443h2.3v5.051a14.6,14.6,0,0,1-3.1,8.608l-.264.344-1.779-1.378a12.646,12.646,0,0,0,2.835-7.574l.012-.46Zm1.147-4.591a5.5,5.5,0,0,1,4.063,1.722,5.654,5.654,0,0,1,1.676,4.018h-2.3a3.443,3.443,0,0,0-6.887,0v3.442a10.6,10.6,0,0,1-2.6,6.887l-.241.229-1.664-1.606a7.844,7.844,0,0,0,2.2-5.165l.011-.345v-3.442a5.654,5.654,0,0,1,1.676-4.018A5.5,5.5,0,0,1,3704.426,10478.591Zm0-4.591a10.2,10.2,0,0,1,7.3,2.983,10.421,10.421,0,0,1,3.03,7.347v3.442a23.806,23.806,0,0,1-.688,5.739l-.161.573-2.215-.573a20.538,20.538,0,0,0,.758-5.051l.011-.688v-3.442a8.125,8.125,0,0,0-1.194-4.247,8.334,8.334,0,0,0-3.236-2.983,9.28,9.28,0,0,0-4.315-.8,7.686,7.686,0,0,0-4.1,1.606l-1.641-1.606A10.216,10.216,0,0,1,3704.426,10474Zm-8.068,3.9,1.629,1.606a8.222,8.222,0,0,0-1.6,4.591v2.525a8.235,8.235,0,0,1-.872,3.673l-.172.345-2-1.148a5.921,5.921,0,0,0,.746-2.524v-2.64A10.347,10.347,0,0,1,3696.357,10477.9Z" transform="translate(-3693.35 -10474)" fill="currentColor"/> </svg>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="21.149" height="21.001" viewBox="0 0 21.149 21.001"> <path id="Path_4935" data-name="Path 4935" d="M3416.05,1822.683h5.824a19.048,19.048,0,0,0,3.1,9.438,10.65,10.65,0,0,1-8.927-9.438Zm0-2.125a10.65,10.65,0,0,1,8.927-9.438,19.048,19.048,0,0,0-3.1,9.438Zm21.149,0h-5.824a19.043,19.043,0,0,0-3.1-9.438,10.65,10.65,0,0,1,8.927,9.438Zm0,2.125a10.65,10.65,0,0,1-8.927,9.438,19.043,19.043,0,0,0,3.1-9.438Zm-13.2,0h5.25a4.46,4.46,0,1,1-5.25,0Zm0-2.125a4.46,4.46,0,1,1,5.25,0Z" transform="translate(-3416.05 -1811.12)" fill="currentColor"/> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __('Background');?>
					</a>
				</li>
				<li class="tab">
					<a href="#lifestyle">
						<svg xmlns="http://www.w3.org/2000/svg" width="56.643" height="29.066" viewBox="0 0 56.643 29.066"> <g id="Group_8840" data-name="Group 8840" transform="translate(-1169.067 -190.435)"> <path id="Union_8" data-name="Union 8" d="M6381.07,24H6356l.008-.006a42.8,42.8,0,0,1,11.924-4.657V11.5h2v3h0V18.9a48.431,48.431,0,0,1,9.18-.886c.651,0,1.312.013,1.961.04V24Zm-19.049-13.372A4.345,4.345,0,0,0,6358.962,12h-.032V11a10.008,10.008,0,0,1,9-9.95V1a1.033,1.033,0,0,1,.29-.709,1.015,1.015,0,0,1,1.42,0,1.037,1.037,0,0,1,.288.709v.051a10.009,10.009,0,0,1,9,9.95v.946a5.576,5.576,0,0,0-3.417-1.228,4.639,4.639,0,0,0-3.1,1.132,4.86,4.86,0,0,0-7.062.149A5.3,5.3,0,0,0,6362.021,10.629Z" transform="translate(-5185.932 195.5)" fill="currentColor"/> <path id="Path_215769" data-name="Path 215769" d="M1170.067,188.435V194.9s6.116-.961,7.165-6.465Z" transform="translate(-1 2)" fill="currentColor"/> <path id="Path_6517" data-name="Path 6517" d="M3645.71,6525.79A3.364,3.364,0,0,0,3648,6527a3.237,3.237,0,0,0,1.24-.28l.39-.15a5.7,5.7,0,0,1,2.37-.57,5.157,5.157,0,0,1,3.49,1.58l.22.21-1.42,1.42A3.364,3.364,0,0,0,3652,6528a3.237,3.237,0,0,0-1.24.28l-.39.15a5.7,5.7,0,0,1-2.37.57,5.157,5.157,0,0,1-3.49-1.58l-.22-.21ZM3642,6511a3,3,0,0,0,6,0h6a.99.99,0,0,1,1,1v7a.99.99,0,0,1-1,1h-4v-2h3v-5h-3.42l-.01.04a4.978,4.978,0,0,1-4.35,2.95l-.22.01a5.027,5.027,0,0,1-2.72-.8,5.106,5.106,0,0,1-1.85-2.16l-.01-.04H3637v5h3v9h3v2h-4a.99.99,0,0,1-1-1v-8h-2a.99.99,0,0,1-1-1v-7a.99.99,0,0,1,1-1Zm3.71,10.79A3.364,3.364,0,0,0,3648,6523a3.237,3.237,0,0,0,1.24-.28l.39-.15a5.7,5.7,0,0,1,2.37-.57,5.157,5.157,0,0,1,3.49,1.58l.22.21-1.42,1.42A3.364,3.364,0,0,0,3652,6524a3.237,3.237,0,0,0-1.24.28l-.39.15a5.7,5.7,0,0,1-2.37.57,5.157,5.157,0,0,1-3.49-1.58l-.22-.21Z" transform="translate(-2430 -6312.15)" fill="currentColor"/> </g> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __('Lifestyle');?>
					</a>
				</li>
				<li class="tab">
					<a href="#tab_more">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"> <path id="Path_215771" data-name="Path 215771" d="M3253,6250a10,10,0,1,1,10-10A10,10,0,0,1,3253,6250Zm2-12v4h2v-4Zm-6,0v4h2v-4Z" transform="translate(-3243 -6230)" fill="currentColor"/> </svg>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"> <path id="Path_215772" data-name="Path 215772" d="M3757,6418a10,10,0,1,1,10-10A10,10,0,0,1,3757,6418Zm-1-15v4h2v-4Zm3,5v4h2v-4Zm-6,0v4h2v-4Z" transform="translate(-3747 -6398)" fill="currentColor"/> </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo __('More');?>
					</a>
				</li>
			</ul>
			<div id="basic" class="col s12 active search_filters">
				<form onsubmit="return false;" onkeypress="return event.keyCode != 13;">
					<div class="row">
						<div class="col s12 m2">
							<h5><?php echo __('Gender');?></h5>
							<p><label><input type="checkbox" class="_gender filled-in" value="" data-vx="_all_" data-txt="<?php echo __('All');?>" /><span class="_gender_text" data-txt="<?php echo __('All');?>"><?php echo __('All');?></span></label></p>
						</div>
                        
						<div class="col s12 m4">
							<h5><?php echo __('Country');?></h5>
							<div class="valign-wrapper dt_hm_filtr_loc">
								<label title="<?php echo __('My location');?>">
									<input type="checkbox" class="filled-in" id="is_my_location">
									<b><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg></b>
								</label>
								<select id="my_country" name="my_country" data-country="" >
									<option value="all"><?php echo __('All_countries');?></option>
									
								</select>
							</div>
							<div style="position: relative;margin-top: 10px;">
								<input type="hidden" class="city_country_key" name="city_country_key" value="">
								<input type="text" name="city" placeholder="" class="selected_city" value="">
								<div class="city_search_result"></div>
							</div>
						</div>
						<div class="col s12 m3">
							<h5><?php echo __('Ages');?></h5>
							<div class="row r_margin">
								<div class="input-field col s6 no_margin_top">
									<select class="_age_from">
										<?php for($i = 18 ; $i < 51 ; $i++ ){
											$selected = '';
											?>
											<option value="<?php echo $i;?>" <?php echo $selected; ?> ><?php echo $i;?></option>
										<?php }?>
									</select>
								</div>
								<div class="input-field col s6 no_margin_top">
									<select class="_age_to">
										<?php for($i = 51 ; $i < 99 ; $i++ ){
											$selected = '';
											?>
											<option value="<?php echo $i;?>" <?php echo $selected; ?> ><?php echo $i;?></option>
										<?php }?>
									</select>
								</div>
							</div>
						</div>
						<div class="col s12 m3">
							<h5><?php echo __('Distance');?></h5>
							<p class="range-field">
								<input type="range" min="1" max="250" value="" id="_located" style="direction: ltr!important;"/>
								<b class="range"><span>0km</span><span>250km</span></b>
							</p>
						</div>
					</div>
					<input type="hidden" id="_lat" value="">
					<input type="hidden" id="_lng" value="">
					<div class="btn_wrapper">
						<button class="btn waves-effect btn_glossy btn-flat btn-large waves-light btn-find-matches-search" type="button" id="btn_search_basic" disabled><?php echo __('Search your match');?></button>
						<button class="btn waves-effect btn_glossy btn-flat btn-small waves-light" type="button" onclick="resetSearchData()"><?php echo __('reset');?></button>
					</div>
				</form>
			</div>
			<div id="looks" class="col s12 search_filters" style="display: none;">
				<form onsubmit="return false;" onkeypress="return event.keyCode != 13;">
					<div class="row">
						<div class="col s12 m5">
							<h5><?php echo __('Height');?></h5>
							<div class="input-field col s6">
								<select class="height_from">
									<option value=""></option>
								</select>
							</div>
							<div class="input-field col s6">
								<select class="height_to">
									<option value=""></option>
								</select>
							</div>
						</div>

						<div class="col s12 m1"></div>

						<div class="col s12 m6">
							<h5><?php echo __('Body type');?></h5>
						</div>
					</div>
					<div class="btn_wrapper">
						<button class="btn waves-effect btn_glossy btn-flat btn-large waves-light btn-find-matches-search" id="btn_search_looks" type="button" disabled><?php echo __('Search your match');?></button>
						<button class="btn waves-effect btn_glossy btn-flat btn-small waves-light" type="button" onclick="resetSearchData()"><?php echo __('reset');?></button>
					</div>
				</form>
			</div>

			<div id="background" class="col s12 search_filters" style="display: none;">
				<form onsubmit="return false;" onkeypress="return event.keyCode != 13;">
					<div class="row">
						<div class="col s12 m4">
							<h5><?php echo __('Language');?></h5>
							<div class="input-field col s12">
								<select class="_language">
								</select>
							</div>
						</div>

						<div class="col s12 m4">
							<h5><?php echo __('Ethnicity');?></h5>
						</div>

						<div class="col s12 m4">
							<h5><?php echo __('Religion');?></h5>
						</div>
					</div>

					<div class="btn_wrapper">
						<button class="btn waves-effect btn_glossy btn-flat btn-large waves-light btn-find-matches-search" id="btn_search_background" type="button" disabled><?php echo __('Search your match');?></button>
						<button class="btn waves-effect btn_glossy btn-flat btn-small waves-light" type="button" onclick="resetSearchData()"><?php echo __('reset');?></button>
					</div>
				</form>
			</div>

			<div id="lifestyle" class="col s12 search_filters" style="display: none;">
				<form onsubmit="return false;" onkeypress="return event.keyCode != 13;">
					<div class="row">
						<div class="col s12 m2">
							<h5><?php echo __('Status');?></h5>
						</div>

						<div class="col s12 m3">
							<h5><?php echo __('Smokes');?></h5>
						</div>

						<div class="col s12 m7">
							<h5><?php echo __('Drinks');?></h5>
						</div>
					</div>

					<div class="btn_wrapper">
						<button class="btn waves-effect btn_glossy btn-flat btn-large waves-light btn-find-matches-search" id="btn_search_lifestyle" type="button" disabled><?php echo __('Search your match');?></button>
						<button class="btn waves-effect btn_glossy btn-flat btn-small waves-light" type="button" onclick="resetSearchData()"><?php echo __('reset');?></button>
					</div>
				</form>

			</div>

			<div id="tab_more" class="col s12 search_filters" style="display: none;">
				<form onsubmit="return false;" onkeypress="return event.keyCode != 13;">
					<div class="row">
						<div class="col s12 m4">
							<h5><?php echo __('By Interest');?></h5>
							<div class="input-field">
								<input placeholder="" id="interest" type="text" class="validate" value="">
								<script>
									$(document).ready(function(){
										$('#interest').autocomplete({
										});
									});
								</script>
							</div>
						</div>

						<div class="col s12 m5">
							<h5><?php echo __('Education');?></h5>
						</div>

						<div class="col s12 m3">
							<h5><?php echo __('Pets');?></h5>
						</div>
					</div>

					<div class="btn_wrapper">
						<button class="btn waves-effect btn_glossy btn-flat btn-large waves-light btn-find-matches-search" id="btn_search_more" type="button" disabled><?php echo __('Search your match');?></button>
						<button class="btn waves-effect btn_glossy btn-flat btn-small waves-light" type="button" onclick="resetSearchData()"><?php echo __('reset');?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</ul>


{{-- main bar --}}
<div class="container container-fluid container_new page-margin find_matches_cont">

	<div class="row r_margin">

        {{-- sidiebar --}}
        <x-dashboard-sidebar :user="$user" :friendsactive="true"></x-dashboard-sidebar>		

		<div class="col-sm-9">
			<!-- People i liked  -->
			<div class="container-fluid dt_ltst_users">
				<div class="dt_home_rand_user">
					<h6 class="bold mb-3"><?php echo __( 'Friends' );?></h6>
					
					@if (count($follows) > 0)
						<div class="row" id="liked_users_container">
							@foreach ($follows as $key => $likeUser)					
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
											<div class="rand_bottom_bar">
												<button onclick="Like({{$likeUser->id}}, {{$key}})" id="like_btn" class="btn waves-effect like liked" data-ajax-post="/useractions/remove_like" data-ajax-params="userid=" data-ajax-callback="callback_liked_remove_like">
													<a href="javascript:void(0);" id="btn_delete_friend" data-ajax-post="/user/add_friend" data-ajax-params="to=" data-ajax-callback="callback_add_friend" class="red_bg tooltipped" data-position="bottom" data-tooltip="<?php echo __( 'UnFriend' );?>">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path fill="currentColor" d="M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm7 6.586l2.121-2.122 1.415 1.415L20.414 19l2.122 2.121-1.415 1.415L19 20.414l-2.121 2.122-1.415-1.415L17.586 19l-2.122-2.121 1.415-1.415L19 17.586z"/></svg>
													</a></button>
											</div>
										</div>
									</div>
								</div>
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


<x-footer></x-footer>

@push("javascript")
<script>

	var curr_ID = document.getElementById("curr_ID");
	var likeUserrs = document.querySelectorAll(".likeUserrs")

	function Like(like, index){
		likeUserrs[index].classList.add("d-none")

		axios.post("/delete-follows", {
			id: like,
		})
		.then(res => console.log(res))
		.catch(error => console.log(error))
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