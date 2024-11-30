<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://d3js.org/d3-delaunay.v6.min.js"></script>
    <title>Document</title>
    <style>
        .swipe-up {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 10px;
            font-size: 16px;
            z-index: 1000;
        }

        .map-container {
            position: fixed;
            bottom: -95vh;
            left: 0;
            width: 100%;
            height: 95vh;
            background-color: white;
            transition: bottom 0.4s ease;
            z-index: 999;
            display: flex;
            flex-direction: column;
        }

        .map-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px 30px 0px 0px; 
            height: 95vh; 
            background-color: white;
            box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.5);
            border-top: 2px solid black;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
        
        #map{
            border-radius: 30px 30px 0px 0px; 
        }
        #buttons {
            position: absolute; /* Change to absolute so it moves with the container */
            top: 50%; /* Center vertically relative to map-container */
            transform: translateY(-50%);
            z-index: 50000;
        }
        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background: white;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            padding: 5px 20px 20px 20px;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>
<body class="h-[100vh] overflow-hidden">

    <div id="redZoneModal" class="modal bg-[#f48e90] bg-opacity-90 rounded-[20px]" style="display: none;">
        <div class="flex justify-end">
            <button id="cancelBtn">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1.16667C3.77834 1.16667 1.16667 3.77834 1.16667 7C1.16667 10.2217 3.77834 12.8333 7 12.8333C10.2217 12.8333 12.8333 10.2217 12.8333 7C12.8333 3.77834 10.2217 1.16667 7 1.16667ZM0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14C3.13401 14 0 10.866 0 7ZM4.05974 4.05974C4.28755 3.83194 4.6569 3.83194 4.8847 4.05974L7 6.17504L9.1153 4.05974C9.3431 3.83194 9.71245 3.83194 9.94026 4.05974C10.1681 4.28755 10.1681 4.6569 9.94026 4.8847L7.82496 7L9.94026 9.1153C10.1681 9.3431 10.1681 9.71245 9.94026 9.94026C9.71245 10.1681 9.3431 10.1681 9.1153 9.94026L7 7.82496L4.8847 9.94026C4.6569 10.1681 4.28755 10.1681 4.05974 9.94026C3.83194 9.71245 3.83194 9.3431 4.05974 9.1153L6.17504 7L4.05974 4.8847C3.83194 4.6569 3.83194 4.28755 4.05974 4.05974Z" fill="black" fill-opacity="0.5"/>
                    </svg>
            </button>
        </div>
        <div class="modal-content text-center w-[75vw]">
            <div class="flex mb-[20px] justify-between items-center">
                <p class="text-lg py-[10px] text-left">Wear your mask <br>and save your<br> (avatars) life</p>
                <div>
                    <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 36C9 21.0883 21.0883 9 36 9C50.9118 9 63 21.0883 63 36C63 50.9118 50.9118 63 36 63C21.0883 63 9 50.9118 9 36ZM36 3C17.7746 3 3 17.7746 3 36C3 54.2253 17.7746 69 36 69C54.2253 69 69 54.2253 69 36C69 17.7746 54.2253 3 36 3ZM36 18C37.6569 18 39 19.3432 39 21V39C39 40.6569 37.6569 42 36 42C34.3431 42 33 40.6569 33 39V21C33 19.3432 34.3431 18 36 18ZM39.75 50.25C39.75 52.3212 38.0712 54 36 54C33.9288 54 32.25 52.3212 32.25 50.25C32.25 48.1788 33.9288 46.5 36 46.5C38.0712 46.5 39.75 48.1788 39.75 50.25Z" fill="#FF0000" fill-opacity="0.95"/>
                    </svg>                        
                </div>
            </div>

            <button id="wearMaskBtn" class="border rounded-[15px] px-[10px] py-[10px] bg-black">
                <svg width="46" height="42" viewBox="0 0 46 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5792 1.30533C15.7416 0.812441 16.1978 0.47998 16.7116 0.47998H28.6484C29.1622 0.47998 29.6184 0.812441 29.7808 1.30533L31.8961 7.72233H41.7789C43.7568 7.72233 45.36 9.34362 45.36 11.3435V37.8988C45.36 39.8988 43.7567 41.52 41.7789 41.52H3.58105C1.60332 41.52 0 39.8988 0 37.8988V11.3435C0 9.3436 1.6033 7.72233 3.58105 7.72233H13.4639L15.5792 1.30533ZM17.5719 2.8941L15.4566 9.3111C15.2942 9.80399 14.838 10.1364 14.3242 10.1364H3.58105C2.92181 10.1364 2.38737 10.6769 2.38737 11.3435V37.8988C2.38737 38.5655 2.92179 39.1059 3.58105 39.1059H41.7789C42.4382 39.1059 42.9726 38.5655 42.9726 37.8988V11.3435C42.9726 10.6769 42.4382 10.1364 41.7789 10.1364H31.0358C30.522 10.1364 30.0658 9.80399 29.9034 9.3111L27.7881 2.8941H17.5719Z" fill="#FFC3C3"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.68 17.9143C19.2717 17.9143 16.5086 20.5046 16.5086 23.7C16.5086 26.8953 19.2717 29.4857 22.68 29.4857C26.0884 29.4857 28.8515 26.8953 28.8515 23.7C28.8515 20.5046 26.0884 17.9143 22.68 17.9143ZM14.04 23.7C14.04 19.2265 17.9083 15.6 22.68 15.6C27.4518 15.6 31.32 19.2265 31.32 23.7C31.32 28.1735 27.4518 31.8 22.68 31.8C17.9083 31.8 14.04 28.1735 14.04 23.7Z" fill="#FFC3C3"/>
                    </svg>                    
            </button>
        </div>
    </div>


    <div class="px-[7px] py-[20px] h-[90vh]">
        <div class="flex justify-center">
          <div class="flex items-start">
            <div class="flex flex-col w-[45px] h-[100px] mt-[20px]">
              <div>
                <a href="{{ route('settings') }}"><img src="{{ asset('/images/settings.png') }}" alt=""/></a>
              </div>
              <div>
                <a href="{{ route('shop') }}"><img src="{{ asset('/images/store.png') }}" alt="" /></a>
              </div>
              <div>
                <a href="{{ route('tasks.gps.view') }}"><img src="{{ asset('/images/tasks.png') }}" alt="" /></a>
              </div>
              <div>
                <a href="{{ route('forecast') }}"><img src="{{ asset('/images/forecast.png') }}" alt="" /></a>
              </div>
            </div>
          </div>
          <!-- Main -->
          <div class="flex items-center justify-center w-full h-screen relative">
            <!-- Container for overlay -->
            <div class="relative">
              <!-- Subtract.png overlay -->
              <img
                class="w-[150px] h-auto absolute bottom-[375px] left-[155px]"
                src="{{ asset('/images/Subtract.png') }}"
                alt=""
              />
              <div class="absolute bottom-[345px] left-[170px] w-[120px] h-[120px] overflow-auto">
                <p class="text-black text-center text-[12px] leading-tight break-words">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore
                </p>
              </div>
              <!-- Smoggy-24.png base -->
              <button>
                  <svg id="character" width="250" height="460" xmlns="http://www.w3.org/2000/svg">
                    <image href="{{ asset('/images/smoggy/Smoggy/type-1.png') }}" id="smoggyImg" x="0" y="0" width="250" height="500px"/>
                    @if (count($hat)>0)
                        <image href="{{ asset('/images/smoggy/' . $hat[0]['image']) }}" x="{{$hat[0]['x']}}%" y="{{$hat[0]['y']}}%" width="120" height="120">
                    @endif
                  </svg>
              </button>
            </div>
          </div>
          <!-- Coin -->
          <div class="self-start">
            <div class="flex items-center w-[65px] h-[65px]">
              <div class="mr-2">
                <p class="text-[25px] italic text-left text-[#2a2a2a]">67</p>
              </div>
              <div class="pt-[10px]">
                <button class=" ">
                  <img class="" src="{{ asset('/images/coin_image/Group 57.png') }}" alt="" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
  


    <div id="map-container" class="map-container">

        <div id="buttons" class="flex flex-col items-center justify-center fixed right-0 top-1/2 transform -translate-y-1/2 space-y-4">
            <button onclick="changePollutant('pm25')" class="w-20 h-20 bg-[#83c5c0] text-white rounded-lg hover:bg-[#307170] transition flex items-center justify-center">
                <span class="rotate-[330deg]">PM2.5</span>
            </button>
            <button onclick="changePollutant('pm10')" class="w-20 h-20 bg-[#83c5c0] text-white rounded-lg hover:bg-[#307170] transition flex items-center justify-center">
                <span class="rotate-[330deg]">PM10</span>
            </button>
            <button onclick="changePollutant('no2')" class="w-20 h-20 bg-[#83c5c0] text-white rounded-lg hover:bg-[#307170] transition flex items-center justify-center">
                <span class="rotate-[330deg]">NO2</span>
            </button>
        </div>

        <div class="w-[80%] mt-6 mx-auto h-[10vh]">
            <div class="flex justify-between mt-[20px]">
                <div>
                    <svg width="43" height="43" viewBox="0 0 43 43" class="w-[35px] h-[35px]" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_73_2057)">
                        <rect x="4" width="35" height="35" rx="8" fill="#D9D9D9"/>
                        </g>
                        <path d="M24.5159 17.2968H19.4341V20.0295H24.5159V17.2968Z" fill="#626262"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6227 9.09895V7.73263C15.6227 6.22346 16.7603 5 18.1636 5H25.7864C27.1897 5 28.3273 6.22346 28.3273 7.73263V9.09895H32.1386C34.2436 9.09895 35.95 10.9341 35.95 13.1979V26.8611C35.95 29.1248 34.2436 30.96 32.1386 30.96H11.8114C9.7064 30.96 8 29.1248 8 26.8611V13.1979C8 10.9341 9.7064 9.09895 11.8114 9.09895H15.6227ZM18.1636 7.73263H25.7864V9.09895H18.1636V7.73263ZM11.8114 11.8316C11.1098 11.8316 10.5409 12.4433 10.5409 13.1979V21.3958H33.4091V13.1979C33.4091 12.4433 32.8402 11.8316 32.1386 11.8316H11.8114ZM10.5409 26.8611V24.1284H33.4091V26.8611C33.4091 27.6157 32.8402 28.2274 32.1386 28.2274H11.8114C11.1098 28.2274 10.5409 27.6157 10.5409 26.8611Z" fill="#626262"/>
                        <defs>
                        <filter id="filter0_d_73_2057" x="0" y="0" width="43" height="43" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_73_2057"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_73_2057" result="shape"/>
                        </filter>
                        </defs>
                        </svg>
                </div>

                <div onclick="openMap()">
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19 26.6C18.6106 26.6 18.2381 26.4406 17.9692 26.1589L7.99424 15.7089C7.45083 15.1396 7.47181 14.2376 8.0411 13.6942C8.61038 13.1508 9.5124 13.1718 10.0558 13.741L19 23.1112L27.9442 13.741C28.4876 13.1718 29.3897 13.1508 29.9589 13.6942C30.5282 14.2376 30.5492 15.1396 30.0058 15.7089L20.0308 26.1589C19.7619 26.4406 19.3895 26.6 19 26.6Z" fill="#626262"/>
                    </svg>
                </div>

                <div>
                    <div class="flex flex-row gap-1">
                        <span class="font-bold">0</span>
                        <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.1981 13.8615L25.1582 13.337C26.1091 12.8175 26.597 12.232 26.8233 11.6647C27.0516 11.0925 27.0627 10.4161 26.833 9.63064C26.3612 8.01797 24.9351 6.17571 23.0385 4.56754C21.1566 2.97186 18.9573 1.73075 17.1195 1.23362C16.198 0.98436 15.446 0.94354 14.8971 1.06856C14.389 1.18427 14.0535 1.43656 13.8437 1.86714L13.6479 2.26909L13.2178 2.39118C9.2695 3.51196 6.55485 4.41565 4.69107 5.24302C2.81286 6.0768 1.92886 6.77866 1.4901 7.42195C1.0754 8.02996 0.965341 8.72077 1.00899 9.83033C1.02522 10.2429 1.06023 10.6781 1.10002 11.1725C1.1147 11.355 1.13004 11.5456 1.14532 11.7461C1.19001 12.3326 1.23179 12.9783 1.2464 13.6874C2.5216 14.6277 3.5024 15.8532 4.33414 17.1218C4.92228 18.0187 5.47586 19.0055 6.00265 19.9445C6.28561 20.4489 6.56084 20.9395 6.82953 21.395C8.41706 24.0862 9.97461 25.9386 12.8026 25.9985C17.3849 24.619 21.4671 23.2047 23.8713 21.3676C25.0653 20.4553 25.7291 19.5243 25.9186 18.5484C26.1057 17.5851 25.8718 16.3626 24.8065 14.7707L24.1981 13.8615ZM12.9447 27C8.81072 27 6.99189 23.7553 5.1022 20.3841C3.78754 18.0388 2.43858 15.6323 0.251886 14.2146C0.251886 13.1003 0.173889 12.1312 0.1047 11.2715C-0.264555 6.68335 -0.382939 5.2124 12.9447 1.42919C15.7053 -4.23752 33.1913 8.42389 26.4757 13.6689C26.2295 13.8612 25.9508 14.0435 25.6376 14.2146C25.833 14.5066 26.0057 14.7918 26.1565 15.0705C29.575 21.3877 21.7639 24.3523 12.9447 27Z" fill="#626262"/>
                            <path d="M16.8959 11.8161C18.1653 12.1574 19.1146 12.6108 19.7439 13.1761C20.3733 13.7308 20.6879 14.4561 20.6879 15.3521C20.6879 16.0668 20.4639 16.7068 20.0159 17.2721C19.5679 17.8374 18.9066 18.2801 18.0319 18.6001C17.1679 18.9201 16.1173 19.0801 14.8799 19.0801C13.4186 19.0801 12.1279 18.8934 11.0079 18.5201C9.8986 18.1361 9.02927 17.6721 8.39994 17.1281L8.92794 16.4081C9.4826 16.8454 10.1813 17.2188 11.0239 17.5281C11.8666 17.8374 12.7733 17.9921 13.7439 17.9921C14.3733 17.9921 14.8479 17.9014 15.1679 17.7201C15.4986 17.5388 15.6639 17.2828 15.6639 16.9521C15.6639 16.3761 15.0933 15.9281 13.9519 15.6081L11.8719 15.0001C10.7413 14.6588 9.8666 14.1841 9.24794 13.5761C8.63994 12.9681 8.33594 12.2481 8.33594 11.4161C8.33594 10.7228 8.5546 10.0934 8.99194 9.5281C9.42927 8.96277 10.0639 8.5201 10.8959 8.2001C11.7386 7.86943 12.7466 7.7041 13.9199 7.7041C15.0399 7.7041 16.0693 7.8321 17.0079 8.0881C17.9573 8.3441 18.7306 8.65343 19.3279 9.0161L18.7999 9.7521C18.2986 9.4641 17.6959 9.21877 16.9919 9.0161C16.2986 8.81344 15.5679 8.7121 14.7999 8.7121C14.1279 8.7121 13.6106 8.81877 13.2479 9.0321C12.8959 9.23477 12.7199 9.51743 12.7199 9.8801C12.7199 10.1574 12.8533 10.4028 13.1199 10.6161C13.3866 10.8188 13.8933 11.0214 14.6399 11.2241L16.8959 11.8161Z" fill="#626262"/>
                            </svg>
                    </div>
                </div>
            </div>
        </div>

        <div id="map-slider" class="map-slider map-content">
            <div id="map" class="h-[100%] w-[100%]"></div>
        </div>
    </div>

    <div id="swipe-up-container" class="swipe-up">
        <p>Swipe up for map</p>
        <p class="flex justify-center">
            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0001 11.4C19.3895 11.4 19.762 11.5594 20.0309 11.8411L30.0059 22.2911C30.5493 22.8604 30.5283 23.7624 29.959 24.3058C29.3897 24.8492 28.4877 24.8282 27.9443 24.259L19.0001 14.8888L10.0559 24.259C9.51247 24.8282 8.61046 24.8492 8.04117 24.3058C7.47189 23.7624 7.45091 22.8604 7.99432 22.2911L17.9693 11.8411C18.2382 11.5594 18.6107 11.4 19.0001 11.4Z" fill="#2A2A2A"/>
            </svg>    
        </p>
    </div>
    
    <script src="{{asset('js/maskPrompt.js')}}"></script>
    <script>
        fetch('http://localhost:5000/get-weather-data')
            .then(response => response.json())
            .then(data => {
                console.log(data['weather'])
                document.body.style.backgroundImage = `url('/images/backgrounds/${data['weather']}.png')`;
            })
            .catch(error => console.error('Error fetching or processing data:', error));
                        

        const mapContainer = document.getElementById('map-container');
        let isMapOpen = false;


        let startY = 0;

            const swipeUpElement = document.getElementById('swipe-up-container');

            swipeUpElement.addEventListener('touchstart', (event) => {
                startY = event.touches[0].clientY;
            });

            swipeUpElement.addEventListener('touchend', (event) => {
                const endY = event.changedTouches[0].clientY;

                // Check if it was a swipe up
                if (startY - endY > 50) { // Threshold for swipe distance
                    console.log('Swipe up detected');
                    openMap();
                }
            });

            function openMap() {
                if (!isMapOpen) {
                    mapContainer.style.bottom = '0';
                    isMapOpen = true;
                } else {
                    mapContainer.style.bottom = '-95vh';
                    isMapOpen = false;
                }
                swipeUpElement.classList.toggle('hidden');
            }

    </script>
    <script>
        function getZone(pollutantType, value) {
            if (pollutantType === 'pm25') {
                if (value < 12) return 'green';
                else if (value < 35) return 'yellow';
                else if (value < 55) return 'orange';
                else return 'red';
            } else if (pollutantType === 'pm10') {
                if (value < 20) return 'green';
                else if (value < 50) return 'yellow';
                else if (value < 80) return 'orange';
                else return 'red';
            } else if (pollutantType === 'no2') {
                if (value < 25) return 'green';
                else if (value < 50) return 'yellow';
                else if (value < 75) return 'orange';
                else return 'red';
            }
            return 'gray';
        }

        const skopjeBounds = [
            [41.9500, 21.3500],  
            [42.0500, 21.5500]
        ];
        
        const map = L.map('map').setView([42.000, 21.445], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.setMinZoom(12);
        map.setMaxZoom(15);
        
        map.setMaxBounds(skopjeBounds);
        map.fitBounds(skopjeBounds);

        let voronoiLayer = null;

        function createVoronoiPolygons(pollutantType) {
        fetch('/api/sensors')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Filter the data based on the selected pollutant type (pm10, pm25, or no2)
                const filteredData = data.filter(sensor => sensor.type === pollutantType);

                // Transform API data into sensor objects (only for matching type)
                const sensors = filteredData.map(sensor => {
                    const [lat, lon] = sensor.position.split(',').map(coord => parseFloat(coord));
                    return {
                        id: sensor.sensorId,
                        coordinates: [lon, lat],
                        value: parseFloat(sensor.value),
                    };
                });

                // Define static geographic bounds for Skopje
                const skopjeBounds = [21.35, 41.95, 21.55, 42.05]; // [minLon, minLat, maxLon, maxLat]
                const points = sensors.map(sensor => sensor.coordinates);

                // Create Voronoi diagram using d3 with static bounds
                const delaunay = d3.Delaunay.from(points);
                const voronoi = delaunay.voronoi(skopjeBounds);

                // Convert Voronoi polygons to GeoJSON
                const geoJson = {
                    type: 'FeatureCollection',
                    features: sensors.map((sensor, i) => {
                        const cell = voronoi.cellPolygon(i);
                        if (!cell) return null;
                        return {
                            type: 'Feature',
                            properties: { id: sensor.id, value: sensor.value },
                            geometry: {
                                type: 'Polygon',
                                coordinates: [cell.map(coord => [coord[0], coord[1]])],
                            },
                        };
                    }).filter(feature => feature !== null), // Remove null features
                };

                // Define a color scale for the selected pollutant type
                const getColor = (value) => {
                    if (pollutantType === 'pm25') {
                        return value < 12 ? 'green' :
                            value < 35 ? 'yellow' :
                            value < 55 ? 'orange' : 'red';
                    } else if (pollutantType === 'pm10') {
                        return value < 20 ? 'green' :
                            value < 50 ? 'yellow' :
                            value < 80 ? 'orange' : 'red';
                    } else if (pollutantType === 'no2') {
                        return value < 25 ? 'green' :
                            value < 50 ? 'yellow' :
                            value < 75 ? 'orange' : 'red';
                    }
                    return 'gray';
                };

                // If there's an existing Voronoi layer, remove it
                if (voronoiLayer) {
                    map.removeLayer(voronoiLayer);
                }

                // Add Voronoi polygons to the map
                voronoiLayer = L.geoJSON(geoJson, {
                    style: feature => ({
                        fillColor: getColor(feature.properties.value),
                        fillOpacity: 0.5,
                        color: 'black',
                        weight: 0,
                    }),
                    onEachFeature: (feature, layer) => {
                        layer.bindPopup(`Sensor ID: ${feature.properties.id}<br>Value: ${feature.properties.value}`);
                    },
                }).addTo(map);
            })
            .catch(error => console.error('Error fetching or processing data:', error));
        }

        function showUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    position => {
                        const userLat = position.coords.latitude;
                        const userLon = position.coords.longitude;

                        // Add a marker to the map
                        const userMarker = L.marker([userLat, userLon]).addTo(map);
                        userMarker.bindPopup("You are here!").openPopup();

                        // Optionally, center the map on the user's location
                        map.setView([userLat, userLon], 13);

                        // Fetch the pollutant data (for the currently selected pollutant)
                        const pollutantType = 'pm25';  // This can be dynamically set based on user input
                        fetch('/api/sensors')
                            .then(response => response.json())
                            .then(data => {
                                // Filter sensors for the chosen pollutant type
                                const filteredData = data.filter(sensor => sensor.type === pollutantType);

                                // Convert the sensor data into coordinates and values
                                const sensors = filteredData.map(sensor => {
                                    const [lat, lon] = sensor.position.split(',').map(coord => parseFloat(coord));
                                    return {
                                        id: sensor.sensorId,
                                        coordinates: [lon, lat],
                                        value: parseFloat(sensor.value),
                                    };
                                });

                                // Calculate the closest sensor to the user's location
                                let closestSensor = null;
                                let closestDistance = Infinity;

                                sensors.forEach(sensor => {
                                    const distance = calculateDistance(userLat, userLon, sensor.coordinates[1], sensor.coordinates[0]);
                                    if (distance < closestDistance) {
                                        closestDistance = distance;
                                        closestSensor = sensor;
                                    }
                                });

                                // Get the zone for the closest sensor's pollution value
                                const zone = getZone(pollutantType, closestSensor.value);
                                console.log(`You are in a ${zone} zone based on ${pollutantType} level.`);
                            })
                            .catch(error => console.error('Error fetching pollution data:', error));
                    },
                    error => {
                        console.error("Error accessing geolocation: ", error);
                        alert("Could not access your location.");
                    }
                );
            } else {
                alert("Geolocation is not supported by your browser.");
            }
        }

        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371;
            const dLat = (lat2 - lat1) * (Math.PI / 180);
            const dLon = (lon2 - lon1) * (Math.PI / 180);
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c;
            return distance;
        }

        function changePollutant(pollutantType) {
            createVoronoiPolygons(pollutantType);
            showUserLocation();
        }

        changePollutant('pm25')

    </script>

</body>
</html>


