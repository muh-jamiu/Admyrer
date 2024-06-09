@extends("layouts.dashlayout")

@php
    $polls = $data["poll"] ?? null;
@endphp

@section('title')
Marketing Strategy | Admyrer
@endsection

@section("dashboard")

<div class="container-fluid _music_ pb-5 _polls">
    <div>
        <h3>Marketing Strategy</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Marketing Strategy</li>
            </ol>
        </nav>
    </div>


    <div class="target">        
      <h5 class="fw-semibold">Generated Market Strategy</h5>
      <p style="word-wrap:break-word !important; overflow-wrap: break-word !important; white-space:pre-wrap !important">{{$polls}}</p>
    </div>

</div>

@push("javascript")
<script>
    let currentAudio = null;
    var playbtn = document.querySelectorAll(".playbtn")
    playbtn.forEach((element, index) => {
        element.addEventListener("click", () => {
            // element.classList.remove("text-danger")
            // playbtn[index].classList.add("text-danger")
        })
    });

    function playAudio(src) {
        if (currentAudio) {
            currentAudio.pause();
            currentAudio.currentTime = 0;
            // currentAudio = null
            // return
        }

        currentAudio = new Audio(src);
        currentAudio.play();
    }

    function pauseAudio(src) {
        if (currentAudio) {
            currentAudio.pause();
            currentAudio.currentTime = 0;
            currentAudio = null
            return
        }
    }
</script>
@endpush

@endsection