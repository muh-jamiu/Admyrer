@extends("layouts.app")

@php
	$user = $data["user"] ?? [];
	$liked = $data["liked"] ?? [];
@endphp

@section('title')
Polls | Admyrer 
@endsection

@section("content")

<x-main-nav :user="$user"></x-main-nav>

<div class="container container-fluid container_new page-margin find_matches_cont">
	<div class="row r_margin">
		{{-- <div class="col-sm-9"> --}}
			<x-dashboard-sidebar :user="$user" :pollactive="true"></x-dashboard-sidebar>	
		{{-- </div> --}}
	</div>
</div>

<x-footer></x-footer>

@endsection