<div class="dt_sections chat_assistant" style="margin: 14px 0 0;">
    <div class="head d-flex justify-content-between">
        <p class="mb-0 fw-bold">Chat Assistant AI</p>
        <div class="d-flex">
            <p style="color: #CC42BD" class="mb-0 mx-3"><i class="fa-solid fa-user"></i> </p>
            <p style="color: #CC42BD" class="mb-0"><i class="fa-solid fa-robot"></i> </p>
        </div>
    </div>

    <div class="chat_container msg-container">

        <div class="wrap1 unique">
            <div class="">
                <p class='mb-0 mx-3'><i class="fa-brands fa-bots"></i></p>
                <div class="msgBodys mt-0">
                    <p class='mb-0 p-2'>Hi {{$user->first_name}}, What question do you have today ?</p>
                </div>
            </div>
        </div>

        <div class="wrap2 unique mt -2 d-none">
            <p class='mb-0 msgIcon mx-3 text-end mb-0'>
            <img src='{{$user->avatar ?? "/img/icon.png"}}' alt="" class='sender_img' />
            </p>
            <div class="sentMsg mt-0">
                <div class="myMsg">
                    <p class="mb-0 p-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. In sapiente impedit eveniet harum ea, rerum amet eaque! Iure, alias! Laboriosam perspiciatis porro non suscipit iusto provident voluptatibus quidem excepturi optio.</p>
                </div>
            </div>
         </div>

    </div>

    <div class="send d-flex">
        <textarea class="message" name="" placeholder="Type message......" id=""></textarea>
        <button onclick="sendMsg()" class="">Send Message</button>
    </div>
</div>

@push("javascript")
    <script>
        var message = document.querySelector(".message")
        var sender_img = document.querySelector(".sender_img")
        var loader = document.querySelector(".loader")

        const AIMsgloader = () => {
            $(".msg-container").append(` <div class="wrap1 unique loader">
            <div class="spinner-grow text-dark spinner-grow-sm mx-4">
            </div>
        </div>`)
            $(".msg-container").scrollTop($(".msg-container").height()*200);
        }

        const AImsg = (msg) => {
            $(".msg-container").append(`
            <div class="wrap1 unique">
            <div class="">
                <p class='mb-0 mx-3'><i class="fa-brands fa-bots"></i></p>
                <div class="msgBodys mt-0">
                    <div style="word-wrap:break-word !important; overflow-wrap: break-word !important; white-space:pre-wrap !important" class='mb-0 p-2'>${msg}</div>
                </div>
            </div>
            </div>`)
            // $(".msg-container").scrollTop($(".msg-container").height()*200);
        }
    
      const sendMsg = () => {
        if(message.value != ""){
          $(".msg-container").append(`
          <div class="wrap2 unique mt -2">
          <p class='mb-0 msgIcon mx-3 text-end mb-0'>
          <img src='${sender_img.src ?? "/img/icon.png"}' alt="" className='' width=${20} />
          </p>
          <div class="sentMsg mt-0">
              <div class="myMsg">
                  <p class="mb-0 p-2">${message.value}</p>
              </div>
            </div>
          </div>`)
          $(".msg-container").scrollTop($(".msg-container").height()*100);
          SendAiMsg(message.value);
          message.value = ""
        }else{
            alert("Please type a message")
        }
      }

      function CheckDisrespectWords(words){
        const Disrepectwords = ["money", "fuck", "shit", "bitch", "asshole", "kill", "stab"];
        const _words = words.toLowerCase()

        for (const word of Disrepectwords) {
            if(_words.includes(word)){
                console.log(word)
            }
        }

      }

      function responsesText(){
        var text = "my name is jamiu"

        for (let i = 0; i < text.length; i++) {
            // setTimeout(() => {
                console.log(text[i])
            // }, 2000);
            
        }
      }

      function SendAiMsg(msg){
        AIMsgloader()
		axios.post("/send-ai-message", {
			message: msg,
		})
		.then(res => {
            var loader = document.querySelectorAll(".loader")
            for (let i = 0; i < loader.length; i++) {
                loader[i].classList.add("d-none")                
            }
            // console.log(res.data[0].text)
            AImsg(res.data[0].text)
        })
		.catch(error => {
            var loader = document.querySelectorAll(".loader")
            for (let i = 0; i < loader.length; i++) {
                loader[i].classList.add("d-none")                
            }
            console.log(error)
        })
	}


    </script>
@endpush