<x-notification-layout>
    <img src="{{asset('images/sent-email.png')}}" alt="">
    <p class="mb-16 text-center">{{__('login.email_confirmation')}}</p>
    <a class="w-64 md:w-full text-center" href="{{route('createLogin')}}">
        <x-button name="{{__('login.sign_in')}}" />
    </a>
</x-notification-layout>