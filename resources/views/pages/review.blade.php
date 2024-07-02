@extends("layouts.app")

@php
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

    Recommendation.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Recommendation.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });

    var Effort = document.querySelectorAll(".Effort")

    Effort.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Effort.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });
    
    var Authenticity = document.querySelectorAll(".Authenticity")

    Authenticity.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Authenticity.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });

    var Experience = document.querySelectorAll(".Experience")

    Experience.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Experience.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });
    
    var Compatibility = document.querySelectorAll(".Compatibility")

    Compatibility.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Compatibility.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });

    var Reliability = document.querySelectorAll(".Reliability")

    Reliability.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Reliability.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });
    
    var Respect = document.querySelectorAll(".Respect")

    Respect.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Respect.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });

    var Honesty = document.querySelectorAll(".Honesty")

    Honesty.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Honesty.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });
    
    var Communication = document.querySelectorAll(".Communication")

    Communication.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Communication.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });

    var Safety = document.querySelectorAll(".Safety")

    Safety.forEach((star, index1) => {
        star.addEventListener("click", () => {
            Safety.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("text-warning") : star.classList.remove("text-warning");
            });
        });
    });
	
</script>
	
@endpush

@section("content")