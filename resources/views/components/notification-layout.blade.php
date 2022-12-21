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
    </head>
    <body>
        <div class="flex items-center flex-col">
            <img class="mr-auto ml-6 md:ml-0 md:mr-0 md:text-center mt-10 mb-60" src="{{asset('images/logo.png')}}" alt="logo">
            <div class="flex flex-col items-center">
                {{$slot}}
            </div>
        </div>
    </body>
</html>