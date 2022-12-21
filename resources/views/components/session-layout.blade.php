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
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('coronavirus-favicon.png')}}">
        @vite('resources/css/app.css')
        @if(request()->path() === "register")
        @vite("public/register.js")
        @else
        @vite("public/login.js")
        @endif
    </head>
    <body class="flex justify-center {{request()->path() === 'register' ? 'h-screen' : 'overflow-hidden'}}">
        <div class="md:flex w-full">
            <div class="md:flex-1">
            <img class="md:inline-block md:w-64 md:mb-10 md:pl-16 md:pt-8 pl-5 pt-5 pr-5 mb-5" src="{{asset('images/logo.png')}}" alt="coronatime Logo">
                {{$slot}}
            </div>
            <div class="text-center">
                <form>
                    <select class="bg-transparent"
                    onchange="window.location.href=this.options[this.selectedIndex].value;">>
                        @foreach (Config::get("languages") as $lang => $language)
                                <option {{$lang !== App::getLocale() ? "" : "selected"}} value="{{route('lang.switch', $lang)}}">
                                    {{$lang === 'en' ? __('dashboard.en') : __('dashboard.ka')}}
                                </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <img class="hidden md:block 2xl:w-1/2" src="{{asset('images/covid-background.png')}}" alt="">
        </div>
    </body>
</html>