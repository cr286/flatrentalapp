@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-3xl p-2">Apartment Details</h1>
            <form action="{{ route('apartments.update',$apartment)  }}"  method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="label">Apartment Name</label>
                    <input type="text" name="apartmentName" id="apartmentName" placeholder="Apartment Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('apartmentName') border-red-500 @enderror" value="{{ $apartment->apartmentName }}">

                    @error('apartmentName')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="location" class="label">Apartment Location</label>
                    <input type="text" name="location" id="location" placeholder="Apartment Address" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('location') border-red-500 @enderror" value="{{ $apartment->location }}">

                    @error('apartmentName')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="purpose" class="label">Apartment Purpose</label>
                    <input type="text" name="purpose" id="purpose" placeholder="Apartment Purpose" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('purpose') border-red-500 @enderror" value="{{ $apartment->purpose }}">

                    @error('purpose')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
 
                <div class="mb-4">
                    <label for="description" class="label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500
                     @enderror" placeholder="Add a desciption of your Apartment.">{{  $apartment->description}}</textarea>

                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
             
                <div class="mb-4">
                    <label for="Price" class="label">Apartment Price</label>
                    <input type="number" name="Price" id="price" placeholder="Apartment Price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('Price') border-red-500 @enderror" value="{{ $apartment->Price }}">

                    @error('Price')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="longitude" class="label">Location Longitude</label>
                    <input type="text" name="longitude" id="longitude" placeholder="Location Longitude" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('longitude') border-red-500 @enderror" value="{{ $apartment->longitude }}">

                    @error('longitude')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="latitude" class="label">Location Latitude</label>
                    <input type="text" name="latitude" id="latitude" placeholder="Location Latitude" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('latitude') border-red-500 @enderror" value="{{ $apartment->latitude }}">

                    @error('latitude')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>    
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Edit Apartment Details</button>
                </div>
            </form>
        </div>
    </div>
@endsection