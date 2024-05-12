@extends("layouts.app")

@php
	$user = $data["user"] ?? [];
	$Allpoll = $data["Allpoll"] ?? [];
	$Userpoll = $data["Userpoll"] ?? [];
    $test = [1,2,3,4,5,6];
@endphp

@section('title')
Polls | Admyrer 
@endsection

@section("content")

<x-main-nav :user="$user"></x-main-nav>

<div class="container polls container-fluid container_new page-margin find_matches_cont">
	<div class="row r_margin">
		{{-- <div class="col-sm-9"> --}}
			<x-dashboard-sidebar :user="$user" :pollactive="true"></x-dashboard-sidebar>	
		{{-- </div> --}}

        <div class="col-sm-9">
			<!-- Filters  -->
			<div class="dt_home_filters_prnt">
				<div class="dt_home_filters">
					<h6><?php echo __('Vote Poll');?></h6>
				</div>
			</div>  
            
            @if (count($test) > 0)
                <div class="row" id="liked_users_container">
                    @foreach ($test as $key => $poll)					
                        <div class="col-sm-4 m6 s12 matches visit likeUserrs" >
                            <div class="card valign-wrapper" style="border: none !important"> 
                                <div class="head">
                                    <p class="qst fw-bold">What is your name and what do you think about our webiste?</p>
                                </div>                              
								<div class="card-content  p-3 w-100" >
                                    <p class="ans"><span>A</span> Yes</p>
                                    <p class="ans"><span>B</span> No</p>
                                    <p class="ans"><span>C</span> Maybe</p>
                                    <p class="ans"><span>D</span> Awesome</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

			@if (count($test) == 0)
            	<x-dashboard-empty></x-dashboard-empty> 				
			@endif       
    
		</div>
	</div>
</div>

<x-footer></x-footer>

@endsection