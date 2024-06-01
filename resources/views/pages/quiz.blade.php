@extends("layouts.app")

@php
	$user = $data["user"] ?? [];
    $questions = [
            [
                "question" => "What is your ideal date night?",
                "answers" => [
                    "Romantic dinner and a movie",
                    "Outdoor adventure and hiking",
                    "Game night and drinks",
                    "Live music and dancing"
                ]
            ],
            [
                "question" => "What are your thoughts on commitment?",
                "answers" => [
                    "I'm looking for a long-term partner",
                    "I'm open to commitment, but not rushed",
                    "I prefer casual relationships",
                    "I'm not sure yet"
                ]
            ],
            [
                "question" => "What is your love language?",
                "answers" => [
                    "Words of affirmation",
                    "Quality time",
                    "Receiving gifts",
                    "Physical touch"
                ]
            ],
            [
                "question" => "What are your deal-breakers in a relationship?",
                "answers" => [
                    "Dishonesty and lack of trust",
                    "Disrespect and poor communication",
                    "Infidelity and betrayal",
                    "All of the above"
                ]
            ],
            [
                "question" => "What is your idea of a perfect partner?",
                "answers" => [
                    "Someone who is supportive and encouraging",
                    "Someone who is funny and adventurous",
                    "Someone who is intelligent and ambitious",
                    "Someone who is loyal and dependable"
                ]
            ],
            [
                "question" => "How important is communication in a relationship to you?",
                "answers" => [
                    "Very important - we should talk every day",
                    "Somewhat important - we should communicate regularly",
                    "Not very important - we can figure it out as we go",
                    "Not at all important - actions speak louder than words"
                ]
            ],
            [
                "question" => "What is your take on trust and loyalty?",
                "answers" => [
                    "Trust is earned, and loyalty is a must",
                    "Trust is assumed, and loyalty is expected",
                    "Trust is built over time, and loyalty is a choice",
                    "Trust and loyalty are not essential"
                ]
            ],
            [
                "question" => "How do you handle conflicts?",
                "answers" => [
                    "I address them head-on and openly",
                    "I try to compromise and find a middle ground",
                    "I avoid them and hope they resolve themselves",
                    "I become defensive and emotional"
                ]
            ],
            [
                "question" => "What are your thoughts on independence and interdependence?",
                "answers" => [
                    "I value independence and personal space",
                    "I believe in interdependence and teamwork",
                    "I think a balance between both is ideal",
                    "I'm not sure yet"
                ]
            ],
            [
                "question" => "What is your idea of a healthy work-life balance?",
                "answers" => [
                    "Prioritizing work and providing for loved ones",
                    "Balancing work and personal life equally",
                    "Prioritizing personal life and happiness",
                    "I'm still figuring it out"
                ]
            ],
            [
                "question" => "What are your hobbies and interests?",
                "answers" => [
                    "Outdoor activities and sports",
                    "Creative pursuits and art",
                    "Reading and learning",
                    "Music and dancing"
                ]
            ],
            [
                "question" => "What kind of music do you enjoy?",
                "answers" => [
                    "Pop and rock",
                    "Hip-hop and R&B",
                    "Classical and jazz",
                    "Country and folk"
                ]
            ],
            [
                "question" => "What is your favorite travel destination?",
                "answers" => [
                    "Beaches and tropical islands",
                    "Cities and cultural hubs",
                    "National parks and outdoor adventures",
                    "Historical landmarks and museums"
                ]
            ],
            [
                "question" => "What is your idea of a perfect weekend getaway?",
                "answers" => [
                    "Relaxing at a spa or spa resort",
                    "Exploring a new city or town",
                    "Hiking or camping in nature",
                    "Attending a music festival or concert"
                ]
            ],
            [
                "question" => "What are your thoughts on finances and budgeting?",
                "answers" => [
                    "I prioritize saving and investing",
                    "I believe in living within my means",
                    "I'm working on improving my financial literacy",
                    "I'm not sure yet"
                ]
            ],
            [
                "question" => "What is your idea of a perfect romantic evening?",
                "answers" => [
                    "Candlelit dinner and wine",
                    "Sunset picnic and stroll",
                    "Cooking dinner together at home",
                    "Surprise weekend getaway"
                ]
            ],
            [
                "question" => "How important is family to you?",
                "answers" => [
                    "Very important - family comes first",
                    "Somewhat important - family is a priority",
                    "Not very important - I prioritize personal goals",
                    "Not at all important - I'm focused on my own life"
                ]
            ],
            [
                "question" => "What are your thoughts on children and parenthood?",
                "answers" => [
                    "I want kids someday",
                    "I'm open to having kids, but not sure yet",
                    "I don't want kids",
                    "I'm not sure yet"
                ]
            ],
            [
                "question" => "What is your idea of a perfect partner's personality traits?",
                "answers" => [
                    "Kind, supportive, and encouraging",
                    "Funny, adventurous, and spontaneous",
                    "Intelligent, ambitious, and driven",
                    "Loyal, dependable, and honest"
                ]
            ],
            [
                "question" => "How do you prioritize emotional intelligence and empathy in a relationship?",
                "answers" => [
                    "Very important - we should prioritize emotional support",
                    "Somewhat important - we should be understanding and supportive",
                    "Not very important - we can figure it out as we go",
                    "Not at all important - actions speak louder than words"
                ]
            ]
        ];
@endphp

@section('title')
Match Quiz | Admyrer 
@endsection

@section("content")

<x-main-nav :user="$user"></x-main-nav>

<div class="container quiz polls container-fluid container_new page-margin find_matches_cont">
	<div class="row r_margin">
		{{-- <div class="col-sm-9"> --}}
			<x-dashboard-sidebar :user="$user" :quizactive="true"></x-dashboard-sidebar>	
		{{-- </div> --}}

        <div class="col-sm-9">
			<!-- Filters  -->
			<div class="dt_home_filters_prnt">
				<div class="dt_home_filters">
					<h6><?php echo __('Matching Quiz');?></h6>
				</div>
			</div>  
            
            @if (true)
            <div class="text-center mt-3 d-flex justify-content-around">
                <h6 class="count py-1 px-3 text-white" style="border-radius:3px; padding-bottom:8px !important; background-color: red; width:fit-content;margin: auto auto;">1</h6>
                <p class="py-1 px-3 text-dark">Out Of</p>
                <h6 class="py-1 px-3 text-white" style="border-radius:3px; padding-bottom:8px !important; background-color: red; width:fit-content;margin: auto auto;">20</h6>
            </div>
                <div class="" id="liked_users_container">
                    @foreach ($questions as $key => $question)					
                        <div class="col-sm- m6 s12 matches _quize _polls visit likeUserrs" style="margin: auto auto; width:60%" >
                            <div class="card valign-wrapper" style="border: none !important"> 
                                <div class="p-4">
                                    <h6 class="qst fw-bold">{{$question["question"]}}
                                    </h6>
                                </div>                         
								<div class="card-content  p-3 w-100" >
                                    @foreach ($question["answers"] as $key => $answer)
                                    <p class="p-3 ans"><span>{{$key + 1}}</span> {{$answer}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

			@if (false)
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
        item.classList.add("d-none")
        _polls[poll_index].classList.remove("d-none")
    });


	var ans = document.querySelectorAll(".ans");
    ans.forEach((element, index) => {
        element.addEventListener('click', () => {
            ans.forEach((item, index) => {
                item.classList.remove("selected")
            });

            Swal.fire({
            title: "Do you want to choose this option?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Choose",
            denyButtonText: `Don't Choose`
            }).then((result) => {
            if (result.isConfirmed) {
	            var count = document.querySelector(".count");
                poll_index += 1
                count.innerHTML = poll_index + 1
                var _polls = document.querySelectorAll("._polls");
                if(_polls.length == poll_index ){
                    Swal.fire("Matching Quiz Completed", "You've completed the matching quiz, congrats!", "success");
                    window.location.href = "/matches"
                }
                _polls.forEach((item, index) => {
                    item.classList.add("d-none")
                    _polls[poll_index].classList.remove("d-none")
                });
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
            });

            element.classList.add("selected")
        })
    });

</script>
    
@endpush

@endsection