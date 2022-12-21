<x-session-layout>
    <div class="md:pl-16 pl-5 pt-5 pr-5 pb-16 md:w-[32rem] md:pb-4">
        <div class="md:w-96 xl:w-5/6">
        <h2 class="md:text-2xl md:mb-3 text-xl font-black">{{__('register.welcome')}}</h2>
        <p class="md:text-xl text-base text-zinc-500 mb-5">{{__('register.required_info')}}</p>
        <form id="registerForm" method="POST" action="/register">
            @csrf
            <div class="flex flex-col mb-4 relative">
                <x-label name="username" />
                <x-input placeholder="{{__('register.enter_unique_username')}}" name="username" />
                <p class="hidden md:block font-normal text-zinc-500 mt-2 text-sm">{{__('register.username_desc')}}</p>
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
            <div class="flex flex-col mb-4 relative">
                <x-label name="email" />
                <x-input placeholder="{{__('register.email_placeholder')}}" name="email" />
                <img class="hidden absolute top-2/4 -translate-y-1/2 right-6 h-6 w-6" src="{{asset('checkbox-circle-fill.svg')}}" alt="">
                <div class="hidden items-center mt-2">
                    <img class="h-6 w-6 mr-2" src="{{asset('error-warning-fill.svg')}}" alt="">
                    <small>
                        Error message
                    </small>
                </div>
                @error("email")
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-4 relative">
                <x-label name="password" />
                <x-input placeholder="{{__('register.password_placeholder')}}" type="password" name="password" />
                <img class="hidden absolute top-2/4 -translate-y-1/2 right-6 h-6 w-6" src="{{asset('checkbox-circle-fill.svg')}}" alt="">
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
            <div class="flex flex-col mb-5 relative">
                <x-label name="password_confirmation" />
                <x-input placeholder="{{__('register.password_confirmation_placeholder')}}" type="password" name="password_confirmation" />
                <img class="hidden absolute top-2/4 -translate-y-1/2  right-6 h-6 w-6" src="{{asset('checkbox-circle-fill.svg')}}" alt="">
                <div class="hidden items-center mt-2">
                    <img class="h-6 w-6 mr-2" src="{{asset('error-warning-fill.svg')}}" alt="">
                    <small>
                        Error message
                    </small>
                </div>
                @error("password_confirmation")
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
           <x-button name="{{__('register.signup')}}" />
           <div class="flex justify-center">
            <x-have-account name="{{__('register.already_account')}}?" />
            <a href={{route("createLogin")}} class="md:text-base font-bold text-sm">{{__("register.login")}}</a>
           </div>
        </form>
    </div>
    </div>
</x-session-layout>