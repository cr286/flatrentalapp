<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;

class BuyerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }
     

    public function index()
    {
        return view('buyer.buyerregister');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        Buyer::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 
        return redirect()->route('dashboard');
    }
}
