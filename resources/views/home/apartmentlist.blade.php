@extends('layouts.guestlayout')

@section('content')
   

@if ($apartments->count())
@foreach ($apartments as $apartment) 

<!-- component -->
<section class="text-indigo-200 body-font p-5 bg-gray-900 m-3">
  <Link to="coursedet">
    <div class="mx-auto flex px-5  md:flex-row flex-col items-center jobcard">
      <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
        
      <figure class="visible">

      <div class="">

      <div class="pt-10 px-2 sm:px-6">
      <span class="inline-block py-1 px-2 rounded-full bg-green-600 text-white  text-xs font-bold tracking-widest mb-2">Featured Apartments</span>
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100"> <a href="{{ route('apartmentdetails',$apartment) }}">  {{ $apartment->apartmentName }}</a></h1>
          <p class="text-indigo-200 text-base pb-6">Purpose: <br>{{ $apartment->purpose }}</p>
          <p class="text-indigo-200 text-base pb-8">{{ $apartment->description }}</p>
          <div class="flex items-center justify-between">
              <div class="flex items-center pb-12">
                  <div class="h-12 w-12">
                      <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/testimonials/t_1.png" alt class="h-full w-full object-cover overflow-hidden rounded-full" />
                  </div>
                  <p class="text-indigo-200 font-bold ml-3">
                    {{ $apartment->user->name }}<br />
                      <span class="text-indigo-200 text-base font-light">{{ $apartment->created_at }}</span>
                  </p>
              </div>

          </div>
      </div>
      </div>
      </figure>
    
      </div>
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
        <img class="object-cover object-center rounded" alt="hero" src="https://tailwindcss.com/img/card-top.jpg" />
      </div>
    </div>
    </Link>
  </section>
@endforeach  
{{ $apartments->links() }}
@else
<p>There are no apartments</p>
@endif
   
@endsection