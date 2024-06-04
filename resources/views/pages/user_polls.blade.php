@extends("layouts.app")

@php
    $notification = $data["notification"] ?? [];
	$user = $data["user"] ?? [];
	$Allpoll = $data["Allpoll"] ?? [];
	$Userpoll = $data["Userpoll"] ?? [];
	$dates = $data["dates"] ?? [];
	$schedule = $data["schedule"] ?? [];
@endphp

@section('title')
Polls | Admyrer 
@endsection

@section("content")

<x-main-nav :schedule="$schedule" :dates="$dates" :notification="$notification" :user="$user"></x-main-nav>

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
            
            @if (count($Allpoll) > 0)
                <div class="row" id="liked_users_container">
                    @foreach ($Allpoll as $key => $poll)					
                        <div class="col-sm-4 m6 s12 matches _polls visit likeUserrs" >
                            <div class="card valign-wrapper" style="border: none !important"> 
                                <div class="head">
                                    <p class="qst fw-bold">{{$poll->title}} ?</p>
                                </div>      
                                @php
                                    $options = explode(",", $poll->options);
                                    $loginQuiz = $Userpoll->Where('pollId', $poll->id);
                                    $matchingAnswers = "";
                                    if($loginQuiz){
                                        foreach ($loginQuiz as $answer1) {
                                           $matchingAnswers = $answer1->answer;
                                        }
                                    }
                                @endphp                        
								<div class="card-content  p-3 w-100" >
                                    @foreach ($options as $key => $option)	
                                    @if ($option == $matchingAnswers)
                                    <p onclick="getTitle(`{{$option}}`, `{{$poll->id}}`)" class="{{$poll->title}} ans selectedDB"><span>{{$key + 1}}</span> {{$option}}</p>
                                        
                                    @else
                                    <p onclick="getTitle(`{{$option}}`, `{{$poll->id}}`)" class="{{$poll->title}} ans"><span>{{$key + 1}}</span> {{$option}}</p>
                                        
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

			@if (count($Allpoll) == 0)
            	<x-dashboard-empty></x-dashboard-empty> 				
			@endif       
    
		</div>
	</div>
</div>

<x-footer></x-footer>

@push("javascript")

<script>
    var poll_index = 0
	var _polls = document.querySelectorAll("._polls");
    _polls.forEach((item, index) => {

    });
   
    let _answer
    let _question
    
    function getTitle(answer, question){
        _answer = answer
        _question = question
    }

	var ans = document.querySelectorAll(".ans");
    ans.forEach((element, index) => {
        element.addEventListener('click', () => {
            ans.forEach((item, index) => {
                item.classList.remove("selected")
            });

            Swal.fire({
            title: "Do you want to vote for this poll?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Vote",
            denyButtonText: `Don't vote`
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Vote!", "", "success");
                polls(_answer ,_question)
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
            });

            element.classList.add("selected")
        })
    });


    function polls(answer, pollId){
        axios.post("/create-userpoll", {
			answer: answer,
			pollId: pollId,
		})
        .then(res => {
            console.log(res)
        })
        .catch(error => {
            console.log(error)
        })
    }

</script>
    
@endpush

@endsection