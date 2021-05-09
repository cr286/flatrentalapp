<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

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

    
}
