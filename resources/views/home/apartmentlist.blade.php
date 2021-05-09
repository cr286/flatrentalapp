@extends('layouts.guestlayout')

@section('content')
 


@if ($apartments->count())
@foreach ($apartments as $apartment) 
<div class="bg-white dark:bg-gray-800 overflow-hidden">
  <div class="text-start w-1/2 py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
      <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
          <span class="block">
            <a href="{{ route('apartments.show',$apartment) }}">
              {{ $apartment->apartmentName }}</a></div> 
          </span>
          <span class="block text-indigo-500">
             {{ $apartment->created_at }}
          </span>
      </h2>
      <p class="text-xl mt-4 text-gray-400">
        {{ $apartment->purpose }}
      </p>
      <div class="lg:mt-0 lg:flex-shrink-0">
          <div class="mt-12 inline-flex rounded-md shadow">
              <a href="{{ route('apartments.show',$apartment) }}" class="py-4 px-6  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                  Book Now!!
              </a>
          </div>
      </div>
  </div>
  {{-- <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" class="absolute h-full max-w-1/2 hidden lg:block right-0 top-0"/> --}}
</div> 
@endforeach  
{{ $apartments->links() }}
@else
<p>There are no apartments</p>
@endif
   
@endsection