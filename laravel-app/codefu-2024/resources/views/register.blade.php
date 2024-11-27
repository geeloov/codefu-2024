<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
        .hidden {
            display: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>
<body>
    <div class="mt-[30px] flex justify-center">
        <h1 class="font-inter text-[20px]">Create Account</h1>
    </div>
    <div class="mt-[25px] flex justify-center w-full gap-[30px]" id="steps">
        <div class="step flex flex-col justify-center rounded-full border-[1px] w-[46px] h-[46px] text-center bg-[#F9F9F9]">
            <h1 class="text-[#878787]">1</h1>
        </div>
        <div class="step flex flex-col justify-center rounded-full border-[1px] w-[46px] h-[46px] text-center bg-[#D9D9D9]">
            <h1 class="text-[#878787]">2</h1>
        </div>
        <div class="step flex flex-col justify-center rounded-full border-[1px] w-[46px] h-[46px] text-center bg-[#D9D9D9]">
            <h1 class="text-[#878787]">3</h1>
        </div>
    </div>
    <div class="mt-[72px] flex justify-center w-full items-center">
        <!-- Step 1 Content -->
        <form id="step-1" class="flex flex-col items-center">
            <input id="fullname" placeholder="Full Name" type="text" class="w-[300px] h-[34px] border-[1px] rounded-[5px] mb-[25px]">
            <div id="error-message-fullname" class="hidden text-red-500 text-sm mb-[25px]"></div>
            <input id="email" placeholder="Email" type="text" class="w-[300px] h-[34px] border-[1px] rounded-[5px]">
            <div id="error-message-email" class="hidden text-red-500 text-sm mb-[25px]"></div>
            <input id="password" placeholder="Enter Password" type="password" class="w-[300px] h-[34px] border-[1px] rounded-[5px] mt-[25px]">
            <div id="error-message-password" class="hidden text-red-500 text-sm mb-[25px]"></div>
            <input id="passwrodconfirmation" placeholder="Confirm Password" type="password" class="w-[300px] h-[34px] border-[1px] rounded-[5px] mt-[25px]">
            <div id="error-message-password-confirmation" class="hidden text-red-500 text-sm mb-[25px]"></div>
            <div class="mt-[58px] flex justify-center w-full items-center gap-[21px]">
                <div>
                    <div class="w-[140px] h-[1px] bg-[#6E6E6E]"></div>
                </div>
                <div>
                    <h1 class="text-[14px] font-thin">or</h1>
                </div>
                <div>
                    <div class="w-[140px] h-[1px] bg-[#6E6E6E]"></div>
                </div>
            </div>
            <div class="flex justify-center w-full mt-[32px] gap-[53px]">
                <a href="{{url('auth/facebook')}}">
                    <svg
  width="32"
  height="32"
  viewBox="0 0 32 32"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
  class="w-8 h-8 relative"
  preserveAspectRatio="xMidYMid meet"
>
  <circle cx="16" cy="16" r="14" fill="#9F9F9F"></circle>
  <path
    d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z"
    fill="white"
  ></path>
</svg>
                </a>
                <a href="">
                    <svg
  width="32"
  height="32"
  viewBox="0 0 32 32"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
  class="w-8 h-8 relative"
  preserveAspectRatio="none"
>
  <path
    d="M11.7887 28C8.55374 28 5.53817 27.0591 3 25.4356C5.15499 25.5751 8.95807 25.2411 11.3236 22.9848C7.76508 22.8215 6.16026 20.0923 5.95094 18.926C6.25329 19.0426 7.6953 19.1826 8.50934 18.856C4.4159 17.8296 3.78793 14.2373 3.92748 13.141C4.695 13.6775 5.99745 13.8641 6.50913 13.8174C2.69479 11.0882 4.06703 6.98276 4.74151 6.09635C7.47882 9.88867 11.5812 12.0186 16.6564 12.137C16.5607 11.7174 16.5102 11.2804 16.5102 10.8316C16.5102 7.61092 19.1134 5 22.3247 5C24.0025 5 25.5144 5.71275 26.5757 6.85284C27.6969 6.59011 29.3843 5.97507 30.2092 5.4432C29.7934 6.93611 28.4989 8.18149 27.7159 8.64308C27.7095 8.62731 27.7224 8.65878 27.7159 8.64308C28.4037 8.53904 30.2648 8.18137 31 7.68256C30.6364 8.52125 29.264 9.91573 28.1377 10.6964C28.3473 19.9381 21.2765 28 11.7887 28Z"
    fill="#939393"
  ></path>
</svg>
                </a>
                <a href="{{url('auth/redirect')}}">
                    <svg
  width="28"
  height="28"
  viewBox="0 0 28 28"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
  class="w-7 h-7 relative"
  preserveAspectRatio="none"
>
  <path
    d="M26.2512 14.2721C26.2512 13.2649 26.1678 12.5299 25.9873 11.7676H14.2512V16.3137H21.14C21.0012 17.4435 20.2512 19.1448 18.5845 20.2881L18.5612 20.4403L22.2719 23.2575L22.529 23.2826C24.89 21.1457 26.2512 18.0015 26.2512 14.2721Z"
    fill="#939393"
  ></path>
  <path
    d="M14.2505 26.25C17.6255 26.25 20.4587 25.161 22.5283 23.2828L18.5838 20.2882C17.5283 21.0096 16.1116 21.5132 14.2505 21.5132C10.945 21.5132 8.13947 19.3763 7.13938 16.4227L6.99279 16.4349L3.13432 19.3613L3.08386 19.4988C5.13939 23.5005 9.3616 26.25 14.2505 26.25Z"
    fill="#888888"
  ></path>
  <path
    d="M7.14005 16.4228C6.87617 15.6605 6.72345 14.8438 6.72345 14C6.72345 13.156 6.87617 12.3394 7.12617 11.5772L7.11918 11.4148L3.21235 8.44144L3.08452 8.50103C2.23734 10.1616 1.75122 12.0264 1.75122 14C1.75122 15.9736 2.23734 17.8382 3.08452 19.4988L7.14005 16.4228Z"
    fill="#8C8C8C"
  ></path>
  <path
    d="M14.2506 6.48663C16.5978 6.48663 18.1811 7.48024 19.0839 8.31057L22.6117 4.935C20.4451 2.96139 17.6255 1.75 14.2506 1.75C9.36164 1.75 5.1394 4.49942 3.08386 8.50106L7.12552 11.5772C8.1395 8.6236 10.945 6.48663 14.2506 6.48663Z"
    fill="#A2A2A2"
  ></path>
</svg>
                </a>
            </div>
        </form>

        <!-- Step 2 Content -->
        <form id="step-2" class="hidden flex flex-col items-center">
            <input id="healthstatus" placeholder="Health Status" type="text" class="w-[300px] h-[34px] border-[1px] rounded-[5px]">
            <input id="birthdate" placeholder="Birthdate (YYYY-MM-DD)" type="date" class="w-[300px] h-[34px] border-[1px] rounded-[5px] mt-[25px]">
        </form>

        <!-- Step 3 Content -->
        <div id="step-3" class="hidden text-center">
            <h2 class="font-inter text-[18px]">Pick Your Character</h2>
            <div class="flex justify-center gap-[20px] mt-[20px]">
                <div class="w-[60px] h-[60px] bg-blue-400 rounded-full"></div>
                <div class="w-[60px] h-[60px] bg-green-400 rounded-full"></div>
                <div class="w-[60px] h-[60px] bg-red-400 rounded-full"></div>
            </div>
        </div>
    </div>
    <div class="flex justify-center w-full mt-[38px]">
        <button type="button" id="next" class="border-[1px] border-black rounded-[5px] w-[125px] h-[38px] text-[#7E7E7E]">Next</button>
    </div>

    <script>
        const steps = document.querySelectorAll('.step');
        const stepContents = [
            document.getElementById('step-1'),
            document.getElementById('step-2'),
            document.getElementById('step-3')
        ];
        let currentStep = 0;
    
        // Collect form inputs
        const FormData = {
            fullname: document.querySelector('#fullname'),
            email: document.querySelector('#email'),
            password: document.querySelector('#password'),
            password_confirmation: document.querySelector('#passwrodconfirmation'),
            health_status: document.querySelector('#healthstatus'),
            birthdate: document.querySelector('#birthdate'),
        };
    
        // CSRF Token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
        // Function to send data
        const sendData = async (data) => {
    try {
        const response = await fetch('http://localhost:8000/register', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });

        if (response.ok) {
            const jsonResponse = await response.json();
            console.log('Registration successful:', jsonResponse);
        } else {
            const errorResponse = await response.json();
            console.error('Validation errors:', errorResponse.errors);
        }
    } catch (error) {
        console.error('Error:', error);
    }
};
    
        // Navigation button logic
        document.getElementById('next').addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                // Hide current step content
                stepContents[currentStep].classList.add('hidden');
    
                // Update the step indicator styles
                steps[currentStep].style.backgroundColor = '#D9D9D9';
                currentStep++;
                steps[currentStep].style.backgroundColor = '#F9F9F9';
    
                // Show the next step content
                stepContents[currentStep].classList.remove('hidden');
            }
    
            // If moving past the second step, submit the data
            if (currentStep === 2) {
                const data = {
                    fullname: FormData.fullname.value,
                    email: FormData.email.value,
                    password: FormData.password.value,
                    password_confirmation: FormData.password_confirmation.value,
                    health_status: FormData.health_status.value,
                    birthdate: FormData.birthdate.value,
                };
    
                console.log('Submitting data:', data);
                sendData(data);
            }
        });
    </script>
</body>
</html>
