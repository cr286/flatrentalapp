<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Apartment;
use App\Models\Comment;
use App\Models\Booking;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $apartments = Apartment::latest()->paginate(2);
        return view('apartment.index', [ 
            'apartments' => $apartments
        ]);
    }
    
    public function create()
    {
        return view('apartment.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'apartmentName' => 'required|max:255',
            'location' => 'required|max:255',
            'purpose' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
        ]); //validate
        $request->user()->apartment()->create([ 
            'apartmentName' => $request->apartmentName,
            'location' =>  $request->location,
            'purpose' =>  $request->purpose,
            'description' =>  $request->description,
            'price' =>  $request->price,
            'longitude' =>  $request->longitude,
            'latitude' =>  $request->latitude,  
        ]); 
  
        return redirect()->route('apartment');
    } 
    
    public function show(Apartment $apartment)
    { 
        $booking= new Booking(); 
        $booking=Booking::where('apartment_id',  $apartment->id)->first();
         
        $comments = Comment::where('apartment_id',  $apartment->id)
        ->latest()
        ->paginate(5);
        return view('apartment.show', [
            'apartment' => $apartment,
            'comments'=> $comments,
            'booking'=>  $booking
        ]);
    }

    public function destroy(Apartment $apartment)
    {
        // $this->authorize('delete', $apartment);

        $apartment->delete();

        return back();
    }

    public function edit(Apartment $apartment)
    {  
        return view('apartment.edit', [
            'apartment' => $apartment  
        ]);
    }
    public function update(Apartment $apartment,Request $request)
    {  
        $this->validate($request, [
            'apartmentName' => 'required|max:255',
            'location' => 'required|max:255',
            'purpose' => 'required|max:255',
            'description' => 'required',
            'Price' => 'required',
        ]); 
        Apartment::whereId($apartment->id)->update([ 
            'apartmentName' => $request->apartmentName,
            'location' =>  $request->location,
            'purpose' =>  $request->purpose,
            'description' =>  $request->description,
            'Price' =>  $request->Price,
            'longitude' =>  $request->longitude,
            'latitude' =>  $request->latitude,  
        ]); 

        return redirect()->route('apartment');
    }

}
