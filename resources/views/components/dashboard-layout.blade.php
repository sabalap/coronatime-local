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
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('coronavirus-favicon.png')}}">


        @vite('resources/css/app.css')
    </head>
    <body class="md:overflow-hidden">
        <nav class="flex justify-between mx-auto px-5 md:px-0 pt-5 md:w-10/12 border-b border-neutral-100 pb-8">
            <img class="md:w-44 w-32" src="{{asset('images/dashboard-logo.svg')}}" alt="logo">
            <div class="flex w-36 md:w-72 justify-between items-center">
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
            <div class="flex flex-col items-center relative" x-data="{show: false}">
                <img @click="show = !show" class="md:hidden top-1 left-0 w-6 h-6" src="{{asset('images/menu-3-line.png')}}" alt="">
                <form class="mt-2 top-4 left-0 absolute w-14" x-show="show" method="POST" action="/logout">
                    @csrf
                    <button class="font-medium text-sm">{{__('dashboard.log_out')}}</button>
                </form>
            </div>
            <h3 class="hidden md:block font-bold">{{auth()->user()->username}}</h3>
            <form method="POST" action="/logout">
                @csrf
                <button class="hidden md:block font-medium text-sm">{{__('dashboard.log_out')}}</button>
            </form>
            </div>
        </nav>
        {{$slot}}
    </body>
</html>