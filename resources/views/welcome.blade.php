<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
</head>
<body class="">
    <div class="bg-blue-400 h-10 flex justify-center items-center border-b-2">
        @if (Route::has('login'))
        <nav class="space-x-10 text-white font-semibold sm:text-sm md:text-xl">
            @auth
                <a
                    href="{{ url('/home') }}"
                    class=""
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                    >
                        Register
                    </a>
                @endif
            @endauth 
        </nav>
    @endif
    </div>

    <div class="bg-[url('../assets/bg.jpg')] bg-no-repeat bg-cover bg-center brightness-50 text-pink-500 h-screen flex justify-center items-center sm:text-xl sm:text-black md:text-3xl lg:text-5xl font-bold uppercase">
        <div>Be prepared for your desir job interview</div> 
    </div>

</body>
</html>