<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Comment;

class HomeController extends Controller
{ 
    

    public function index()
    {
        $apartments = Apartment::latest()->paginate(10); 
        return view('Home',[ 
            'apartments' => $apartments]);
    }
    
    public function apartmentList()
    {
        $apartments = Apartment::latest()->paginate(10); 
    
        return view('home.apartmentlist',[ 
            'apartments' => $apartments]);
    }

    public function apartmentdetails(Apartment $apartment)
    { 
        $booking= new Booking(); 
        $booking=Booking::where('apartment_id',  $apartment->id)->first(); 
        $comments = Comment::where('apartment_id',  $apartment->id)
        ->latest()
        ->paginate(5);
        return view('home.apartmentdetail', [
            'apartment' => $apartment,
            'comments'=> $comments,
            'booking'=>  $booking
        ]);
    }


    
}
