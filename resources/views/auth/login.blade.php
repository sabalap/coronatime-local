<x-session-layout>
<div class="md:ml-16 md:w-[448px] md:pl-0 pl-5 pt-5 pr-5 md:pr-0 pb-16 md:pb-0">
    <div class="md:w-72 xl:w-96">
    <h2 class="md:text-2xl md:mb-3 text-xl font-black">{{__('login.welcome')}}</h2>
    <p class="md:text-xl text-base text-zinc-500 mb-5">{{__('login.welcome_back')}}</p>
    <form id="form" method="POST" action="/">
        @csrf
        <div class="flex flex-col mb-4 relative lg">
            <x-label name="username" />
            <x-input placeholder="{{__('login.username_placeholder')}}" name="username" />
            <p class="hidden font-normal text-zinc-500 mt-2 text-sm">{{__('register.username_desc')}}</p>
            <img class="hidden absolute top-1/3 right-6 h-6 w-6" src="{{asset('checkbox-circle-fill.svg')}}" alt="">
                <div class="hidden items-center mt-2">
                    <img class="h-6 w-6 mr-2" src="{{asset('error-warning-fill.svg')}}" alt="">
                    <small>
                        Error message
                    </small>
                </div>
            @error("username")
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <div class="flex flex-col mb-5 relative">
            <x-label name="password" />
            <x-input placeholder="{{__('login.password_placeholder')}}" type="password" name="password" />
            <img class="hidden absolute top-1/3 right-6 h-6 w-6" src="{{asset('checkbox-circle-fill.svg')}}" alt="">
                <div class="hidden items-center mt-2">
                    <img class="h-6 w-6 mr-2" src="{{asset('error-warning-fill.svg')}}" alt="">
                    <small>
                        Error message
                    </small>
                </div>
            @error("password")
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between md:mb-10 mb-5">
            <div class="flex">
                <input class="mr-2" type="checkbox">
                <label class="font-semibold text-sm">{{__('login.remember_device')}}</label>
            </div>
            <div>
                <a href="{{route('forget.password.get')}}" class="text-blue-700 font-semibold text-sm">{{__('login.forgot_password')}}?</a>
            </div>
        </div>
       <x-button name="{{__('login.log_in')}}" />
       <div class="flex justify-center">
        <x-have-account name="{{__('login.have_account')}}?" />
        <a href={{route("createRegister")}} class="md:text-base font-bold text-sm">{{__('login.sign_up')}}</a>
       </div>
    </form>
    </div>
</div>
</x-session-layout>