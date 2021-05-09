<?php

namespace App\Http\Controllers;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Coupon;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function store(Apartment $apartment,Request $request){
         
        $coupon = Coupon::where('couponName',  $request->couponname)
        ->where('used',  0)
        // ->where('validatedate',  0)
        ->first();
        $finalprice =100;
        if($coupon ){
            $finalprice =$finalprice -$coupon ->couponprice;
        }
       
        $apartment->bookings()->create([   
            'user_id' => $request->user()->id,
            'finalprice' => $finalprice// $apartment->price
        ]); 
        return back();
    }
 
    public function destroy(Booking $booking)
    {
        $booking->delete(); 
        return back();
    }
}
