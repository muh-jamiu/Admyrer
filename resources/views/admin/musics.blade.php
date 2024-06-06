@extends("layouts.dashlayout")

@php
    $audios = $data["audio"] ?? [];
@endphp

@section('title')
Musics | Admyrer
@endsection

@section("dashboard")

<div class="container-fluid _music_ pb-5">
    <div>
        <h3>Musics</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Musics</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-sm-5 list bg-dark">
            @foreach ($audios as $item)
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="name mb-0 text-capitalize">{{$item->name}}</p>
                        <p style="font-size: 10px" class="name mb-0 text-capitalize">Music by {{$item->artist}}
                            <span style="font-size: 16px" class="mb-0 text-danger playbtn mx-2" onclick="playAudio('{{ url('audio/' . $item->filename) }}')"><i class="fa-regular fa-circle-play"></i></span> 
                            <span style="font-size: 16px" class="mb-0 text-info " onclick="pauseAudio('{{ url('audio/' . $item->filename) }}')"><i class="fa-regular fa-circle-pause"></i></span> 
                        </p>
                    </div>
                    <form action="/delete-music" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button class="mb-0 btn" title="delete music"><i class="fa-solid fa-trash text-danger"></i></button>
                        <audio id="audio_{{ $loop->index }}" src="{{url('audio/' . $item->filename) }}" controls style="display:none;"></audio>
                    </form>
                </div>
            @endforeach
            @if (count($audios) == 0)
                <div class="text-center mt-5 pt-5">
                    <h4 class="fw-bold">Empty</h4>
                    <p style="font-size: 12px" class="">You don't have any music uploaded yet.</p>
                </div>
            @endif
        </div>

        <div class="col-sm-6 form bg-white pb-5">
            <h4 class="fw-bold mb-3">Add music</h4>
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

            <form action="/store-music" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Artist</label>
                <input name="artist" required type="text" placeholder="Enter music artist">

                <label for="">Music Name</label>
                <input name="name" required type="text" placeholder="Enter music name">

                <label for="">Music Type</label>
                <select required name="type" aria-placeholder="Select type" id="">
                    <option value="">Select type</option>
                    <option value="genre">Genre</option>
                </select>
                
                <label for="audio" class="btn d-block bg-info mb-3" style="width: fit-content">Select Music File</label>
                <input accept="audio/*" class="d-none" type="file" id="audio" name="audio" required>
                <button type="submit" class="mt-2">Upload</button>
            </form>
        </div>
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