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


    <div class="w-[80%] mt-14 mx-auto">
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
        
        
        <div class="h-[80vh] bg-[#D9D9D9] rounded-[14px]">

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
                        <img src="{{ asset('/images/welcome_images/location.png') }}" alt="" class="locationTaskIcon">
                    </div>
                    <div class="taskNameDiv">
                        <div class="taskName">
                            Go near Brainster
                            {{-- Lat: {{ round($requirements['lat']) }}, Lng: {{ round($requirements['lng']) }} --}}
                        </div>
                        {{-- <div class="loremText">Lorem Ipsum is simply dummy text of the printing</div> --}}
                        <div class="loremText">Brainster is the nearest green zone.</div>
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
                        <img src="{{ asset('/images/welcome_images/bike.png') }}" alt="" class="gpsTaskIcon">
                    </div>
                    <div class="taskNameDiv">
                        {{-- <div class="taskName">Speed {{ implode('-', $requirements['range']) }} kmh</div>
                        <div class="loremText">Lorem Ipsum is simply dummy text of the printing</div> --}}
                        <div class="taskName">Use a bike today!</div>
                        <div class="loremText">Running will improve your health. Requirements: move in range {{ implode('-', $requirements['range']) }} kmh.</div>
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