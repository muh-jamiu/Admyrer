@extends("layouts.app")

@php
    $notification = $data["notification"] ?? [];
	$dates = $data["dates"] ?? [];
	$schedule = $data["schedule"] ?? [];
	$loginUser = $data["loginUser"] ?? [];
@endphp

@section('title')
Settings | Admyrer 
@endsection

@section("content")

<div class="settings">
<x-main-nav :schedule="$schedule" :dates="$dates" :notification="$notification" :user="$loginUser"></x-main-nav>

<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active text-dark mx-2" data-bs-toggle="tab" href="#general">General Setting <i class="fa-solid fa-sliders"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark mx-2" data-bs-toggle="tab" href="#user_s">User Profile Setting <i class="fa-solid fa-wrench"></i></a>
    </li>    
    <li class="nav-item">
        <a class="nav-link text-dark mx-2" data-bs-toggle="tab" href="#pass_w">Password <i class="fa-solid fa-lock"></i></a>
    </li>
</ul>

@if (session("msg"))
<div style="width: fit-content; margin:auto auto; height:fit-content;margin-top:1em" class="alert alert-success text-center">
    <ul>
        <li>{{session("msg")}}</li>
    </ul>
</div>
@endif

<form action="/update-userspec" method="post">
    @csrf

    <div class="tab-content">
        <div class="container_ sect1 tab-pane mt-5 active" id="general">
            <h6 class="fw-bold">General Settings</h6>
            <div class="d-flex mt-4">
                <input type="text" placeholder="First name" value="{{$loginUser->first_name}}" name="first_name">
                <input type="text" placeholder="Last name" value="{{$loginUser->last_name}}" name="last_name">
            </div>
            <div class="d-flex mt-4">
                <input type="text" placeholder="Username" value="{{$loginUser->username}}" name="username">
                <input type="email" placeholder="Email Address" value="{{$loginUser->email}}" name="email">
            </div>
            <div class="d-flex mt-4">
                <input name="country" type="text" placeholder="Country" value="{{$loginUser->country}}">
                <input name="state" type="text" placeholder="State" value="{{$loginUser->state}}">
            </div>
            <div class="d-flex mt-4">
                <input name="city" type="text" placeholder="City" value="{{$loginUser->city}}">
                <input name="birthday" type="text" placeholder="Birthday" value="{{$loginUser->birthday}}">
            </div>
            
            <button class="btn mb-4">Save</button>
        </div>

        <div class="container_ sect1 tab-pane mt-5 fade" id="pass_w">
            <h6 class="fw-bold">Password Settings</h6>
            <input style="width: 95%" type="password" placeholder="Current password" name="password">
            <div class="d-flex mt-4">
                <input type="password" id="_password_" placeholder="New password" name="password">
                <input type="password" placeholder="Confirm new password" name="" 
                oninput="this.setCustomValidity(this.value != document.getElementById('_password_').value ? 'Passwords do not match.' : '')">
            </div>          
            <button class="btn mb-4">Save</button>
        </div>
        
        

        <div  class="fade tab-pane" id="user_s">
            <div class="container_ sect1 mt-5">
                <h6 class="fw-bold">Profile Settings</h6>
                <textarea name="character" value="{{$loginUser->character}}" style="border: 1px solid rgb(226, 226, 226)" class="mt-3" placeholder="About me" id="" cols="30" rows="10">{{$loginUser->character}}</textarea>
                <div class="d-flex mt-4">
                    <input name="work_status" type="text" placeholder="Work Status" value="{{$loginUser->work_status}}">
                    <input name="relationship" type="text" placeholder="Relationship status" value="{{$loginUser->relationship}}">
                </div>
                <div class="d-flex mt-4">
                    <input type="text" readonly placeholder="Preferred Language" value="English">
                    <input name="education" type="text" placeholder="Education" value="{{$loginUser->education}}">
                </div>
                <div class="d-flex mt-4">
                    <input name="location" type="text" placeholder="Location" value="{{$loginUser->location}}">
                    <input name="state" type="text" placeholder="State" value="{{$loginUser->state}}">
                </div>            
                <button class="btn mb-4">Save</button>
            </div>

            <div class="container_ sect1 tab-pane mt-5">
                <h6 class="fw-bold">Looks</h6>
                <div class="d-flex mt-4">
                    <input name="ethnicity" type="text" placeholder="Ethnicity" value="{{$loginUser->ethnicity}}">
                    <input name="body" type="text" placeholder="Body type" value="{{$loginUser->body}}">
                </div>
                <div class="d-flex mt-4">
                    <input name="height" type="text" placeholder="Height" value="{{$loginUser->height}}">
                    <input name="hair_color" type="text" placeholder="Hair color" value="{{$loginUser->hair_color}}">
                </div>
                
                <button class="btn mb-4">Save</button>
            </div>

            <div class="container_ sect1 tab-pane mt-5">
                <h6 class="fw-bold">Personality</h6>
                <div class="d-flex mt-4">
                    <input type="text" name="interest" placeholder="Character" value="{{$loginUser->interest}}">
                    <input name="children" type="text" placeholder="Children" value="{{$loginUser->children}}">
                </div>
                <div class="d-flex mt-4">
                    <input name="friends" type="text" placeholder="Friends" value="{{$loginUser->friends}}">
                    <input name="pets" type="text" placeholder="Pets" value="{{$loginUser->pets}}">
                </div>
                
                <button class="btn mb-4">Save</button>
            </div>

            <div class="container_ sect1 tab-pane mt-5">
                <h6 class="fw-bold">Lifestyle</h6>
                <div class="d-flex mt-4">
                    <input name="live_with" type="text" placeholder="I live with" value="{{$loginUser->live_with}}">
                    <input name="car" type="text" placeholder="Car" value="{{$loginUser->car}}">
                </div>
                <div class="d-flex mt-4">
                    <input name="religion" type="text" placeholder="Religion" value="{{$loginUser->religion}}">
                    <input name="smoke" type="text" placeholder="Smoke" value="{{$loginUser->smoke}}">
                </div>
                <div class="d-flex mt-4">
                    <input name="travel" type="text" placeholder="Travel" value="{{$loginUser->travel}}">
                    <input name="drink" type="text" placeholder="Drink" value="{{$loginUser->drink}}">
                </div>
                
                <button class="btn mb-4">Save</button>
            </div>

            <div class="container_ sect1 tab-pane mt-5">
                <h6 class="fw-bold">Favourites</h6>
                <div class="d-flex mt-4">
                    <input name="music" type="text" placeholder="Music Genre" value="{{$loginUser->music}}">
                    <input type="text" placeholder="Dish" value="">
                </div>
                <div class="d-flex mt-4">
                    <input name="music" type="text" placeholder="Song" value="{{$loginUser->music}}">
                    <input name="hobby" type="text" placeholder="Hobby" value="{{$loginUser->hobby}}">
                </div>
                <div class="d-flex mt-4">
                    <input name="sport" type="text" placeholder="Sport" value="{{$loginUser->sport}}">
                    <input type="text" placeholder="TV Show">
                </div>
                <div class="d-flex mt-4">
                    <input type="text" placeholder="Book">
                    <input type="text" placeholder="Movie">
                </div>
                
                <button class="btn mb-4">Save</button>
            </div>
    
        </div>
    </div> 

</form>


<x-footer></x-footer>
<style>
    .bring{
        display: none !important;
    }
</style>
</div>

@push("javascript")


	
@endpush

@section("content")