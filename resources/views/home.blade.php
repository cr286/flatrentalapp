@extends('layouts.guestlayout')

@section('content')

    {{-- INfo Part Start --}}
    <div class="bg-white dark:bg-gray-800 flex relative z-20 items-center overflow-hidden mb-20">
        <div class="container mx-auto px-6 flex relative py-16">
            <div class="sm:w-2/3 lg:w-2/5 flex flex-col relative z-20">
                <span class="w-20 h-2 bg-gray-800 dark:bg-white mb-12">
                </span>
                <h1 class="font-bebas-neue uppercase text-6xl sm:text-8xl font-black flex flex-col leading-none dark:text-white text-gray-800">
                    Search  
                    <span class="text-5xl sm:text-5xl">
                        Your Dream Home Apartment for Rent
                    </span>
                </h1>
                <p class="text-sm sm:text-base text-gray-700 dark:text-white">
                    Dream Home Apartment for Rent
                </p>
                <div class="flex mt-8">
                    <a href="#new_apartment_section" class="uppercase py-2 px-4 rounded-lg bg-pink-500 border-2 border-transparent text-white text-md mr-4 hover:bg-pink-400">
                        Get started
                    </a>
                    <a href="#" class="uppercase py-2 px-4 rounded-lg bg-transparent border-2 border-pink-500 text-pink-500 dark:text-white hover:bg-pink-500 hover:text-white text-md">
                        Read more
                    </a>
                </div>
            </div>
            <div class="hidden sm:block sm:w-1/3 lg:w-3/5 relative">
                <img src="https://images.unsplash.com/photo-1577641426510-fc825a63d17a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" class="max-w-xs md:max-w-sm m-auto"/>
            </div>
        </div>
    </div>
{{-- INfo Part END --}}

 
<div class="w-full min-h-screen bg-gray-50 p-12 mt-10" id= "new_apartment_section">
    <div class="header flex items-end justify-between mb-12">
        <div class="title">
            <p class="text-4xl font-bold text-gray-800 mb-4">
               Recently added Apartments
            </p>
            <p class="text-2xl font-light text-gray-400">
                 Search your dream apartment in Nepal.
            </p>
        </div>
        <div class="text-end">
            <form class="flex w-full max-w-sm space-x-3">
                <div class=" relative ">
                    <input type="text" id="&quot;form-subscribe-Search" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Enter a title"/>
                    </div>
                    <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
            @if ($apartments->count())
            @foreach ($apartments as $apartment)
            <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                <a href="{{  route('apartments.show',$apartment) }}" class="w-full block h-full">
                    <img alt="blog photo" src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="max-h-40 w-full object-cover"/>
                    <div class="bg-white dark:bg-gray-800 w-full p-4">
                        <p class="text-indigo-500 text-md font-medium">
                            {{ $apartment->apartmentName }}
                        </p>
                        <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                            {{ $apartment->created_at }}
                        </p>
                        <p class="text-gray-400 dark:text-gray-300 font-light text-md"> 
                           Purpose:  {{ $apartment->purpose }}
                        </p>
                        <div class="flex items-center mt-4">
                            <a href="#" class="block relative">
                                <img alt="profil" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                            </a>
                            <div class="flex flex-col justify-between ml-4 text-sm">
                                <p class="text-gray-800 dark:text-white">
                                    Created by 
                                </p>
                                <p class="text-gray-400 dark:text-gray-300">
                                    {{ $apartment->user->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div> 
            
            @endforeach 
            {{ $apartments->links() }}
            @else
            <p>There are no apartments</p>
            @endif
        </div>
    </div>


@endsection