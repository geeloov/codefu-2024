<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body>
    <div class="flex items-center justify-center h-[100vh]">
        <div class="w-[80%] mx-auto">
            <div class="flex justify-between">
                <div class="">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path
                            d="M33.7499 9.87631V9.877V24.123C33.7499 27.1672 32.843 29.5669 31.2039 31.2052C29.5648 32.8435 27.1639 33.75 24.118 33.75H9.88192C6.83607 33.75 4.43527 32.8435 2.79615 31.2032C1.15701 29.5628 0.25 27.1589 0.25 24.106V9.877C0.25 6.83275 1.1569 4.43314 2.79604 2.79482C4.43519 1.15649 6.83606 0.25 9.88192 0.25H24.135C27.1809 0.25 29.5817 1.15651 31.2187 2.79471C32.8556 4.43285 33.7583 6.83222 33.7499 9.87631ZM12.1185 10.766L12.2528 10.6318C12.8437 10.0412 12.8437 9.06682 12.2528 8.47618C11.6619 7.88561 10.6873 7.88561 10.0964 8.47618L7.42606 11.1452C6.83522 11.7357 6.83512 12.7098 7.42575 13.3005C7.42585 13.3006 7.42595 13.3007 7.42606 13.3008L10.0958 15.9863L10.0964 15.9868C10.4009 16.2912 10.7887 16.434 11.1746 16.434C11.5604 16.434 11.9483 16.2912 12.2528 15.9868C12.8602 15.3797 12.8602 14.4246 12.2727 13.8172L12.2728 13.8172L12.2698 13.8142L12.2546 13.799H20.2741C22.3302 13.799 23.9871 15.4552 23.9871 17.51C23.9871 19.5641 22.3139 21.221 20.2741 21.221H11.9059C11.0706 21.221 10.3803 21.9108 10.3803 22.746C10.3803 23.5812 11.0706 24.271 11.9059 24.271H20.2741C24 24.271 27.0383 21.253 27.0383 17.527C27.0383 13.8018 24.0008 10.766 20.2741 10.766H12.1185Z"
                            fill="#3F8D8B" stroke="black" stroke-width="0.5"></path>
                    </svg>
                </div>


                <div>
                    <div class="flex flex-row gap-1">
                        <span class="font-bold">67</span>
                        <img src="{{ asset('/images/coin_image/Group 57.png') }}" alt="">
                    </div>
                </div>
            </div>


            <div
                class="mt-[10px] shadow-lg bg-[#ffffff] rounded-[14px] text-center pt-[50px] overflow-y-scroll h-[76vh] border border-[#000000]">
                <p class="text-[25px] font-light  text-[#2a2a2a]">Settings</p>


                <form action="{{ route('user.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="flex justify-between mx-5 mt-10">
                        <div>
                            <p class="text-[22px] font-light  text-[#2a2a2a]">Music:</p>
                        </div>
                        <div class="">
                            <label for=""
                                class="w-[18px] h-[13px] text-[15px] font-light text-left text-[#2a2a2a]">on</label>
                            <input type="radio" name="music">
                        </div>
                        <div class="">
                            <label for=""
                                class="w-[18px] h-[13px] text-[15px] font-light text-left text-[#2a2a2a]"">off</label>
                            <input type="radio" name="music">
                        </div>
                    </div>

                    <div class="mt-4 flex flex-row justify-center place-content-center ">
                        <svg width="231" height="12" viewBox="0 0 231 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-[231px] h-3" preserveAspectRatio="none"
                            id="music-slider">
                            <line y1="5.5" x2="231" y2="5.5" stroke="#2E2E2E"></line>
                            <circle cx="93" cy="6" r="5.5" fill="white" stroke="#050505"
                                id="slider-circle"></circle>
                        </svg>
                    </div>

                    <div class="mt-7 w-[90%] mx-auto">
                        <hr class="border-1 border-[#000000] border-opacity-25">
                    </div>

                    <div class="flex justify-between mx-7 mt-4">
                        <label for="name" class="text-lg font-light text-left text-[#2a2a2a]">Name</label>
                        <input type="text" name="fullname" id="fullname"
                            value="{{ old('fullname', auth()->user()->fullname) }}"
                            class="w-[144px] h-[22px] border-1 border-[#797979] rounded-[5px] bg-transparent">
                    </div>
                    @error('fullname')
                        <div class="text-[10px] text-red-500 mt-1 mx-7">*{{ $message }}</div>
                    @enderror

                    <div class="mt-4 w-[90%] mx-auto">
                        <hr class="border-1 border-[#000000] border-opacity-25">
                    </div>

                    <div class="flex justify-between mx-7 mt-4">
                        <label for="name" class="font-light text-left text-[#2a2a2a]">Health</label>
                        <input type="text" name="health_status" id="health_status"
                            value="{{ old('health_status', auth()->user()->health_status) }}"
                            class="w-[144px] h-[22px] border-1 border-[#797979] rounded-[5px] bg-transparent">
                    </div>
                    @error('health_status')
                        <div class="text-[10px] text-red-500 mt-1 mx-7">*{{ $message }}</div>
                    @enderror

                    <div class="mt-4 w-[90%] mx-auto">
                        <hr class="border-1 border-[#000000] border-opacity-25">
                    </div>

                    <div class="flex justify-between mx-7 mt-4">
                        <label for="name" class="text-lg font-light text-left text-[#2a2a2a]">Email</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            class="w-[144px] h-[22px] border-1 border-[#797979] rounded-[5px] bg-transparent">
                    </div>
                    @error('email')
                        <div class="text-[10px] text-red-500 mt-1 mx-7">*{{ $message }}</div>
                    @enderror

                    <div class="mt-4 w-[90%] mx-auto">
                        <hr class="border-1 border-[#000000] border-opacity-25">
                    </div>

                    <div class="flex justify-between mx-7 mt-4">
                        <p class="text-lg font-light text-left text-[#797979]">
                            <span class="text-lg font-light text-left text-[#2a2a2a]">Change </span><br /><span
                                class="text-lg font-light text-left text-[#2a2a2a]">password</span>
                        </p>
                        <input type="password" name="password" id="password"
                            class="w-[144px] h-[22px] border-1 border-[#797979] rounded-[5px] bg-transparent my-5">
                    </div>
                    @error('password')
                        <div class="text-[10px] text-red-500 mt-1 mx-7">*{{ $message }}</div>
                    @enderror

                    <div class="flex flex-row justify-center">
                        <button type="submit"
                            class="w-[69px] border-l-1 border-r-1 border-t-1  border border-[#797979] rounded-tl-[5px] rounded-tr-[5px] rounded-[5px] bg-transparent">Save</button>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('music-slider');
            const circle = document.getElementById('slider-circle');

            slider.addEventListener('click', function(event) {
                const rect = slider.getBoundingClientRect();
                const offsetX = event.clientX - rect.left;
                const newCx = Math.max(5.5, Math.min(offsetX, 231 - 5.5));
                circle.setAttribute('cx', newCx);
            });

            circle.addEventListener('mousedown', function(event) {
                event.preventDefault();

                function onMouseMove(event) {
                    const rect = slider.getBoundingClientRect();
                    const offsetX = event.clientX - rect.left;
                    const newCx = Math.max(5.5, Math.min(offsetX, 231 - 5.5));
                    circle.setAttribute('cx', newCx);
                }

                function onMouseUp() {
                    document.removeEventListener('mousemove', onMouseMove);
                    document.removeEventListener('mouseup', onMouseUp);
                }

                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });
        });
    </script>

</body>

</html>
