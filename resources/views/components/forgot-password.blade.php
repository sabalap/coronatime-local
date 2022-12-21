<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coronatime</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">

        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="text-center">
            @foreach (Config::get("languages") as $lang => $language)
            <a href="{{route('lang.switch', $lang)}}">
                |{{$language}}
            </a>
            @endforeach
        </div>
        <img class="mr-auto md:mx-auto ml-6 md:text-center mt-10 mb-60" src="{{asset('images/logo.png')}}" alt="logo">
        <div class="px-6">
            <h1 class="text-center mb-10 -mt-48 font-black text-xl">{{__('register.reset_password')}}</h1>
            <form action="{{route('forget.password.post')}}" method="POST" class="flex flex-col md:w-96 md:mx-auto">
                @csrf
                <x-label name="email" />
                <x-input placeholder="{{__('register.email_placeholder')}}" type="email" name="email" />
                @error("email")
                <p class="text-red-500">{{$message}}</p>
                @enderror
                <button class="mt-56 md:mt-12 bg-green-600 md:w-96 xl:w-full w-full mb-5 h-12 rounded-lg text-white font-black text-sm">
                    {{__('register.reset_password')}}
                </button>
            </form>
        </div>
    </body>
</html>