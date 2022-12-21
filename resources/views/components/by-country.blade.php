<x-dashboard-layout>
    <section>
        <div class="md:w-10/12 px-5 md:px-0 mx-auto">
            <h2 class="font-black text-xl md:text-2xl mt-12 mb-8">{{__('dashboard.stats_by_country')}}</h2>
            <div class="flex justify-between mb-6 md:mb-10">
                <div>
                    <a href="{{route('dashboard')}}">
                        <p class="font-normal md:text-base text-sm mb-1">{{__('dashboard.worldwide')}}</p>
                    </a>
                    <span class="bg-neutral-100 w-full block h-0.5"></span>
                </div>
                <div class="w-full">
                    <a href="{{route('dashboardByCountry')}}">
                        <p class="font-bold md:text-base text-sm mb-1 pl-8">{{__('dashboard.by_country')}}</p>
                    </a>
                    <div class="flex">
                        <span class="bg-black h-0.5 block w-28 md:w-24 ml-8"></span>
                        <span class="bg-neutral-100 h-0.5 block w-full"></span>
                    </div>
                </div>
            </div>
            <form action="{{route('dashboardByCountry')}}" class="relative mb-10">
                <input name="search" class="md:border md:pl-12 md:h-12 md:rounded-lg md:w-60 text-sm w-full font-medium pl-8" type="text" placeholder="{{__('dashboard.search_by_country')}}" >
                <img class="md:pl-5 absolute inset-y-1/2 md:-translate-y-2/4 -translate-y-1/2" src="{{asset('images/search.png')}}" alt="">
            </form>
        </div>
        <div class="h-14 md:w-10/12 px-5 mx-auto md:px-0 bg-neutral-100 md:rounded-t-lg">
            <div class="md:w-10/12 md:pl-8 items-center h-full flex justify-between">
                <div class="flex items-center w-[25%]">
                    <p class="text-[0.5rem] sm:text-sm font-semibold mr-1">{{__('dashboard.location')}}</p>
                    <div>
                        <a href="?sortLocation=desc">
                            @if(request()->query('sortLocation')) 
                                <img class="{{request()->query('sortLocation') === 'desc' ? 'rotate-180' : '' }}" src="{{request()->query('sortLocation') === 'asc' ? asset('arrow-drop-up-fill.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortLocation'))
                            <img src="{{asset('arrow-drop-up-fill.png')}}" alt="">
                            @endif
                        </a>
                        <a href="?sortLocation=asc">
                            @if(request()->query('sortLocation')) 
                                <img src="{{request()->query('sortLocation') === 'desc' ? asset('arrow-drop-down.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query())
                            <img src="{{asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortLocation') && request()->query())
                            <img src="{{asset('arrow-drop-down.png')}}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="flex items-center w-[25%]">
                    <p class="text-[0.5rem] sm:text-sm font-semibold mr-1">{{__('dashboard.new_cases_column')}}</p>
                    <div>
                        <a href="?sortNewCases=desc">
                            @if(request()->query('sortNewCases')) 
                            <img class="{{request()->query('sortNewCases') === 'desc' ? 'rotate-180' : '' }}" src="{{request()->query('sortNewCases') === 'asc' ? asset('arrow-drop-up-fill.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortNewCases'))
                            <img src="{{asset('arrow-drop-up-fill.png')}}" alt="">
                            @endif
                        </a>
                        <a href="?sortNewCases=asc">
                            @if(request()->query('sortNewCases')) 
                                <img src="{{request()->query('sortNewCases') === 'desc' ? asset('arrow-drop-down.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query())
                            <img src="{{asset('arrow-drop-down.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortNewCases') && request()->query())
                            <img src="{{asset('arrow-drop-down.png')}}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="flex items-center w-[25%]">
                    <p class="text-[0.5rem] sm:text-sm font-semibold mr-1">{{__('dashboard.death_column')}}</p>
                    <div>
                        <a href="?sortDeaths=desc">
                            @if(request()->query('sortDeaths')) 
                            <img class="{{request()->query('sortDeaths') === 'desc' ? 'rotate-180' : '' }}" src="{{request()->query('sortDeaths') === 'asc' ? asset('arrow-drop-up-fill.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortDeaths'))
                            <img src="{{asset('arrow-drop-up-fill.png')}}" alt="">
                            @endif
                        </a>
                        <a href="?sortDeaths=asc">
                            @if(request()->query('sortDeaths')) 
                                <img src="{{request()->query('sortDeaths') === 'desc' ? asset('arrow-drop-down.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query())
                            <img src="{{asset('arrow-drop-down.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortDeaths') && request()->query())
                            <img src="{{asset('arrow-drop-down.png')}}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="flex items-center w-[25%]">
                    <p class="sm:text-sm text-[0.5rem] font-semibold mr-1">{{__('dashboard.recovered_column')}}</p>
                    <div>
                        <a href="?sortRecovered=desc">
                            @if(request()->query('sortRecovered')) 
                            <img class="{{request()->query('sortRecovered') === 'desc' ? 'rotate-180' : '' }}" src="{{request()->query('sortRecovered') === 'asc' ? asset('arrow-drop-up-fill.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortRecovered'))
                            <img src="{{asset('arrow-drop-up-fill.png')}}" alt="">
                            @endif
                        </a>
                        <a href="?sortRecovered=asc">
                            @if(request()->query('sortRecovered')) 
                                <img src="{{request()->query('sortRecovered') === 'desc' ? asset('arrow-drop-down.png') : asset('arrow-drop-down-fill.png')}}" alt="">
                            @endif
                            @if(!request()->query())
                            <img src="{{asset('arrow-drop-down.png')}}" alt="">
                            @endif
                            @if(!request()->query('sortRecovered') && request()->query())
                            <img src="{{asset('arrow-drop-down.png')}}" alt="">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:h-[250px] md:overflow-y-scroll md:mb-28 md:w-10/12 mx-auto rounded-b-lg px-5 md:px-0 border-x border-y border-neutral-100">
            @if (!request()->query('search'))
                <div class="flex items-center md:pl-8 justify-center border-b border-neutral-100 md:w-10/12">
                    <div class="h-12 flex items-center w-[25%] lg:w-[26.5%]">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[4.918rem]">{{__('dashboard.worldwide')}}</p>
                    </div>
                    <div class="flex items-center w-[25%] lg:w-[27%]">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[5.852rem] w-[5.188rem]">{{number_format($totalConfirmed)}}</p>
                    </div>
                    <div class="flex items-center w-[25%] lg:w-[27%]">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[4.264rem] w-[3.813rem]">{{number_format($totalDeaths)}}</p>
                    </div>
                    <div class="flex items-center w-[25%]">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[5.756rem] w-[5.063rem]">{{number_format($totalRecovered)}}</p>
                    </div>
                </div>
            @endif
            @foreach ($countries as $country)
                <div class="flex items-center justify-center md:pl-8 border-b border-neutral-100 md:w-10/12">
                    <div class="h-16 flex items-center w-[25%] lg:w-[26.5%]">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[4.918rem] w-[4.389rem]">{{$country->name}}</p>
                    </div>
                    <div class="w-[25%] flex items-center lg:w-[27%]">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[5.852rem] w-[5.188rem]">{{number_format($country->confirmed)}}</p>
                    </div>
                    <div class="w-[25%] flex items-center lg:w-[27%]">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[4.264rem] w-[3.813rem]">{{number_format($country->deaths)}}</p>
                    </div>
                    <div class="w-[25%] flex items-center">
                        <p class="sm:text-sm text-[0.5rem] font-normal md:w-[5.756rem] w-[5.063rem]">{{number_format($country->recovered)}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-dashboard-layout>