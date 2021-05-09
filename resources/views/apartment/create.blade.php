@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-3xl p-2">Add NEW Apartment</h1>
            <form action="{{ route('apartment') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="label">Apartment Name</label>
                    <input type="text" name="apartmentName" id="apartmentName" placeholder="Apartment Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('apartmentName') border-red-500 @enderror" value="{{ old('apartmentName') }}">

                    @error('apartmentName')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="location" class="label">Apartment Location</label>
                    <input type="text" name="location" id="location" placeholder="Apartment Address" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('location') border-red-500 @enderror" value="{{ old('location') }}">

                    @error('apartmentName')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="purpose" class="label">Apartment Purpose</label>
                    <input type="text" name="purpose" id="purpose" placeholder="Apartment Purpose" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('purpose') border-red-500 @enderror" value="{{ old('purpose') }}">

                    @error('purpose')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
 
                <div class="mb-4">
                    <label for="description" class="label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" placeholder="Add a desciption of your Apartment."></textarea>

                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
             
                <div class="mb-4">
                    <label for="price" class="label">Apartment Price</label>
                    <input type="number" name="price" id="price" placeholder="Apartment Price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="{{ old('price') }}">

                    @error('price')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="longitude" class="label">Location Longitude</label>
                    <input type="text" name="longitude" id="longitude" placeholder="Location Longitude" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('longitude') border-red-500 @enderror" value="{{ old('longitude') }}">

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
                    @error('latitude') border-red-500 @enderror" value="{{ old('latitude') }}">

                    @error('latitude')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>   

                  
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add Apartment</button>
                </div>
            </form>
        </div>
    </div>
@endsection