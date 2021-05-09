<?php

namespace App\Http\Controllers;
use App\Models\Coupon; 
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $coupons = Coupon::latest()->paginate(2);
        return view('coupon.index', [ 
            'coupons' => $coupons
        ]);
    }
    public function create()
    {
        return view('coupon.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'couponname' => 'required|max:255',
            'couponprice' => 'required',
            'validatedate' => 'required',
        ]); //validate
        $request->user()->coupons()->create([ 
            'couponName' => $request->couponname,
            'couponprice' =>  $request->couponprice, 
            'validatedate' =>  $request->validatedate, 
            'used' =>  0
        ]); 
  
        return redirect()->route('coupon');
    } 

    public function destroy(Coupon $coupon)
    {
        // $this->authorize('delete', $apartment);

        $coupon->delete();

        return back();
    }
}
