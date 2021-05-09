@extends('layouts.app')
<style>
 
#map {
  height: 500px;
  width: 70%;
}
</style>
@section('content') 
    <div class="flex justify-center">
<div class="w-8/12 bg-white p-6 rounded-lg">  
 
<div class="mb-4">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <div class="text-2xl">Apartment Details</div>  
        @if ($booking!=null) 
          <p  class="text-red-500 mt-2 text-sm">Unavailable!! Already Booked Apartment</p>
           
          {{-- need to check if user is same --}}
         
          <form action="{{ route('booking.destroy',$booking) }}" method="post">
            @csrf 
            <div>
              @method('DELETE')
            <button type="submit" class="bg-blue-500 text-white p-4 py-3 rounded font-medium m-4">Cancel BOOKING</button>
            </div>  
            </form>
          {{-- need to check if user is same --}}
        @else
        <button id="payment-button" class="bg-purple-500 text-white p-4 py-3 rounded font-medium m-4">
          Advance Pay With Khalti
        </button>
        <form action="{{ route('booking.create',$apartment) }}" method="post">
          @csrf 
          <div>
            <div class="mb-4">
              <label for="couponname" class="label">Coupon Name</label>
              <input type="text" name="couponname" id="couponname" placeholder="coupon Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('couponname') border-red-500 @enderror" value="{{ old('couponname') }}">

              @error('couponname')
                  <div class="text-red-500 mt-2 text-sm">
                      {{ $message }}
                  </div>
              @enderror
          </div> 
          <button type="submit" class="bg-blue-500 text-white p-4 py-3 rounded font-medium m-4">APPLY FOR BOOKING</button>
          </div>  
          </form>
        @endif 
    </div> 
    <table class="shadow-lg bg-white">
        <thead>
          <tr>
            <th class="bg-blue-100 border text-left px-8 py-4">Created by </th>
            <th class="bg-blue-100 border text-left px-8 py-4">ApartmentName</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Created Date</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Purpose</th>
          </tr>
        </thead>
        <tbody>
             
            <td class="border px-8 py-4"> <a href="{{ route('apartment.create', $apartment->user) }}"
                 class="font-bold">{{ $apartment->user->name }}</a> 
            </td>
            <td class="border px-8 py-4">{{ $apartment->apartmentName }}</td>
            <td class="border px-8 py-4">{{ $apartment->created_at }}</td>
            <td class="border px-8 py-4">{{ $apartment->purpose }}</td>
          </tr>
 
        </tbody>
      </table> 
      <div class="p-6 m-6">
        <h1>Description</h1>
        <p class="text-xl">{{ $apartment->description }}</p>
        <h1>Location Details</h1>
        <p class="text-xl">{{ $apartment->location }}</p>
      </div>

      <div id="map" class="shadow-lg bg-white p-6 m-6"></div> 
    </div> 

    @if ($comments->count())
    @foreach ($comments as $comment) 
    <div class="mb-4">
    <a href="" class="font-bold">{{ $comment->user->name }}</a>
    <span class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</span> 
    <p class="mb-2">{{ $comment->description }}</p> 
    </div> 
    @endforeach 
        {{ $comments->links() }}
    @else
        <p>There are no comments</p>
    @endif
       
    
    
    <div class="mb-4">
    <form action="{{ route('comment.create',$apartment) }}" method="post">
    @csrf
    <label for="comment" class="label">Add a Comment/Review</label>
    <textarea name="comment" id="comment" cols="30" rows="4" 
    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" 
    placeholder="Add a review or comment !">
  </textarea>
  @error('comment')
  <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
  </div> 
  
  
@enderror 
    <div>
    <button type="submit" class="bg-blue-500 text-white p-4 py-3 rounded font-medium w-full">Add Comment</button>
    </div>  
    </form>
  </div>
</div>
    </div>

 {{-- MAP START --}}
 <script>
  let map;

  function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: {lat: {{ $apartment->longitude }}, lng: {{ $apartment->latitude }} },
      zoom: 13,
    });
    const image =
      "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
    
   var marker = new google.maps.Marker({ 
      // position: { lat: 27.7172, lng: 85.3485 }, 
      position: { lat: {{ $apartment->longitude }}, lng: {{ $apartment->latitude }} }, 
      
      map:map,
      icon:image
    });
  }
</script>
<div class="container">

<div id="map" ></div> 
</div>
<script async
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbsJQBaSt4PuYEOMGcbw8oAKqQo-HpHYw&callback=initMap">
</script>
{{-- map END --}}

 {{-- //PaymentGateWayCheck Start --}}
@endsection