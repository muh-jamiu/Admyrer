@extends("layouts.app")

@php
 $username = request()->get("username");
@endphp

@section('title')
Review | Admyrer 
@endsection

@section("content")

<div class="review_ p-4">
    <div class="text-center">
        <span class="fw-bold fs-4 mb-3 mb-0">Review Date</span>
        <p>Review your date base on the option below.</p>
    </div>

    <div class="d-flex justify-content-between mt-5">
        <p class="fw-bold">Communication</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Communication fa-star mx-3"></i>
            <i class="fa-solid Communication fa-star mx-3"></i>
            <i class="fa-solid Communication fa-star mx-3"></i>
            <i class="fa-solid Communication fa-star mx-3"></i>
            <i class="fa-solid Communication fa-star mx-3"></i>
        </div>
    </div>

    
    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Honesty</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Honesty fa-star mx-3"></i>
            <i class="fa-solid Honesty fa-star mx-3"></i>
            <i class="fa-solid Honesty fa-star mx-3"></i>
            <i class="fa-solid Honesty fa-star mx-3"></i>
            <i class="fa-solid Honesty fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Respect</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Respect fa-star mx-3"></i>
            <i class="fa-solid Respect fa-star mx-3"></i>
            <i class="fa-solid Respect fa-star mx-3"></i>
            <i class="fa-solid Respect fa-star mx-3"></i>
            <i class="fa-solid Respect fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Reliability</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Reliability fa-star mx-3"></i>
            <i class="fa-solid Reliability fa-star mx-3"></i>
            <i class="fa-solid Reliability fa-star mx-3"></i>
            <i class="fa-solid Reliability fa-star mx-3"></i>
            <i class="fa-solid Reliability fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Compatibility</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Compatibility fa-star mx-3"></i>
            <i class="fa-solid Compatibility fa-star mx-3"></i>
            <i class="fa-solid Compatibility fa-star mx-3"></i>
            <i class="fa-solid Compatibility fa-star mx-3"></i>
            <i class="fa-solid Compatibility fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Overall Experience</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Experience fa-star mx-3"></i>
            <i class="fa-solid Experience fa-star mx-3"></i>
            <i class="fa-solid Experience fa-star mx-3"></i>
            <i class="fa-solid Experience fa-star mx-3"></i>
            <i class="fa-solid Experience fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Safety</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Safety fa-star mx-3"></i>
            <i class="fa-solid Safety fa-star mx-3"></i>
            <i class="fa-solid Safety fa-star mx-3"></i>
            <i class="fa-solid Safety fa-star mx-3"></i>
            <i class="fa-solid Safety fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Authenticity</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Authenticity fa-star mx-3"></i>
            <i class="fa-solid Authenticity fa-star mx-3"></i>
            <i class="fa-solid Authenticity fa-star mx-3"></i>
            <i class="fa-solid Authenticity fa-star mx-3"></i>
            <i class="fa-solid Authenticity fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Effort</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Effort fa-star mx-3"></i>
            <i class="fa-solid Effort fa-star mx-3"></i>
            <i class="fa-solid Effort fa-star mx-3"></i>
            <i class="fa-solid Effort fa-star mx-3"></i>
            <i class="fa-solid Effort fa-star mx-3"></i>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <p class="fw-bold">Recommendation</p>
        <div class="d-flex mt-3">
            <i class="fa-solid Recommendation fa-star mx-3"></i>
            <i class="fa-solid Recommendation fa-star mx-3"></i>
            <i class="fa-solid Recommendation fa-star mx-3"></i>
            <i class="fa-solid Recommendation fa-star mx-3"></i>
            <i class="fa-solid Recommendation fa-star mx-3"></i>
        </div>
    </div>

    <form action="/review" method="POST">
        @csrf
        <input type="hidden" class="ownerUsername" name="ownerUsername" value="{{$username}}">
        <input type="hidden" id="_Communication" class="Communication" name="Communication" value="">
        <input type="hidden" id="_Honesty" name="Honesty" value="">
        <input type="hidden" id="_Respect" name="Respect" value="">
        <input type="hidden" id="_Reliability" name="Reliability" value="">
        <input type="hidden" id="_Compatibility" name="Compatibility" value="">
        <input type="hidden" id="_Experience" name="Experience" value="">
        <input type="hidden" id="_Safety" name="Safety" value="">
        <input type="hidden" id="_Authenticity" name="Authenticity" value="">
        <input type="hidden" id="_Effort" name="Effort" value="">
        <input type="hidden" id="_Recommendation" name="Recommendation" value="">
        <button class="btn mt-4">Make Review</button>
    </form>
    <a href="/find-matches" class=" btn-danger">Not Now? Later</a>
    <style>
        .bring{
            display: none !important;
        }
    </style>
</div>

@push("javascript")

<script>
    var Recommendation = document.querySelectorAll(".Recommendation")
    var _Recommendation = document.getElementById("_Recommendation")
    var _Effort = document.getElementById("_Effort")
    var _Authenticity = document.getElementById("_Authenticity")
    var _Safety = document.getElementById("_Safety")
    var _Experience = document.getElementById("_Experience")
    var _Compatibility = document.getElementById("_Compatibility")
    var _Reliability = document.getElementById("_Reliability")
    var _Respect = document.getElementById("_Respect")
    var _Honesty = document.getElementById("_Honesty")
    var _Communication = document.getElementById("_Communication")

    Recommendation.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Recommendation.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Recommendation.value = index1 + 1
        });
    });

    var Effort = document.querySelectorAll(".Effort")

    Effort.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Effort.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Effort.value = index1 + 1
        });
    });
    
    var Authenticity = document.querySelectorAll(".Authenticity")

    Authenticity.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Authenticity.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Authenticity.value = index1 + 1
        });
    });

    var Experience = document.querySelectorAll(".Experience")

    Experience.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Experience.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Experience.value = index1 + 1
        });
    });
    
    var Compatibility = document.querySelectorAll(".Compatibility")

    Compatibility.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Compatibility.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Compatibility.value = index1 + 1
        });
    });

    var Reliability = document.querySelectorAll(".Reliability")

    Reliability.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Reliability.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Reliability.value = index1 + 1
        });
    });
    
    var Respect = document.querySelectorAll(".Respect")

    Respect.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Respect.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Respect.value = index1 + 1
        });
    });

    var Honesty = document.querySelectorAll(".Honesty")

    Honesty.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Honesty.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Honesty.value = index1 + 1
        });
    });
    
    var Communication = document.querySelectorAll(".Communication")

    Communication.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Communication.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Communication.value = index1 + 1
        });
    });

    var Safety = document.querySelectorAll(".Safety")

    Safety.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Safety.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
            _Safety.value = index1 + 1
        });
    });
	
</script>
	
@endpush

@section("content")