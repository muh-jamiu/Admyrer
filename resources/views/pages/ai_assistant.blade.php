@extends("layouts.app")

@php
	$user = $data["user"] ?? [];
@endphp

@section('title')
AI Assistant | Admyrer 
@endsection

@section("content")
<x-main-nav :user="$user"></x-main-nav>

{{-- main bar --}}
<div class="container container-fluid container_new page-margin find_matches_cont">
	<div class="row r_margin">

        {{-- sidiebar --}}
        <x-dashboard-sidebar :findActive="true" :user="$user"></x-dashboard-sidebar>

		<div class="col-sm-9">
			<!-- Filters  -->
			<div class="dt_home_filters_prnt">
				<div class="dt_home_filters">
					<h6><?php echo __('AI Assistant');?></h6>
				</div>
			</div>    

            <x-chat-assistant :user="$user"></x-chat-assistant> 	
          
        
            <!-- Match Users  -->
            <div id="section_match_users" class="">
                <div class="dt_home_match_user">
                    <div class="valign-wrapper mtc_usr_avtr" id="avaters_item_container">
                    </div>
                    <div class="mtc_usr_details" id="match_item_container">
                    </div>
                </div>
            </div>
            <!-- End Match Users  -->
		</div>
		<!-- End Search Users  -->

	</div>
</div>


<x-footer></x-footer>
@endsection