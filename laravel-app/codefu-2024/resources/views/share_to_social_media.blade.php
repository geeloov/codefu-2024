<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share and Save Image</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body>
    <div class="mt-[55px] mx-[11px]">
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none">
            <path
                d="M33.7499 9.87631V9.877V24.123C33.7499 27.1672 32.843 29.5669 31.2039 31.2052C29.5648 32.8435 27.1639 33.75 24.118 33.75H9.88192C6.83607 33.75 4.43527 32.8435 2.79615 31.2032C1.15701 29.5628 0.25 27.1589 0.25 24.106V9.877C0.25 6.83275 1.1569 4.43314 2.79604 2.79482C4.43519 1.15649 6.83606 0.25 9.88192 0.25H24.135C27.1809 0.25 29.5817 1.15651 31.2187 2.79471C32.8556 4.43285 33.7583 6.83222 33.7499 9.87631ZM12.1185 10.766L12.2528 10.6318C12.8437 10.0412 12.8437 9.06682 12.2528 8.47618C11.6619 7.88561 10.6873 7.88561 10.0964 8.47618L7.42606 11.1452C6.83522 11.7357 6.83512 12.7098 7.42575 13.3005C7.42585 13.3006 7.42595 13.3007 7.42606 13.3008L10.0958 15.9863L10.0964 15.9868C10.4009 16.2912 10.7887 16.434 11.1746 16.434C11.5604 16.434 11.9483 16.2912 12.2528 15.9868C12.8602 15.3797 12.8602 14.4246 12.2727 13.8172L12.2728 13.8172L12.2698 13.8142L12.2546 13.799H20.2741C22.3302 13.799 23.9871 15.4552 23.9871 17.51C23.9871 19.5641 22.3139 21.221 20.2741 21.221H11.9059C11.0706 21.221 10.3803 21.9108 10.3803 22.746C10.3803 23.5812 11.0706 24.271 11.9059 24.271H20.2741C24 24.271 27.0383 21.253 27.0383 17.527C27.0383 13.8018 24.0008 10.766 20.2741 10.766H12.1185Z"
                fill="#3F8D8B" stroke="black" stroke-width="0.5"></path>
        </svg>
    </div>
    <div class="flex flex-row justify-center">
        <p class="text-[18px] font-bold text-[#626262]">Wear a mask and save your health</p>
    </div>
    @if ($imageUrl)
        <div class="flex flex-row justify-center mt-[15px]">
            <div class="flex flex-row justify-center">
                <div>
                    <div class="w-[10px]"></div>
                </div>
                {{-- <canvas class="w-64 h-[406px] rounded-[18px] object-none border border-[#9e9d9d]" id="myCanvas"
                    width="500" height="500"></canvas> --}}
                <canvas class="w-64 h-[406px] rounded-[18px] object-none border-none border-[#9e9d9d]" id="myCanvas"
                    width="100" height="100"></canvas>
            </div>
            <div>
                <div class="flex flex-col place-items-center ml-[10px] gap-[5px]">
                    <a href="#" onclick="shareToFacebook()">
                        <img class="w-[32px] h-[32px]" src="{{ asset('images/Facebook.png') }}" alt="Share on Facebook">
                    </a>
                    <a href="#" onclick="shareToTwitter()">
                        <img class="w-[32px] h-[32px]" src="{{ asset('images/Twitter.png') }}" alt="Share on Twitter">
                    </a>
                    <a href="#" onclick="shareToInstagram()">
                        <img class="w-[28px] h-[28px]" src="{{ asset('images/Instagram.png') }}"
                            alt="Share on Instagram">
                    </a>
                    <a href="#" id="saveBtn">
                        <img class="w-[28px] h-[28px]" src="{{ asset('images/Download.png') }}" alt="Download Image">
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-center mt-[10px]">
            <p class="text-[17px] font-bold text-[#6b6969]">Share and raise your voice !</p>
        </div>
        <div class="flex flex-row justify-center mt-[20px]">
            <button class="rounded-[10px] bg-[#d9d9d9]/[0.12] border border-black px-[20px] py-[10px]">Finish</button>
        </div>
        <br>
    @else
        <p>No image found to share.</p>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        const canvas = document.getElementById('myCanvas');
        const ctx = canvas.getContext('2d');

        @if ($imageUrl)
            // Load your image
            const image = new Image();
            image.src = "{{ url($imageUrl) }}"; // Get the absolute image URL from the Blade variable
            image.onload = function() {
                // Set canvas dimensions
                const canvasWidth = 75; // w-64 (64 * 4 = 256px)
                const canvasHeight = 125; // h-[406px]
                const scaleFactor = 4; // Increase this factor for higher resolution

                canvas.width = canvasWidth * scaleFactor;
                canvas.height = canvasHeight * scaleFactor;
                ctx.scale(scaleFactor, scaleFactor);

                // Calculate the aspect ratio
                const imageAspectRatio = image.width / image.height;
                const canvasAspectRatio = canvasWidth / canvasHeight;

                let drawWidth, drawHeight, offsetX, offsetY;

                if (imageAspectRatio > canvasAspectRatio) {
                    // Image is wider than canvas
                    drawWidth = canvasWidth;
                    drawHeight = canvasWidth / imageAspectRatio;
                    offsetX = 0;
                    offsetY = (canvasHeight - drawHeight) / 2;
                } else {
                    // Image is taller than canvas
                    drawWidth = canvasHeight * imageAspectRatio;
                    drawHeight = canvasHeight;
                    offsetX = (canvasWidth - drawWidth) / 2;
                    offsetY = 0;
                }

                // Draw the image on canvas
                ctx.drawImage(image, offsetX, offsetY, drawWidth, drawHeight);

                // Apply rounded corners
                // ctx.globalCompositeOperation = 'destination-in';
                // ctx.beginPath();
                // ctx.moveTo(18, 0);
                // ctx.lineTo(canvasWidth - 18, 0);
                // ctx.quadraticCurveTo(canvasWidth, 0, canvasWidth, 18);
                // ctx.lineTo(canvasWidth, canvasHeight - 18);
                // ctx.quadraticCurveTo(canvasWidth, canvasHeight, canvasWidth - 18, canvasHeight);
                // ctx.lineTo(18, canvasHeight);
                // ctx.quadraticCurveTo(0, canvasHeight, 0, canvasHeight - 18);
                // ctx.lineTo(0, 18);
                // ctx.quadraticCurveTo(0, 0, 18, 0);
                // ctx.closePath();
                // ctx.fill();

                // Reset composite operation to draw border
                ctx.globalCompositeOperation = 'source-over';
                ctx.lineWidth = 1;
                ctx.strokeStyle = '#9e9d9d';
                ctx.stroke();

                // Add circle with text in the center
                const circleX = 55; // Center of the canvas width
                const circleY = 22; // Center of the canvas height
                const circleRadius = 8; // Radius of the circle

                // Draw the circle
                ctx.beginPath();
                ctx.arc(circleX, circleY, circleRadius, 0, 2 * Math.PI, false);
                ctx.fillStyle = 'rgba(0, 0, 0, 0.5)'; // Semi-transparent black
                ctx.fill();
                ctx.lineWidth = 0.5;
                ctx.strokeStyle = 'black';
                ctx.stroke();

                // Function to fetch PM10 data from API and calculate AQI
                async function fetchPM10AndCalculateAQI() {
                    try {
                        const response = await fetch('http://localhost:8000/api/fetch-pm10');
                        
                        if (!response.ok) {
                            throw new Error('Failed to fetch PM10 data');
                        }

                        const data = await response.json();
                        
                        const pm10 = data['values']['pm10'];  // Assuming the PM10 data is in the 'pm10' field from the API response

                        if (pm10 !== undefined) {
                            return calculateAQI(pm10);  // Call your AQI calculation function and return the value
                        } else {
                            console.error('PM10 data not found');
                            return null;
                        }
                    } catch (error) {
                        console.error('Error fetching PM10 data:', error);
                        return null;
                    }
                }

                // AQI Calculation function based on the PM10 concentration
                function calculateAQI(pm10) {    
                    let Clow, Chigh, Ilow, Ihigh;

                    // Identify the breakpoints for PM10
                    if (pm10 >= 0 && pm10 <= 54) {
                        Clow = 0; Chigh = 54; Ilow = 0; Ihigh = 50;
                    } else if (pm10 >= 55 && pm10 <= 154) {
                        Clow = 55; Chigh = 154; Ilow = 51; Ihigh = 100;
                    } else if (pm10 >= 155 && pm10 <= 254) {
                        Clow = 155; Chigh = 254; Ilow = 101; Ihigh = 150;
                    } else if (pm10 >= 255 && pm10 <= 354) {
                        Clow = 255; Chigh = 354; Ilow = 151; Ihigh = 200;
                    } else if (pm10 >= 355 && pm10 <= 424) {
                        Clow = 355; Chigh = 424; Ilow = 201; Ihigh = 300;
                    } else if (pm10 >= 425 && pm10 <= 504) {
                        Clow = 425; Chigh = 504; Ilow = 301; Ihigh = 400;
                    } else if (pm10 >= 505) {
                        Clow = 505; Chigh = 1000; Ilow = 401; Ihigh = 500;
                    } else {
                        return "Invalid PM10 value";  // In case the PM10 value is outside valid ranges
                    }

                    // Apply the AQI formula
                    const aqi = ((Ihigh - Ilow) / (Chigh - Clow)) * (pm10 - Clow) + Ilow;

                    // Round to nearest whole number
                    return Math.round(aqi);
                }

                
                fetchPM10AndCalculateAQI().then(aqi => {
                    if (aqi !== null) {
                                    
                        ctx.fillStyle = '#FFFFFF'; 
                        ctx.fillText(aqi, 57, 22 );
                        ctx.fillText('AQI', 58, 22 + 5);
                    } else {
                        ctx.fillText('N/A', 57, 22);
                        ctx.fillText('AQI', 58, 22 + 5);
                    }
                }).catch(error => {
                    console.error('Error fetching AQI:', error);
                });


                // ctx.fillText(fetchPM10AndCalculateAQI(), circleX, circleY - 2);
                // ctx.fillText('AQI', circleX, circleY + 3);
                // Add text inside the circle
                ctx.font = '5px Arial';
                ctx.fillStyle = 'white';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText('25', circleX, circleY - 2);
                ctx.fillText('AQI', circleX, circleY + 3);


                //add text on left side
                ctx.font = '7px Arial';
                ctx.fillStyle = 'black';
                ctx.textAlign = 'left';
                ctx.textBaseline = 'middle';
                ctx.fillText('Skopje', 7, 20);

                ctx.font = '4px Arial';
                ctx.fillStyle = 'black';
                ctx.textAlign = 'left';
                ctx.textBaseline = 'middle';
                ctx.fillText('Macedonia', 8, 26);

                //addd text on bottom right
                ctx.font = '4px Arial'; // Font size and family
                ctx.fillStyle = 'black'; // Text color
                ctx.textAlign = 'right'; // Text alignment
                ctx.textBaseline = 'bottom'; // Text baseline
                ctx.fillText('#savesmoggy', 68, 110); // Text and position
            };
        @endif

        // Save image functionality
        document.getElementById('saveBtn').addEventListener('click', function() {
            const img = canvas.toDataURL('image/png');
            const a = document.createElement('a');
            a.href = img;
            a.download = 'image_with_text.png'; // Name of the downloaded image file
            a.click(); // Trigger the download
        });

        function shareToFacebook() {
            const imageUrl = "{{ url($imageUrl) }}"; // Get the absolute image URL from the Blade variable
            const fbUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(imageUrl)}`;
            window.open(fbUrl, "_blank");
        }

        function shareToTwitter() {
            const imageUrl = "{{ url($imageUrl) }}"; // Get the absolute image URL from the Blade variable
            const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(imageUrl)}`;
            window.open(twitterUrl, "_blank");
        }
    </script>
</body>

</html>
