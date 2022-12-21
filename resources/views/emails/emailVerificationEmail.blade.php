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
        <div style="display: flex; justify-content: center; margin: 10px; flex-direction: column;">
            <img src="{{asset('images/email-verification.png')}}" alt="">
            <h1 style="text-align: center">Confirmation email</h1>
            <p style="text-align: center; margin-bottom:8px">click this button to verify your email</p>
            <a style="text-align: center; width:340px; background-color:#059669; color:white; text-align:center; border-radius:4px; border:none; margin: auto; padding: 7px 12px; text-decoration: none;" href="{{ route('user.verify', $token) }}">
                VERIFY EMAIL
            </a>
        </div>
    </body>
</html>