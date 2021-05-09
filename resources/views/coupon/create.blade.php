@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-3xl p-2">Add NEW coupon</h1>
            <form action="{{ route('coupon') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="couponname" class="label">coupon Name</label>
                    <input type="text" name="couponname" id="couponname" placeholder="coupon Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('couponname') border-red-500 @enderror" value="{{ old('couponname') }}">

                    @error('couponname')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                
             
                <div class="mb-4">
                    <label for="couponprice" class="label">Coupon Price</label>
                    <input type="number" name="couponprice" id="couponprice" placeholder="coupon price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('couponprice') border-red-500 @enderror" value="{{ old('couponprice') }}">

                    @error('couponprice')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="mb-4">
                    <label for="validatedate" class="label">Last Coupon Date</label>
                    <input type="date" name="validatedate" id="validatedate" placeholder="Location validatedate" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('validatedate') border-red-500 @enderror" value="{{ old('validatedate') }}">

                    @error('validatedate')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
              

                  
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add coupon</button>
                </div>
            </form>
        </div>
    </div>
@endsection