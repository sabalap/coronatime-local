<x-dashboard-layout>
    <section class="md:w-10/12 md:px-0 px-5 mx-auto">
        <h2 class="font-black text-xl md:text-2xl mt-12 mb-8">{{__('dashboard.worldwide_stats')}}</h2>
        <div class="flex justify-between mb-5 md:mb-8">
            <div>
                <a href="{{route('dashboard')}}">
                    <p class="font-bold md:text-base text-sm mb-1">{{__('dashboard.worldwide')}}</p>
                </a>
                <span class="bg-black h-0.5 block"></span>
            </div>
            <div class="w-full">
                <a href="{{route('dashboardByCountry')}}">
                    <p class="font-normal md:text-base text-sm mb-1 pl-8">{{__('dashboard.by_country')}}</p>
                </a>
                <span class="bg-neutral-100 w-full block h-0.5"></span>
            </div>
        </div>
        <div class="flex flex-col md:flex-row">
            <div class="relative md:w-full">
                <img class="w-full md:h-64" src="{{asset('images/new-cases.png')}}" alt="">
                <h3 class="font-medium md:text-xl text-base absolute top-1/2 left-1/2 -translate-x-1/2">{{__('dashboard.new_cases')}}</h3>
                <h2 class="text-blue-700 md:text-4xl font-black text-2xl absolute top-2/3 left-1/2 -translate-x-1/2">{{number_format($totalConfirmed)}}</h2>
            </div>
            <div class="hidden md:block md:relative w-full">
                <img class="w-full h-48 md:h-64" src="{{asset('images/recovered.png')}}" alt="">
                <h3 class="font-medium md:text-xl text-base absolute top-1/2 left-1/2 -translate-x-1/2">{{__('dashboard.recovered')}}</h3>
                <h2 class="text-green-500 md:text-4xl font-black text-2xl absolute top-2/3 left-1/2 -translate-x-1/2">{{number_format($totalRecovered)}}</h2>
            </div>
            <div class="hidden md:block md:relative w-full">
                <img class="w-full h-48 md:text-xl md:h-64" src="{{asset('images/death.png')}}" alt="">
                <h3 class="font-medium text-base absolute top-1/2 left-1/2 -translate-x-1/2">{{__('dashboard.death')}}</h3>
                <h2 class="text-yellow-400 md:text-4xl font-black text-2xl absolute top-2/3 left-1/2 -translate-x-1/2">{{number_format($totalDeaths)}}</h2>
            </div>
            <div class="flex md:hidden">
                <div class="relative w-full">
                    <img class="w-full h-48" src="{{asset('images/recovered.png')}}" alt="">
                    <h3 class="font-medium text-base absolute top-1/2 left-1/2 -translate-x-1/2">{{__('dashboard.recovered')}}</h3>
                    <h2 class="text-green-500 font-black text-2xl absolute top-2/3 left-1/2 -translate-x-1/2">{{number_format($totalRecovered)}}</h2>
                </div>
                <div class="relative w-full">
                    <img class="w-full h-48" src="{{asset('images/death.png')}}" alt="">
                    <h3 class="font-medium text-base absolute top-1/2 left-1/2 -translate-x-1/2">{{__('dashboard.death')}}</h3>
                    <h2 class="text-yellow-400 font-black text-2xl absolute top-2/3 left-1/2 -translate-x-1/2">{{number_format($totalDeaths)}}</h2>
                </div>
            </div>
        </div>
    </section>
</x-dashboard-layout>