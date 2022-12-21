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
            <form action="{{route('reset.password.post')}}" method="POST" class="flex w-full flex-col md:w-96 md:mx-auto">
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <input type="hidden" name="email" value="{{$email}}">
                <div class="mb-8 flex flex-col">
                    <x-label name="new_password" />
                    <x-input placeholder="{{__('register.new_password_placeholder')}}" type="password" name="new_password" />
                    @error("new_password")
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-8 flex flex-col">
                    <x-label name="password_confirmation" />
                    <x-input placeholder="{{__('register.repeat_password')}}" type="password" name="password_confirmation" />
                    @error("password_confirmation")
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="mt-56 md:mt-12 bg-green-600 md:w-96 xl:w-full w-full mb-5 h-12 rounded-lg text-white font-black text-sm">
                    {{__('register.save_changes')}}
                </button>
            </form>
        </div>
    </body>
</html>