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

    <div class="my-[25px] flex justify-center w-full items-center">
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
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 relative" preserveAspectRatio="xMidYMid meet">
                        <circle cx="16" cy="16" r="14" fill="#9F9F9F"></circle>
                        <path d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z" fill="white"></path>
                    </svg>
                </a>
                <a href="">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 relative" preserveAspectRatio="none">
                    <path d="M11.7887 28C8.55374 28 5.53817 27.0591 3 25.4356C5.15499 25.5751 8.95807 25.2411 11.3236 22.9848C7.76508 22.8215 6.16026 20.0923 5.95094 18.926C6.25329 19.0426 7.6953 19.1826 8.50934 18.856C4.4159 17.8296 3.78793 14.2373 3.92748 13.141C4.695 13.6775 5.99745 13.8641 6.50913 13.8174C2.69479 11.0882 4.06703 6.98276 4.74151 6.09635C7.47882 9.88867 11.5812 12.0186 16.6564 12.137C16.5607 11.7174 16.5102 11.2804 16.5102 10.8316C16.5102 7.61092 19.1134 5 22.3247 5C24.0025 5 25.5144 5.71275 26.5757 6.85284C27.6969 6.59011 29.3843 5.97507 30.2092 5.4432C29.7934 6.93611 28.4989 8.18149 27.7159 8.64308C27.7095 8.62731 27.7224 8.65878 27.7159 8.64308C28.4037 8.53904 30.2648 8.18137 31 7.68256C30.6364 8.52125 29.264 9.91573 28.1377 10.6964C28.3473 19.9381 21.2765 28 11.7887 28Z" fill="#939393"></path>
                    </svg>
                </a>
                <a href="{{url('auth/redirect')}}">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 relative" preserveAspectRatio="none">
                        <path d="M26.2512 14.2721C26.2512 13.2649 26.1678 12.5299 25.9873 11.7676H14.2512V16.3137H21.14C21.0012 17.4435 20.2512 19.1448 18.5845 20.2881L18.5612 20.4403L22.2719 23.2575L22.529 23.2826C24.89 21.1457 26.2512 18.0015 26.2512 14.2721Z" fill="#939393"></path>
                        <path d="M14.2505 26.25C17.6255 26.25 20.4587 25.161 22.5283 23.2828L18.5838 20.2882C17.5283 21.0096 16.1116 21.5132 14.2505 21.5132C10.945 21.5132 8.13947 19.3763 7.13938 16.4227L6.99279 16.4349L3.13432 19.3613L3.08386 19.4988C5.13939 23.5005 9.3616 26.25 14.2505 26.25Z" fill="#888888"></path>
                        <path d="M7.14005 16.4228C6.87617 15.6605 6.72345 14.8438 6.72345 14C6.72345 13.156 6.87617 12.3394 7.12617 11.5772L7.11918 11.4148L3.21235 8.44144L3.08452 8.50103C2.23734 10.1616 1.75122 12.0264 1.75122 14C1.75122 15.9736 2.23734 17.8382 3.08452 19.4988L7.14005 16.4228Z" fill="#8C8C8C"></path>
                        <path d="M14.2506 6.48663C16.5978 6.48663 18.1811 7.48024 19.0839 8.31057L22.6117 4.935C20.4451 2.96139 17.6255 1.75 14.2506 1.75C9.36164 1.75 5.1394 4.49942 3.08386 8.50106L7.12552 11.5772C8.1395 8.6236 10.945 6.48663 14.2506 6.48663Z" fill="#A2A2A2"></path>
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
            <input type="text" name="avatarName" id="avatarName" placeholder="Name Your Avatar !" class="rounded-[10px] py-1">
            <div class="rounded-[10px] h-[50vh] border border-black	my-[25px] flex justify-center items-center">
                <svg width="165" height="239" viewBox="0 0 165 239" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g filter="url(#filter0_d_11_241)">
                    <rect x="10" width="145" height="219" fill="url(#pattern0_11_241)" fill-opacity="0.5" shape-rendering="crispEdges"/>
                    </g>
                    <defs>
                    <filter id="filter0_d_11_241" x="0" y="0" width="165" height="239" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="10"/>
                    <feGaussianBlur stdDeviation="5"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_11_241"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_11_241" result="shape"/>
                    </filter>
                    <pattern id="pattern0_11_241" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_11_241" transform="matrix(0.00379077 0 0 0.002531 0.0401835 -0.0137923)"/>
                    </pattern>
                    <image id="image0_11_241" width="255" height="400" xlink:href="data:image/png;base64,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"/>
                    </defs>
                    </svg>                    
            </div>
        </div>
    </div>
    <div class="flex justify-center w-full mt-[25px]">
        <button type="button" id="next" class="bg-white rounded-[10px] px-[30px] text-[24px] border border-black text-[#7E7E7E]">Next</button>
    </div>

    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll('.step');
        const stepContents = [
            document.getElementById('step-1'),
            document.getElementById('step-2'),
            document.getElementById('step-3')
        ];
    
        let dataStore = {
            fullname: '',
            email: '',
            password: '',
            password_confirmation: '',
            health_status: '',
            birthdate: '',
            avatarName: ''
        };

        const FormData = {
            fullname: document.querySelector('#fullname'),
            email: document.querySelector('#email'),
            password: document.querySelector('#password'),
            password_confirmation: document.querySelector('#passwrodconfirmation'),
            health_status: document.querySelector('#healthstatus'),
            birthdate: document.querySelector('#birthdate'),
            avatarName: document.querySelector('#avatarName'),
        };
    
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
//         const sendData = async (data) => {
//             try {
//                 const response = await fetch('http://localhost:8000/register', {
//                 method: 'POST',
//                 headers: {
//                     'X-CSRF-TOKEN': csrfToken,
//                     'Content-Type': 'application/json',
//                 },
//                 body: JSON.stringify(data),
//         });

//         if (response.ok) {
//             const jsonResponse = await response.json();
//             console.log('Registration successful:', jsonResponse);
//         } else {
//             const errorResponse = await response.json();
//             console.error('Validation errors:', errorResponse.errors);
//         }
//     } catch (error) {
//         console.error('Error:', error);
//     }
// };
    
        // // Navigation button logic
        // document.getElementById('next').addEventListener('click', () => {
        //     if (currentStep < steps.length - 1) {
        //         // Hide current step content
        //         stepContents[currentStep].classList.add('hidden');
    
        //         // Update the step indicator styles
        //         steps[currentStep].style.backgroundColor = '#D9D9D9';
        //         currentStep++;
        //         steps[currentStep].style.backgroundColor = '#F9F9F9';
    
        //         // Show the next step content
        //         stepContents[currentStep].classList.remove('hidden');
        //     }
    
        //     // If moving past the second step, submit the data
        //     if (currentStep === 2) {
        //         const data = {
        //             fullname: FormData.fullname.value,
        //             email: FormData.email.value,
        //             password: FormData.password.value,
        //             password_confirmation: FormData.password_confirmation.value,
        //             health_status: FormData.health_status.value,
        //             birthdate: FormData.birthdate.value,
        //         };
    
        //         console.log('Submitting data:', data);
        //         sendData(data);
        //     }
        // });

    document.getElementById('next').addEventListener('click', () => {
    if (currentStep < steps.length - 1) {
        // Save data from the current step
            if (currentStep === 0) {
                dataStore.fullname = FormData.fullname.value;
                dataStore.email = FormData.email.value;
                dataStore.password = FormData.password.value;
                dataStore.password_confirmation = FormData.password_confirmation.value;
            } else if (currentStep === 1) {
                dataStore.health_status = FormData.health_status.value;
                dataStore.birthdate = FormData.birthdate.value;
            }

            // Hide current step content
            stepContents[currentStep].classList.add('hidden');

            // Update the step indicator styles
            steps[currentStep].style.backgroundColor = '#D9D9D9';
            currentStep++;
            steps[currentStep].style.backgroundColor = '#F9F9F9';

            // Show the next step content
            stepContents[currentStep].classList.remove('hidden');
        } else if (currentStep === 2) {
            // Save final step data
            dataStore.avatarName = FormData.avatarName.value;

            // Submit data to backend
            console.log('Submitting data:', dataStore);
            sendData(dataStore);
        }
    });

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
                window.location.href = '/tasks/gpsBased';
            } else {
                const errorResponse = await response.json();
                console.error('Validation errors:', errorResponse.errors);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    };


    </script>
</body>
</html>
