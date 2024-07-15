

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="shortcut icon" href="/img/icon.png">
    <!-- Include Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="/css/materialize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/4d349a1f95.js" crossorigin="anonymous"></script>
    
    @vite('resources/js/app.js')
    
    <script src="/js/script.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/chat.js"></script>
    <script src="/js/functions.js"></script>
    {{-- <script src="/js/agora.js"></script> --}}
    <script src="/js/plugins.js"></script>
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>
<body>
    <x-start-live></x-start-live>
    <iframe
    class="_frame"
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/ba5d0e95-3e65-4c88-9355-07fddb03597d">
</iframe>
<button class="bring text-white btn"><i class="fa-solid fa-comments"></i></button>
    <img src="/img/login-banner-mask.svg" class="body_banner_mask">

    @yield("content")
    
    @stack('javascript')

</body>
<script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
<script src="/js/agora_1.js"></script>
<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet">
<script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>
<script>
    var bring = document.querySelector(".bring");
	var _frame = document.querySelector("._frame");
	bring.addEventListener("click", () => {
		if(_frame.classList.contains("active")){
			_frame.classList.remove("active")
			bring.classList.remove("active")
			bring.innerHTML = `<i class="fa-solid fa-comments"></i>`
		}else{			
			_frame.classList.add("active")
			bring.innerHTML = `<i class="fa-solid fa-xmark"></i>`
			bring.classList.add("active")
		}
		console.log(_frame)
	})
</script>
</html>