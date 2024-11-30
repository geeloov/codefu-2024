<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style>
        .main{
            width: 85%;
        }
        
        .parent{
            display: flex;
            justify-content: center
        }
        .header{
            display: flex;
            justify-content: space-between;
            align-content: center;
        }
        .icon{
            width: 40px;
            height: 40px;
        }
        .coinDiv{
            display: flex;
            align-items: center;
            font-size: 20px;
        }
        .bigTasksDiv{
            background-color: #d9d9d9;
            border-radius: 14px;
            border: none;
        }

        .smallIcon{
            width: 20px;
            height: 20px;
        }

        .gpsTaskIcon{
            width: 50px;
            height: 35px;
        }

        .locationTaskIcon{
            width: 35px;
            height: 50px;
        }

        .taskDiv{
            display: flex;
            padding-bottom: 15px;
            padding-top: 15px;
            border: 1px solid #ccc;
        }

        .imageDiv{
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .taskNameDiv{
            width: 55%;
            display: flex;
            align-items: start;
            flex-direction: column;
            justify-content: space-around;
        }

        .rewardsDiv{
            width: 20%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .rewardsDiv div{
            display: flex;
            justify-content: end;
            align-items: center;
            padding-right: 10px;
        }

        .taskName{
            font-size: 20px;
        }

        .loremText{
            font-size: small;
        }

        .smallPadding{
            padding-right: 5px;
        }
        
        .todaysTasks{
            font-size: x-large;
            text-align: center;
            padding: 5px 0px 15px 0px;
            margin: 0px;
        }

        .reward{
            font-size: x-large;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ccc;;
            border: 1px solid black;
            border-radius: 15px;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 40px 80px;
        }

        .popup-content {
            text-align: center;
        }

        .popup button {
            margin: 10px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: x-large;
            border-radius: 15px;
            border: solid;
            border-width: 1px;
            border-color: black;
        }

        .popup h3{
            font-size: large;
        }
    </style>
</head>
<body>

    <div id="taskPopup" class="popup">
        <div class="popup-content">
            <h3 id="popup-header">Start your task</h3>
            <button id="startTaskBtn" class="start-velocity-task-btn">Start</button>
            <button id="stopTaskBtn" style="display: none;">Stop</button>
            <button id="closePopup">Close</button>
        </div>
    </div>


    <div class="w-[80%] mt-10 mx-auto">
        <div class="flex justify-between">
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
            
            <div>
                <div class="flex flex-row gap-1">
                    <span class="font-bold">{{Auth::user()->points}}                            
                    </span>
                    <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.1981 13.8615L25.1582 13.337C26.1091 12.8175 26.597 12.232 26.8233 11.6647C27.0516 11.0925 27.0627 10.4161 26.833 9.63064C26.3612 8.01797 24.9351 6.17571 23.0385 4.56754C21.1566 2.97186 18.9573 1.73075 17.1195 1.23362C16.198 0.98436 15.446 0.94354 14.8971 1.06856C14.389 1.18427 14.0535 1.43656 13.8437 1.86714L13.6479 2.26909L13.2178 2.39118C9.2695 3.51196 6.55485 4.41565 4.69107 5.24302C2.81286 6.0768 1.92886 6.77866 1.4901 7.42195C1.0754 8.02996 0.965341 8.72077 1.00899 9.83033C1.02522 10.2429 1.06023 10.6781 1.10002 11.1725C1.1147 11.355 1.13004 11.5456 1.14532 11.7461C1.19001 12.3326 1.23179 12.9783 1.2464 13.6874C2.5216 14.6277 3.5024 15.8532 4.33414 17.1218C4.92228 18.0187 5.47586 19.0055 6.00265 19.9445C6.28561 20.4489 6.56084 20.9395 6.82953 21.395C8.41706 24.0862 9.97461 25.9386 12.8026 25.9985C17.3849 24.619 21.4671 23.2047 23.8713 21.3676C25.0653 20.4553 25.7291 19.5243 25.9186 18.5484C26.1057 17.5851 25.8718 16.3626 24.8065 14.7707L24.1981 13.8615ZM12.9447 27C8.81072 27 6.99189 23.7553 5.1022 20.3841C3.78754 18.0388 2.43858 15.6323 0.251886 14.2146C0.251886 13.1003 0.173889 12.1312 0.1047 11.2715C-0.264555 6.68335 -0.382939 5.2124 12.9447 1.42919C15.7053 -4.23752 33.1913 8.42389 26.4757 13.6689C26.2295 13.8612 25.9508 14.0435 25.6376 14.2146C25.833 14.5066 26.0057 14.7918 26.1565 15.0705C29.575 21.3877 21.7639 24.3523 12.9447 27Z" fill="#626262"/>
                        <path d="M16.8959 11.8161C18.1653 12.1574 19.1146 12.6108 19.7439 13.1761C20.3733 13.7308 20.6879 14.4561 20.6879 15.3521C20.6879 16.0668 20.4639 16.7068 20.0159 17.2721C19.5679 17.8374 18.9066 18.2801 18.0319 18.6001C17.1679 18.9201 16.1173 19.0801 14.8799 19.0801C13.4186 19.0801 12.1279 18.8934 11.0079 18.5201C9.8986 18.1361 9.02927 17.6721 8.39994 17.1281L8.92794 16.4081C9.4826 16.8454 10.1813 17.2188 11.0239 17.5281C11.8666 17.8374 12.7733 17.9921 13.7439 17.9921C14.3733 17.9921 14.8479 17.9014 15.1679 17.7201C15.4986 17.5388 15.6639 17.2828 15.6639 16.9521C15.6639 16.3761 15.0933 15.9281 13.9519 15.6081L11.8719 15.0001C10.7413 14.6588 9.8666 14.1841 9.24794 13.5761C8.63994 12.9681 8.33594 12.2481 8.33594 11.4161C8.33594 10.7228 8.5546 10.0934 8.99194 9.5281C9.42927 8.96277 10.0639 8.5201 10.8959 8.2001C11.7386 7.86943 12.7466 7.7041 13.9199 7.7041C15.0399 7.7041 16.0693 7.8321 17.0079 8.0881C17.9573 8.3441 18.7306 8.65343 19.3279 9.0161L18.7999 9.7521C18.2986 9.4641 17.6959 9.21877 16.9919 9.0161C16.2986 8.81344 15.5679 8.7121 14.7999 8.7121C14.1279 8.7121 13.6106 8.81877 13.2479 9.0321C12.8959 9.23477 12.7199 9.51743 12.7199 9.8801C12.7199 10.1574 12.8533 10.4028 13.1199 10.6161C13.3866 10.8188 13.8933 11.0214 14.6399 11.2241L16.8959 11.8161Z" fill="#626262"/>
                        </svg>
                </div>
            </div>
        </div>
        
        
        <div class="h-[80vh] bg-[#D9D9D9] rounded-[14px] mt-[10px]">

            <div class="flex justify-end m-0 p-0">
                <a href="#" class="rounded-[12px] decoration-none border border-black m-[4px] p-[2px]">Badges</a>
            </div>

            <p class="todaysTasks">Today's Tasks</p>

            @if (session('success'))
                <div style="color: green; background-color: #d4edda; padding: 10px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div style="color: red; background-color: #f8d7da; padding: 10px; margin-bottom: 20px;">
                    {{ session('error') }}
                </div>
            @endif
    
            @foreach($gpsTasks as $task)
                @php
                    $requirements = json_decode($task->requirements, true);
                @endphp
                
                <div class="taskDiv" data-task-id="{{ $task->id }}" style="cursor: pointer;">
                    <div class="imageDiv">
                        <img src="{{ asset('/images/welcome_images/bike.png') }}" alt="" class="gpsTaskIcon">
                    </div>
                    <div class="taskNameDiv">
                        <div class="taskName">
                            Lat: {{ round($requirements['lat']) }}, Lng: {{ round($requirements['lng']) }}
                        </div>
                        <div class="loremText">Lorem Ipsum is simply dummy text of the printing</div>
                    </div>
                    <div class="rewardsDiv">
                        <div>
                            <span class="smallPadding reward">+{{ $task->points }}</span>
                            <img src="{{ asset('/images/welcome_images/ifTK7CcdDvL0.png') }}" alt="" class="smallIcon">
                        </div>
                        <div>
                            <span class="smallPadding">-{{ $task->negative_points }}</span>
                            <img src="{{ asset('/images/welcome_images/ifTK7CcdDvL0.png') }}" alt="" class="smallIcon">
                        </div>
                    </div>
                    

                    <form action="{{ route('tasks.complete') }}" method="POST" id="complete-task-form-{{ $task->id }}">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <input type="hidden" name="lat" id="lat-{{ $task->id }}">
                        <input type="hidden" name="lng" id="lng-{{ $task->id }}">
                    </form>
                </div>
            @endforeach

            @foreach($velocityTasks as $task)
                @php
                    $requirements = json_decode($task->requirements, true);
                @endphp

                <div class="taskDiv velocityTaskDiv" data-task-id="{{ $task->id }}" style="cursor: pointer;">
                    <div class="imageDiv">
                        <img src="{{ asset('/images/welcome_images/location.png') }}" alt="" class="locationTaskIcon">
                    </div>
                    <div class="taskNameDiv">
                        <div class="taskName">Speed {{ implode('-', $requirements['range']) }} kmh</div>
                        <div class="loremText">Lorem Ipsum is simply dummy text of the printing</div>
                    </div>
                    <div class="rewardsDiv">
                        <div><span class="smallPadding reward">+{{ $task->points }}</span> <img src="{{ asset('/images/welcome_images/ifTK7CcdDvL0.png') }}" alt="" class="smallIcon"></div>
                        <div><span class="smallPadding">-{{ $task->negative_points }}</span> <img src="{{ asset('/images/welcome_images/ifTK7CcdDvL0.png') }}" alt="" class="smallIcon"></div>
                    </div>

                    <form action="{{ route('tasks.velocity.complete') }}" method="POST" id="velocity-task-form-{{ $task->id }}">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                        <input type="hidden" name="total_distance" id="total-distance-{{ $task->id }}">
                        <input type="hidden" name="total_time" id="total-time-{{ $task->id }}">
                    </form>
                </div>
            @endforeach

        </div>
    </div>

<script>

document.querySelectorAll('.taskDiv').forEach(taskDiv => {
    taskDiv.addEventListener('click', function () {
        const taskId = taskDiv.getAttribute('data-task-id');
        const form = document.getElementById(`complete-task-form-${taskId}`);
        const latInput = document.getElementById(`lat-${taskId}`);
        const lngInput = document.getElementById(`lng-${taskId}`);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                latInput.value = userLat;
                lngInput.value = userLng;

                form.submit();
            }, function (error) {
                console.error('Unable to retrieve location:', error);
                alert('Unable to retrieve your location. Please enable GPS.');
            });
        } else {
            alert('Geolocation is not supported by your browser.');
        }
    });
});

document.querySelectorAll('.start-velocity-task-btn').forEach(startButton => {
    startButton.addEventListener('click', function () {
        const taskId = startButton.getAttribute('data-task-id');
        const stopButton = document.querySelector(`.stop-velocity-task-btn[data-task-id="${taskId}"]`);
        const distanceInput = document.getElementById(`total-distance-${taskId}`);
        const timeInput = document.getElementById(`total-time-${taskId}`);
        const form = document.getElementById(`velocity-task-form-${taskId}`);

        // Enable Stop Button and disable Start Button
        startButton.disabled = true;
        stopButton.disabled = false;

        let totalDistance = 0; // Total distance traveled (in meters)
        let totalTime = 0; // Total time elapsed (in seconds)
        let lastPosition = null; // Store the last position

        const trackingInterval = setInterval(() => {
            navigator.geolocation.getCurrentPosition(position => {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                if (lastPosition) {
                    // Calculate distance using Haversine formula
                    const distance = haversineDistance(
                        lastPosition.lat,
                        lastPosition.lng,
                        userLat,
                        userLng
                    );
                    totalDistance += distance;
                }
                lastPosition = { lat: userLat, lng: userLng };

                totalTime += 5; // Add 5 seconds per interval
                console.log(`Total Distance: ${totalDistance} meters, Total Time: ${totalTime} seconds`);
            });
        }, 5000); // Every 5 seconds

        stopButton.addEventListener('click', function () {
            // Stop Tracking
            clearInterval(trackingInterval);

            // Fill Hidden Inputs with total distance and total time
            distanceInput.value = totalDistance.toFixed(2); // Round distance to 2 decimals
            timeInput.value = totalTime;

            // Submit Form Automatically
            form.submit();
        });
    });
});

document.querySelectorAll('.velocityTaskDiv').forEach(taskDiv => {
    taskDiv.addEventListener('click', function () {
        const taskId = taskDiv.getAttribute('data-task-id');
        const popup = document.getElementById('taskPopup');
        const popupHeader = document.getElementById('popup-header');
        const startButton = document.getElementById('startTaskBtn');
        const stopButton = document.getElementById('stopTaskBtn');
        const closePopup = document.getElementById('closePopup');
        const form = document.getElementById(`velocity-task-form-${taskId}`);
        const distanceInput = document.getElementById(`total-distance-${taskId}`);
        const timeInput = document.getElementById(`total-time-${taskId}`);

        let trackingInterval = null;
        let totalDistance = 0;
        let totalTime = 0;
        let startCoordinates = null;
        let startTime = null;

        // Update the popup header with task-specific details
        const taskName = taskDiv.querySelector('.taskName').innerText;
        popupHeader.innerText = `Start your task: ${taskName}`;

        // Reset UI
        popup.style.display = 'block';
        startButton.style.display = 'block';
        stopButton.style.display = 'none';

        // Start Tracking
        startButton.onclick = () => {
            totalDistance = 0;
            totalTime = 0;
            startCoordinates = null;

            startTime = Date.now(); // Record the starting time
            startButton.style.display = 'none';
            stopButton.style.display = 'block';

            trackingInterval = setInterval(() => {
                navigator.geolocation.getCurrentPosition(position => {
                    const currentCoordinates = position.coords;

                    if (startCoordinates) {
                        // Calculate distance and add to total
                        const distance = calculateDistance(
                            startCoordinates.latitude,
                            startCoordinates.longitude,
                            currentCoordinates.latitude,
                            currentCoordinates.longitude
                        );
                        totalDistance += distance;
                    }
                    // Update coordinates for the next interval
                    startCoordinates = currentCoordinates;

                    // Calculate elapsed time
                    totalTime = Math.floor((Date.now() - startTime) / 1000);

                    console.log(`Total Distance: ${totalDistance.toFixed(2)} meters`);
                    console.log(`Elapsed Time: ${totalTime} seconds`);
                }, error => {
                    console.error("Geolocation error:", error.message);
                });
            }, 5000); // Update every 5 seconds
        };

        // Stop Tracking
        stopButton.onclick = () => {
            clearInterval(trackingInterval); // Stop interval
            trackingInterval = null;

            // Populate form with final values
            distanceInput.value = totalDistance.toFixed(2);
            timeInput.value = totalTime;

            console.log(`Form Data - Distance: ${distanceInput.value}, Time: ${timeInput.value}`);

            // Hide popup
            popup.style.display = 'none';

            // Submit the form to complete the task
            form.submit();
        };

        // Close Popup
        closePopup.onclick = () => {
            popup.style.display = 'none';
            if (trackingInterval) {
                clearInterval(trackingInterval); // Stop interval if tracking was active
            }
        };
    });
});

    let startCoordinates = null;
    let totalDistance = 0;
    let trackingInterval = null;
    let isTracking = false;


    function startTracking() {
        if (navigator.geolocation) {
            isTracking = true;
            startCoordinates = null;
            totalDistance = 0;

            document.getElementById('startBtn').disabled = true;
            document.getElementById('endBtn').disabled = false;

            document.getElementById('log').innerHTML = '';

            trackingInterval = setInterval(() => {
                navigator.geolocation.getCurrentPosition(trackPosition, handleError, {
                    enableHighAccuracy: true,
                });
            }, 5000);
        } else {
            alert('Geolocation is not supported by your browser.');
        }
    }

    function stopTracking() {
        if (isTracking) {
            isTracking = false;
            clearInterval(trackingInterval);

            document.getElementById('startBtn').disabled = false;
            document.getElementById('endBtn').disabled = true;
        }
    }

    function trackPosition(position) {
        const currentCoordinates = position.coords;
        let distanceThisInterval = 0;

        if (startCoordinates) {
            distanceThisInterval = calculateDistance(
                startCoordinates.latitude,
                startCoordinates.longitude,
                currentCoordinates.latitude,
                currentCoordinates.longitude
            );
            totalDistance += distanceThisInterval;

            const logDiv = document.getElementById('log');
            const distanceLog = document.createElement('p');
            distanceLog.textContent = `Traveled in last 5s: ${distanceThisInterval.toFixed(2)} meters`;
            logDiv.appendChild(distanceLog);

            document.getElementById('distance').textContent = totalDistance.toFixed(2);
        }

        startCoordinates = currentCoordinates;
    }


    function handleError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert('Permission to access geolocation was denied.');
                break;
            case error.POSITION_UNAVAILABLE:
                alert('Location information is unavailable.');
                break;
            case error.TIMEOUT:
                alert('The request to get user location timed out.');
                break;
            case error.UNKNOWN_ERROR:
                alert('An unknown error occurred.');
                break;
        }
    }

    function calculateDistance(lat1, lon1, lat2, lon2) {
        const R = 6371e3;
        const φ1 = (lat1 * Math.PI) / 180;
        const φ2 = (lat2 * Math.PI) / 180;
        const Δφ = ((lat2 - lat1) * Math.PI) / 180;
        const Δλ = ((lon2 - lon1) * Math.PI) / 180;

        const a =
            Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
            Math.cos(φ1) * Math.cos(φ2) *
            Math.sin(Δλ / 2) * Math.sin(Δλ / 2);

        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        const distance = R * c;
        return distance;
    }
</script>

</body>
</html>