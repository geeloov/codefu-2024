<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="origin-trial" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Mask Detection</title>
    <style>
        #video {
            border: 1px solid #ddd;
        }

        #output {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .video-container {
            position: relative;
            display: inline-block;
        }

        #startCamera {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #3F8D8B;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            border: 1.2px solid black;
        }
    </style>
</head>

<body>
    <div class="mt-[30px] mr-[30px]">
        <div>
            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none">
                <g filter="url(#filter0_d_100_799)">
                    <path
                        d="M28.135 0H13.8819C7.69084 0 4 3.689 4 9.877V24.106C4 30.311 7.69084 34 13.8819 34H28.118C34.3091 34 37.9999 30.311 37.9999 24.123V9.877C38.017 3.689 34.3261 0 28.135 0ZM24.2741 24.021H15.9059C15.2086 24.021 14.6303 23.443 14.6303 22.746C14.6303 22.049 15.2086 21.471 15.9059 21.471H24.2741C26.4512 21.471 28.2371 19.703 28.2371 17.51C28.2371 15.317 26.4682 13.549 24.2741 13.549H15.6508L16.093 13.991C16.5863 14.501 16.5863 15.3 16.076 15.81C15.8209 16.065 15.4977 16.184 15.1746 16.184C14.8514 16.184 14.5282 16.065 14.2731 15.81L11.6028 13.124C11.1095 12.631 11.1095 11.815 11.6028 11.322L14.2731 8.653C14.7664 8.16 15.5828 8.16 16.076 8.653C16.5693 9.146 16.5693 9.962 16.076 10.455L15.5147 11.016H24.2741C27.8629 11.016 30.7883 13.94 30.7883 17.527C30.7883 21.114 27.8629 24.021 24.2741 24.021Z"
                        fill="black" fill-opacity="0.61" shape-rendering="crispEdges"></path>
                </g>
                <defs>
                    <filter id="filter0_d_100_799" x="0" y="0" width="42" height="42"
                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                        <feColorMatrix in="SourceAlpha" type="matrix"
                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                        <feOffset dy="4"></feOffset>
                        <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                        <feComposite in2="hardAlpha" operator="out"></feComposite>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                        </feColorMatrix>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_100_799"></feBlend>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_100_799" result="shape">
                        </feBlend>
                    </filter>
                </defs>
            </svg>
        </div>
    </div>
    <h1 class="text-[15px] font-bold text-[#626262] text-center">Wear a mask and save your health</h1>

    <!-- Webcam Video Feed -->
    <div class="flex justify-center items-center mt-4">
        <div class="video-container">
            <video class="w-64 h-[406px] rounded-[18px] border border-[#9e9d9d]" id="video" width="320"
                height="240" autoplay playsinline></video>
            <button class="bg-[#3F8D8B]" id="startCamera">Start Camera</button>
        </div>
    </div>
    <canvas id="canvas" style="display:none;"></canvas>

    <!-- Capture Button -->
    <div class="flex justify-center mt-4">
        <button class="border border-[#9e9d9d] p-[20px] rounded-[10px] bg-[#3F8D8B]" id="capture"><svg width="42"
                height="38" viewBox="0 0 42 38" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-[42px] h-[38px]" preserveAspectRatio="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M14.4251 0.764216C14.5756 0.307834 14.9979 0 15.4737 0H26.5263C27.0021 0 27.4244 0.307834 27.5749 0.764216L29.5335 6.70588H38.6842C40.5155 6.70588 42 8.20707 42 10.0588V34.6471C42 36.4989 40.5155 38 38.6842 38H3.31579C1.48455 38 0 36.4989 0 34.6471V10.0588C0 8.20706 1.48454 6.70588 3.31579 6.70588H12.4665L14.4251 0.764216ZM16.2703 2.23529L14.3117 8.17696C14.1613 8.63334 13.7389 8.94118 13.2632 8.94118H3.31579C2.70538 8.94118 2.21053 9.44158 2.21053 10.0588V34.6471C2.21053 35.2643 2.70537 35.7647 3.31579 35.7647H38.6842C39.2947 35.7647 39.7895 35.2644 39.7895 34.6471V10.0588C39.7895 9.44156 39.2947 8.94118 38.6842 8.94118H28.7368C28.2611 8.94118 27.8387 8.63334 27.6883 8.17696L25.7297 2.23529H16.2703Z"
                    fill="black" fill-opacity="0.2"></path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M21 15.1429C17.8441 15.1429 15.2857 17.5413 15.2857 20.5C15.2857 23.4587 17.8441 25.8571 21 25.8571C24.1559 25.8571 26.7143 23.4587 26.7143 20.5C26.7143 17.5413 24.1559 15.1429 21 15.1429ZM13 20.5C13 16.3579 16.5817 13 21 13C25.4183 13 29 16.3579 29 20.5C29 24.6421 25.4183 28 21 28C16.5817 28 13 24.6421 13 20.5Z"
                    fill="black" fill-opacity="0.2"></path>
            </svg></button>
    </div>

    <!-- Result Text -->
    <p id="resultText"></p>

    <script>
        const video = document.getElementById('video');
        const startCameraButton = document.getElementById('startCamera');
        const captureButton = document.getElementById('capture');
        const resultText = document.getElementById('resultText');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        let currentStream = null;

        // Start camera when button is clicked
        startCameraButton.addEventListener('click', () => {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(stream => {
                    video.srcObject = stream;
                    currentStream = stream;
                    adjustVideoOrientation();
                    startCameraButton.style.display = 'none'; // Hide the button after starting the camera
                })
                .catch(err => {
                    console.error("Error accessing webcam: ", err);
                    alert("Could not access the camera. Please check your permissions.");
                });
        });

        // Adjust video orientation based on the device orientation
        function adjustVideoOrientation() {
            const videoTrack = currentStream.getVideoTracks()[0];
            const settings = videoTrack.getSettings();

            // Check if the video is from the front camera
            if (settings.facingMode === 'user') {
                video.style.transform = 'scaleX(-1)'; // Flip horizontally if it's a front camera
            } else {
                video.style.transform = 'none'; // No flip for the rear camera
            }

            // Adjust for landscape orientation
            const orientation = window.orientation || 0;
            if (orientation === 90 || orientation === -90) {
                video.style.transform += ' rotate(90deg)';
            } else if (orientation === 180 || orientation === -180) {
                video.style.transform += ' rotate(180deg)';
            } else {
                video.style.transform += ' rotate(0deg)';
            }
        }

        const imageUrl = canvas.toDataURL("image/png"); // Now this is defined


        // Capture the image when the capture button is clicked
        captureButton.addEventListener('click', function() {
            // Set canvas size to match the video dimensions
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            // Draw the current frame of the video onto the canvas
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Get the image as a base64-encoded string
            const imageData = canvas.toDataURL('image/jpeg');

            // Send the captured image to the Flask API
            sendImageToServer(imageData);
        });

        // Function to send the image to the Flask API
        function sendImageToServer(imageData) {
            // Get CSRF token for Laravel
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send the image to the Laravel backend (which will forward it to Flask API)
            fetch('/detect-mask', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        image: imageData
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Display the result text returned from Flask (via Laravel)
                    if (data.result) {
                        resultText.textContent = data.result;
                    } else {
                        resultText.textContent = 'Error processing the image';
                    }

                    // Display the image URL
                    if (data.imageUrl) {
                        const imageElement = document.createElement('img');
                        imageElement.src = data.imageUrl;

                        // Redirect if the result is "The person is not wearing a mask."
                        window.location.href =
                            `/share_to_social_media?imageUrl=${encodeURIComponent(data.imageUrl)}&result=${encodeURIComponent(data.result)}`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    resultText.textContent = 'Error sending the image to the server';
                });
        }
    </script>
</body>

</html>
