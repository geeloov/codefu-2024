<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>
<body>
  <div class="flex items-center justify-center h-[100vh]">
    <div class="w-[80%] my-7 mx-auto">
        <div class="flex justify-between">
            <div class="mb-2">
              <a href="{{route('homepage')}}">
                <svg
                  width="34"
                  height="34"
                  viewBox="0 0 34 34"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="none"
                >
                  <path
                    d="M33.7499 9.87631V9.877V24.123C33.7499 27.1672 32.843 29.5669 31.2039 31.2052C29.5648 32.8435 27.1639 33.75 24.118 33.75H9.88192C6.83607 33.75 4.43527 32.8435 2.79615 31.2032C1.15701 29.5628 0.25 27.1589 0.25 24.106V9.877C0.25 6.83275 1.1569 4.43314 2.79604 2.79482C4.43519 1.15649 6.83606 0.25 9.88192 0.25H24.135C27.1809 0.25 29.5817 1.15651 31.2187 2.79471C32.8556 4.43285 33.7583 6.83222 33.7499 9.87631ZM12.1185 10.766L12.2528 10.6318C12.8437 10.0412 12.8437 9.06682 12.2528 8.47618C11.6619 7.88561 10.6873 7.88561 10.0964 8.47618L7.42606 11.1452C6.83522 11.7357 6.83512 12.7098 7.42575 13.3005C7.42585 13.3006 7.42595 13.3007 7.42606 13.3008L10.0958 15.9863L10.0964 15.9868C10.4009 16.2912 10.7887 16.434 11.1746 16.434C11.5604 16.434 11.9483 16.2912 12.2528 15.9868C12.8602 15.3797 12.8602 14.4246 12.2727 13.8172L12.2728 13.8172L12.2698 13.8142L12.2546 13.799H20.2741C22.3302 13.799 23.9871 15.4552 23.9871 17.51C23.9871 19.5641 22.3139 21.221 20.2741 21.221H11.9059C11.0706 21.221 10.3803 21.9108 10.3803 22.746C10.3803 23.5812 11.0706 24.271 11.9059 24.271H20.2741C24 24.271 27.0383 21.253 27.0383 17.527C27.0383 13.8018 24.0008 10.766 20.2741 10.766H12.1185Z"
                    fill="#3F8D8B"
                    stroke="black"
                    stroke-width="0.5"
                  ></path>
                </svg>
              </a>
            </div>
            
            
            <div>
                <div class="flex flex-row gap-2">
                  <div class="mb-1">
                    <span class="text-[25px] italic text-left text-[#2a2a2a]">{{Auth::user()->points}}</span>
                  </div>
                  <div>
                    <img src="{{asset('/images/coin_image/Group 57.png')}}" class="w-[32px] h-[32px]" alt="">
                  </div>
                </div>
            </div>
        </div>

        <!-- Grey bg -->
        <div class="h-[494px]" style="filter: drop-shadow(1px 4px 50px rgba(0,0,0,0.25));">
          <div class="h-[494px] rounded-[14px] bg-white border border-black p-4">
              <div class="grid grid-cols-1 pt-4">
                <p class="text-[25px] font-light text-center text-[#2a2a2a]">Forecast</p>
              </div>
            
              <!-- Cards -->
              <div id="cards-container">
                <div class="card mt-[18px] mx-[11px] h-[69px] rounded-[11px] bg-[#b2b1b1]/[0.43] border-[0.1px] border-[#59a8a4] flex justify-between items-center p-1" id="cardyesterday">
                  <p class="text-[10px] font-light text-center text-white self-end" id="yesterday-date">{{date('d.m.Y',strtotime("-1 days"))}}</p>
                  <div class="flex flex-col gap-0">
                    <p class="dayP text-[10px] font-light text-center text-black">Yesterday</p>
                    <p class="valueP mb-4 text-2xl font-light text-center text-black" id="yesterday-value"></p>
                  </div>
                  <img src="{{asset('images/circled-exclaimation_1.png')}}" class="w-[42px] h-[42px]">
                </div>
                <div class="card mt-[18px] mx-[11px] h-[69px] rounded-[11px] bg-[#b2b1b1]/[0.43] border-[0.1px] border-[#59a8a4] flex justify-between items-center p-1" id="cardtoday">
                  <p class="text-[10px] font-light text-center text-white self-end" id="today-date">{{date('d.m.Y')}}</p>
                  <div class="flex flex-col gap-0">
                    <p class="dayP text-[10px] font-light text-center text-black">Today</p>
                    <p class="valueP mb-4 text-2xl font-light text-center text-black" id="today-value"></p>
                  </div>
                  <img src="{{asset('images/circled-exclaimation_1.png')}}" class="w-[42px] h-[42px]">
                </div>
                <div class="card mt-[18px] mx-[11px] h-[69px] rounded-[11px] bg-[#b2b1b1]/[0.43] border-[0.1px] border-[#59a8a4] flex justify-between items-center p-1" id="cardtomorrow">
                  <p class="text-[10px] font-light text-center text-white self-end">{{date('d.m.Y',strtotime("+1 days"))}}</p>
                  <div class="flex flex-col gap-0">
                    <p class="dayP text-[10px] font-light text-center text-black">{{date('l', strtotime('tomorrow'))}}</p>
                    <p class="valueP mb-4 text-2xl font-light text-center text-black" id="tomorrow-value"></p>
                  </div>
                  <img src="{{asset('images/circled-exclaimation_1.png')}}" class="w-[42px] h-[42px]">
                </div>
                <div class="card mt-[18px] mx-[11px] h-[69px] rounded-[11px] bg-[#b2b1b1]/[0.43] border-[0.1px] border-[#59a8a4] flex justify-between items-center p-1" id="cardin2days">
                  <p class="text-[10px] font-light text-center text-white self-end">{{date('d.m.Y',strtotime("+2 days"))}}</p>
                  <div class="flex flex-col gap-0">
                    <p class="dayP text-[10px] font-light text-center text-black">{{date('l', strtotime('+2 days'))}}</p>
                    <p class="valueP mb-4 text-2xl font-light text-center text-black" id="in2days-value"></p>
                  </div>
                  <img src="{{asset('images/circled-exclaimation 1.png')}}" class="w-[42px] ">
                </div>
              </div>
            
              <!-- Buttons -->
              <div class="flex justify-center items-center mt-3">
                <div class="flex flex-row gap-[10px] ">
                  <button 
                    onclick="getData('pm25')" 
                    class="pollution-btn active w-[70px] h-[30px] rounded-tl-[5px] rounded-tr-[5px] bg-[#3f8d8b] border-t border-r border-b-0 border-l border-[#3f8d8b] mt-[33px]" id="pm25">
                    pm2.5
                  </button>
                  <button 
                    onclick="getData('pm10')" 
                    class="pollution-btn w-[70px] h-[30px] rounded-tl-[5px] rounded-tr-[5px] bg-white border-t border-r border-b-0 border-l border-[#3f8d8b] mt-[33px]" id="pm10">
                    pm10
                  </button>
                  <button 
                    onclick="getData('no2')" 
                    class="pollution-btn w-[70px] h-[30px] rounded-tl-[5px] rounded-tr-[5px] bg-white border-t border-r border-b-0 border-l border-[#3f8d8b] mt-[33px]" id="no2">
                    NO2
                  </button>
                </div>
              </div>
            </div>         
          </div>
        </div>
      </div>
          
          <style>
            /* Styling for selected and non-selected buttons */
            .pollution-btn {
              transition: all 0.3s ease;
            }
          
            .pollution-btn.active {
              background-color: #3f8d8b; /* Darker color for active */
              color: white
            }
          
            .pollution-btn:not(.active) {
              background-color: white; /* Lighter color for non-selected */
              color: #2a2a2a;
            }
          </style>
    
    <script>
    
      const thresholds = {
                  "pm25": { green: 32, yellow: 70 },
                  "pm10": { green: 45, yellow: 85 },
                  "no2": { green: 55, yellow: 120 },
                };
    
      function getColor(value, type) {
                  if (value <= thresholds[type].green) return "bg-[#83c5c0]";
                  if (value <= thresholds[type].yellow) return "bg-[#59a8a4]";
                  return "bg-[#307170]";
                }
    
    
    
    
      function getData(type) {
        fetch(`/forecast/${type}`)
          .then(response => response.json())
          .then(data => {      
            console.log(data);
                  
            const days = ["yesterday", "today", 'tomorrow', 'in2days'];
            Object.entries(data).forEach(([key, value]) => {
            
              const valueElement = document.querySelector(`#${key}-value`);
              if (valueElement) {
                valueElement.innerText = value + " μg/m3"; // Update the element with the value
              }
              const card = document.querySelector(`#card${key}`)
              
              
              card.classList = 'card mt-[18px] mx-[11px] h-[69px] rounded-[11px] bg-[#b2b1b1]/[0.43] border border-[#797272] flex justify-between items-center p-1 ' + getColor(value, type);
              
                 
              const img = card.querySelector("img");
              const dayP = card.querySelector(".dayP");
              const valueP = card.querySelector(".valueP");
              if (getColor(value, type) === "bg-[#83c5c0]") {
                img.src = "{{asset('images/circled-check_1.png')}}"; 
                dayP.style.color = "#000000";
                valueP.style.color = "#000000";  
              } else if (getColor(value, type) === "bg-[#59a8a4]") {
                img.src = "{{asset('images/circled-exclaimation_1.png')}}";
                dayP.style.color = "#FFF4DD"; 
                valueP.style.color = "#FFF4DD";
              } else {
                img.src = "{{asset('images/cross-circle-svgrepo-com_1.png')}}";
                dayP.style.color = "#FFF4DD";
                valueP.style.color = "#FFF4DD";
              }
              
              
              document.querySelectorAll(".pollution-btn").forEach(btn => btn.classList.remove("active"));
              const button = document.querySelector(`#${type}`)
              button.classList.add("active");


              


    
              
            });
          })
          .catch(error => console.error(error));
    }
    
    getData('pm25');
    
    </script>
  </body>
  </html>