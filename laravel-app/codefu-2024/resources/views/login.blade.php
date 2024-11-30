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
    <div class="mt-6 flex justify-center">
        <h1 class="font-inter text-[20px]">Log In</h1>
    </div>
    <div class="mt-[25px] flex justify-center w-full gap-[30px]" id="steps">
        <div class = "w-[235px] h-[130px] bg-black rounded-[12px]">
            <img src="{{asset('/images/login_background.png')}}" class="border-[1px] border-[#9E9B9B] rounded-[12px] " alt="">
        </div>
    </div>
    <div class="mt-[32px] flex justify-center w-full items-center">
        <form action="{{route('authenticate')}}" method="POST" class="flex flex-col items-center">
            @csrf
            <input id="email" placeholder="Email" name="email" type="email" class="w-[300px] h-[34px] border-[1px] rounded-[5px]">
            @error('email')
                <div class="text-[10px] text-red-500 mt-1 mx-7">*{{ $message }}</div>
            @enderror
            <input id="password" placeholder="Enter Password" name="password" type="password" class="w-[300px] h-[34px] border-[1px] rounded-[5px] mt-5">
            @error('password')
                <div class="text-[10px] text-red-500 mt-1 mx-7">*{{ $message }}</div>
            @enderror
            
            
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
                <a href="{{url('auth/facebook')}}">
                    <img src="{{ asset('images/facebook.svg') }}" alt="">
                </a>
                <a href="">
                    <img src="{{ asset('images/twitter.svg') }}" alt="">
                </a>
                <a href="{{url('auth/redirect')}}">
                    <img src="{{ asset('images/google.svg') }}" alt="">
                </a>
            </div>
            
            <button class=" mt-[36px] rounded-[10px] bg-[#3f8d8b] text-white py-[8px] px-[30px]" type="submit">
                Log In
            </button>
            
            <div>
                <div class="flex justify-center w-full mt-[15px]">
                    <a href="{{url('register')}}" class="text-sm text-center text-black">
                        {{-- <button id="register"><p class="text-sm text-center text-black">Sign up</p></button> --}}
                        Sign Up
                    </a>
                </div>
            </div>
        </form>

</body>
</html>