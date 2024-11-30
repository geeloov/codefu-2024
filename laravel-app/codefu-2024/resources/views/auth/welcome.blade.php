<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
            #welc {
                text-align: center;
                color: ##2a2a2a;
                font-size: 35px
            }
            .ptext {
                color: #2a2a2a;
                font-size: 25px
            }
            .buttons_div{
                display: flex;
                justify-content: space-between;
                margin-top: 90px;
            }
            .btn{
                font-size: 18px;
                border-radius: 10px;
                padding: 10px 25px;
                width: 45%;
                text-align: center;
                border: 1px solid;
                text-decoration: none;
                filter: drop-shadow(0px 7px 4px rgba(0,0,0,0.5));
            }
            .main{
                width: 80%;
            }
            .parent{
                display: flex;
                justify-content: center
            }
            .first-btn{
                background-color: #3f8d8b;
                border-color: #3f8d8b;
                color: white;
            }
            .second-btn{
                background-color: white;
                border-color: #d9d9d9;
                color: #3f8d8b;
            }
            * {box-sizing:border-box}

            .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
            border: 2px solid #000000;
            border-radius: 25px;
            padding: 10px 15px; 
            }

            /* Hide the images by default */
            .mySlides {
            display: none;
            }

            /* Next & previous buttons */
            .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
            right: 0;
            border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
            }

            /* Caption text */
            .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
            background-color: #717171;
            }

            /* Fading animation */
            .fade {
            animation-name: fade;
            animation-duration: 1.5s;
            }

            @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
            }

            .divtext{
                margin-top: 40px;
            }
    </style>
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script> --}}
</head>
<body>
    <div class="parent">
        <div class="main">
            <div class="wrapper">
                <div>
                    <p id="welc">Welcome</p>
                </div>
                
                
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="{{asset('/images/welcome_images/welcome3.png')}}" style="width:100%;">
                </div>
              
                <div class="mySlides fade">
                  <div class="numbertext">2 / 3</div>
                  <img src="{{asset('/images/welcome_images/welcome2.png')}}" style="width:100%;">
                </div>
              
                <div class="mySlides fade">
                  <div class="numbertext">3 / 3</div>
                  <img src="{{asset('/images/welcome_images/welcome3.png')}}" style="width:100%;">
                </div>
              
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
              <br>
              
              <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <div class="divtext">
                <span class="ptext">Be ready to save Smoggy,</span>
                <br>
                <span class="ptext">Stay safe</span>
            </div>
            <div class="buttons_div">
                <a class="btn first-btn" href="{{ url('login') }}">Log In</a>
                <a class="btn second-btn" href="{{ url('register') }}">Sign Up</a>
            </div>
            </div>
        </div>
    </div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

let autoSlideInterval = 5000; 
setInterval(() => {
  plusSlides(1);
}, autoSlideInterval);
</script>
</body>
</html>