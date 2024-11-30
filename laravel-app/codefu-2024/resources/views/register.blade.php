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
        <h1 id="step-heading" class="font-inter text-[20px]">Create Account</h1>
    </div>
    <div>

        <div class="mt-[25px] flex justify-center w-full gap-[5px]" id="steps">
            <div
                class="step flex flex-col justify-center rounded-full border-[1px] w-[46px] h-[46px] text-center border-[#83C5C0]">
                <h1 class="text-xl text-center text-[#2a2a2a]">1</h1>
            </div>
            <div class="flex flex-row justify-center place-items-center ">
                <svg width="43" height="1" viewBox="0 0 43 1" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <line y1="0.5" x2="43" y2="0.5" stroke="#F3F3F3"></line>
                </svg>
            </div>
            <div
                class="step flex flex-col justify-center rounded-full border-[1px] w-[46px] h-[46px] text-center bg-[#3F8D8B]">
                <h1 class="text-xl text-center text-[#e2e2e2]">2</h1>
            </div>
            <div class="flex flex-row justify-center place-items-center ">
                <svg width="43" height="1" viewBox="0 0 43 1" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <line y1="0.5" x2="43" y2="0.5" stroke="#F3F3F3"></line>
                </svg>
            </div>
            <div
                class="step flex flex-col justify-center rounded-full border-[1px] w-[46px] h-[46px] text-center bg-[#3F8D8B]">
                <h1 class="text-xl text-center text-[#e2e2e2]">3</h1>
            </div>
        </div>

        <div class="my-[25px] flex justify-center w-full items-center mt-[36px]">
            <!-- Step 1 Content -->
            <form id="step-1" class="flex flex-col items-center">
                <input id="fullname" placeholder="Full Name" type="text"
                    class="w-[300px] h-[34px] border-[1px] rounded-[5px] mb-[25px]">
                <div id="error-message-fullname" class="hidden text-red-500 text-sm mb-[25px]"></div>
                <input id="email" placeholder="Email" type="text"
                    class="w-[300px] h-[34px] border-[1px] rounded-[5px]">
                <div id="error-message-email" class="hidden text-red-500 text-sm mb-[25px]"></div>
                <input id="password" placeholder="Enter Password" type="password"
                    class="w-[300px] h-[34px] border-[1px] rounded-[5px] mt-[25px]">
                <div id="error-message-password" class="hidden text-red-500 text-sm mb-[25px]"></div>
                <input id="passwrodconfirmation" placeholder="Confirm Password" type="password"
                    class="w-[300px] h-[34px] border-[1px] rounded-[5px] mt-[25px]">
                <div id="error-message-password-confirmation" class="hidden text-red-500 text-sm mb-[25px]"></div>
                <div class="mt-[58px] flex justify-center w-full items-center gap-[17px]">
                    <div>
                        <div class="w-[120px] h-[1px] bg-[#6E6E6E]"></div>
                    </div>
                    <div>
                        <h1 class="text-[14px] font-thin">or</h1>
                    </div>
                    <div>
                        <div class="w-[120px] h-[1px] bg-[#6E6E6E]"></div>
                    </div>
                </div>
                <div class="flex justify-center w-full mt-[32px] gap-[53px]">
                    <a href="{{ url('auth/facebook') }}">
                        <img src="{{ asset('images/facebook.svg') }}" alt="">
                    </a>
                    <a href="">
                        <img src="{{ asset('images/twitter.svg') }}" alt="">
                    </a>
                    <a href="{{ url('auth/redirect') }}">
                        <img src="{{ asset('images/google.svg') }}" alt="">
                    </a>
                </div>
            </form>

            <!-- Step 2 Content -->
            <form id="step-2" class="hidden flex flex-col items-center">
                <input id="healthstatus" placeholder="Health Status" type="text"
                    class="w-[300px] h-[34px] border-[1px] rounded-[5px]">
                <input id="birthdate" placeholder="Birthdate (YYYY-MM-DD)" type="date"
                    class="w-[300px] h-[34px] border-[1px] rounded-[5px] mt-[25px]">
            </form>

            <!-- Step 3 Content -->
            <div id="step-3" class="hidden text-center">
                <input type="text" name="avatarName" id="avatarName" placeholder="Name Your Smoggy!"
                    class="rounded-[10px] py-1">
                <div class="rounded-[10px] h-[50vh] border border-black	my-[25px] flex justify-center items-center">
                    <img src="{{ asset('/images/smoggy-20.svg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="flex justify-center w-full mt-[25px]">
            <button type="button" id="next"
                class="rounded-[10px] bg-[#3f8d8b] text-white py-[8px] px-[30px]">Next</button>
        </div>
        <div>
            <div class="flex justify-center w-full mt-[15px]">
                <button id="logIn">
                    <p class="text-sm text-center text-black">Log in</p>
                </button>
            </div>
        </div>
        <div class="flex flex-row justify-center place-items-center mt-[3px]">
            <div id="lineunderlogin" class="w-[37px] h-[1px] bg-black"></div>
        </div>

        <script>
            let currentStep = 0;
            const steps = document.querySelectorAll('.step');
            const stepContents = [
                document.getElementById('step-1'),
                document.getElementById('step-2'),
                document.getElementById('step-3')
            ];
            const loginButton = document.getElementById('logIn');
            const lineUnderLogin = document.getElementById('lineunderlogin');
            const heading = document.getElementById('step-heading');

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
                    steps[currentStep].style.backgroundColor = '#3F8D8B';
                    steps[currentStep].querySelector('h1').style.color = '#e2e2e2';
                    currentStep++;
                    steps[currentStep].style.backgroundColor = '#ffffff';
                    steps[currentStep].querySelector('h1').style.color = '#2a2a2a';

                    // Show the next step content
                    stepContents[currentStep].classList.remove('hidden');

                    // Hide login button and line under login if not on step 1
                    if (currentStep !== 0) {
                        loginButton.classList.add('hidden');
                        lineUnderLogin.classList.add('hidden');
                    }

                    // Update heading text based on the current step
                    if (currentStep === 1) {
                        heading.textContent = 'Additional Information';
                    } else if (currentStep === 2) {
                        heading.textContent = 'Make Your Smoggy';
                    }
                } else if (currentStep === 2) {
                    // Save final step data
                    dataStore.avatarName = FormData.avatarName.value;

                    // Submit data to backend
                    console.log('Submitting data:', dataStore);
                    sendData(dataStore);
                }

                // Update previous step indicators to green
                for (let i = 0; i < currentStep; i++) {
                    steps[i].style.backgroundColor = '#3F8D8B';
                    steps[i].querySelector('h1').style.color = '#e2e2e2';
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
