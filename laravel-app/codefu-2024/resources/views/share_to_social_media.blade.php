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
        <svg
  width="42"
  height="42"
  viewBox="0 0 42 42"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
  preserveAspectRatio="none"
>
  <g filter="url(#filter0_d_100_809)">
    <path
      d="M28.135 0H13.8819C7.69084 0 4 3.689 4 9.877V24.106C4 30.311 7.69084 34 13.8819 34H28.118C34.3091 34 37.9999 30.311 37.9999 24.123V9.877C38.017 3.689 34.3261 0 28.135 0ZM24.2741 24.021H15.9059C15.2086 24.021 14.6303 23.443 14.6303 22.746C14.6303 22.049 15.2086 21.471 15.9059 21.471H24.2741C26.4512 21.471 28.2371 19.703 28.2371 17.51C28.2371 15.317 26.4682 13.549 24.2741 13.549H15.6508L16.093 13.991C16.5863 14.501 16.5863 15.3 16.076 15.81C15.8209 16.065 15.4977 16.184 15.1746 16.184C14.8514 16.184 14.5282 16.065 14.2731 15.81L11.6028 13.124C11.1095 12.631 11.1095 11.815 11.6028 11.322L14.2731 8.653C14.7664 8.16 15.5828 8.16 16.076 8.653C16.5693 9.146 16.5693 9.962 16.076 10.455L15.5147 11.016H24.2741C27.8629 11.016 30.7883 13.94 30.7883 17.527C30.7883 21.114 27.8629 24.021 24.2741 24.021Z"
      fill="black"
      fill-opacity="0.61"
      shape-rendering="crispEdges"
    ></path>
  </g>
  <defs>
    <filter
      id="filter0_d_100_809"
      x="0"
      y="0"
      width="42"
      height="42"
      filterUnits="userSpaceOnUse"
      color-interpolation-filters="sRGB"
    >
      <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
      <feColorMatrix
        in="SourceAlpha"
        type="matrix"
        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
        result="hardAlpha"
      ></feColorMatrix>
      <feOffset dy="4"></feOffset>
      <feGaussianBlur stdDeviation="2"></feGaussianBlur>
      <feComposite in2="hardAlpha" operator="out"></feComposite>
      <feColorMatrix
        type="matrix"
        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
      ></feColorMatrix>
      <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_100_809"></feBlend>
      <feBlend
        mode="normal"
        in="SourceGraphic"
        in2="effect1_dropShadow_100_809"
        result="shape"
      ></feBlend>
    </filter>
  </defs>
</svg>
    </div>
    <div class="flex flex-row justify-center">
        <p class="text-[18px] font-bold text-[#626262]">Wear a mask and save your health</p>
    </div>
    @if($imageUrl)
        <div class="flex flex-row justify-center mt-[15px]">
            <div class="flex flex-row justify-center">
                <div>
                    <div class="w-[10px]"></div>
                </div>
            <canvas class="w-64 h-[406px] rounded-[18px] object-none border border-[#9e9d9d]" id="myCanvas" width="500" height="500"></canvas>
            </div>
            <div>
                <div class="flex flex-col place-items-center ml-[10px]">
                    <a href="#" onclick="shareToFacebook()">
                        <img class="w-[32px] h-[32px]" src="{{ asset('images/Acc Services.png') }}" alt="Share on Facebook">
                    </a>
                    <a href="#" onclick="shareToInstagram()">
                        <img class="w-[28px] h-[28px]" src="{{ asset('images/INSTAGRAM.png') }}" alt="Share on Instagram">
                    </a>
                    <a href="#" onclick="shareToTwitter()">
                        <img class="w-[32px] h-[32px]" src="{{ asset('images/twitter.png') }}" alt="Share on Twitter">
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
        
        @if($imageUrl)
        // Load your image
        const image = new Image();
        image.src = "{{ url($imageUrl) }}"; // Get the absolute image URL from the Blade variable
        image.onload = function() {
            // Draw the image on canvas
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
            
            // Add text overlay
            ctx.font = '15px Sans-Serif'; // Font size and style
            ctx.fillStyle = 'white';
            ctx.fillText('Skopje', 155, 80); // Position of the text (x, y)
            ctx.fillText('Macedonia', 150, 100); // Position of the text (x, y)
            // create an circle with content inside of it
            ctx.beginPath();
            ctx.arc(320, 100, 40, 0, 2 * Math.PI);
            ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
            ctx.fill();
            ctx.fillStyle = 'white';
            ctx.font = '35px Sans-Serif'; // Font size and style
            ctx.fillText('98', 300, 100); // Position of the text (x, y)
            ctx.font = '20px Sans-Serif'; // Font size and style
            ctx.fillText('AQI', 300, 120); // Position of the text (x, y)
            ctx.closePath();
        };
        @endif

        // Save image functionality
        document.getElementById('saveBtn').addEventListener('click', function() {
            html2canvas(canvas, {
                onrendered: function(canvas) {
                    const img = canvas.toDataURL('image/png');
                    const styledImage = new Image();
                    styledImage.src = img;
                    styledImage.style.borderRadius = '10px'; // Set your desired border radius
                    styledImage.style.width = '300px'; // Set your desired width
                    styledImage.style.height = '300px'; // Set your desired height

                    const a = document.createElement('a');
                    a.href = styledImage.src;
                    a.download = 'image_with_text.png'; // Name of the downloaded image file
                    a.click(); // Trigger the download
                }
            });
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