@extends("layouts.dashlayout")

@php
    $polls = $data["poll"] ?? [];
@endphp

@section('title')
Testimonials | Admyrer
@endsection

@section("dashboard")

<div class="container-fluid _music_ pb-5 _polls">
    <div>
        <h3>Testimonials</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
            </ol>
        </nav>
    </div>

    {{-- <div class="row">
        <div class="col-sm-6 form bg-white pb-5">
            <h4 class="fw-bold mb-3">Add Polls</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session("msg"))
                <div class="alert alert-success">
                    <ul>
                        <li>{{session("msg")}}</li>
                    </ul>
                </div>
            @endif

            @if (session("errorMsg"))
            <div class="alert alert-danger">
                <ul>
                    <li>{{session("errorMsg")}}</li>
                </ul>
            </div>
            @endif

            <form action="/create-poll" method="post">
                @csrf
                <label for="">Poll Title</label>
                <input name="title" required type="text" placeholder="Enter poll title">

                <label for="">Options</label>
                <p style="font-size: 12px" class="mb-0 text-danger">Notice: options must be comma (,) seperated</p>
                <textarea cols="30" rows="10" required name="options" id="" placeholder="Enter options for the poll"></textarea>

                <button type="submit" class="mt-2">Create Poll</button>
            </form>
        </div>
    </div> --}}

    @if (count($polls) == 0)
        <div class="text-center mt-5 pt-5">
            <h4>Empty</h4>
            <p>There are no testimonies at the moment</p>
        </div>
    @endif

    @if (session("msg"))
        <div class="alert alert-success">
            <ul>
                <li>{{session("msg")}}</li>
            </ul>
        </div>
    @endif

    <div class="row">        
        @foreach ($polls as $item)   
            <div class="col-sm-5 poll bg-dark">
                <div class="_img_">
                    <img src="{{$item->avatar}}" alt="">
                </div>

                <div class="title">
                    <h5 class="fw-bold text-capitalize mb-3">{{$item->name}}</h5>
                </div>

                <div class="ct">
                    <p>{{$item->comment}}</p>
                </div>
               
                <form action="/delete-testy" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="mb-0 btn" title="delete music"><i class="fa-solid fa-trash text-danger"></i></button>
                </form>
            </div>
        @endforeach
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