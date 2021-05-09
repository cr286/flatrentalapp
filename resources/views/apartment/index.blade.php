@extends('layouts.app')

@section('content')
<div class="flex flex-col">
<div class="bg-white p-6 m-2 rounded-lg">
        <div class="text-2xl">Apartments</div>
        <a href="{{ route('apartment.create') }}" type="button" 
        class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 
        bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Add New Apartment</a>
   
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Created by
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Apartment Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Created Date
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Purpose
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Action</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200"> 
            @if ($apartments->count())
            @foreach ($apartments as $apartment)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $apartment->user->name }}
                    </div>
                    <div class="text-sm text-gray-500">
                     {{ $apartment->user->email }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  <a href="{{ route('apartments.show',$apartment) }}">
                    {{ $apartment->apartmentName }}</a></div> 
              </td>
              <td class="px-6 py-4 whitespace-nowrap"> 
                <div class="text-sm text-gray-900">{{ $apartment->created_at }}</div> 
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $apartment->purpose }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                 <td class="border px-8 py-4">

                    <form action="{{ route('apartments.edit',$apartment) }}" method="GET">
                      @csrf
                      <button type="submit" class="text-blue-500">Edit</button>
                  </form> 
                <form action="{{ route('apartment.destroy', $apartment) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-blue-500">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach 
          </tbody>
        </table>
        {{ $apartments->links() }}
        @else
        <p>There are no apartments</p>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
@endsection