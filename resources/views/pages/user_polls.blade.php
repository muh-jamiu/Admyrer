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

<x-footer></x-footer>

@endsection