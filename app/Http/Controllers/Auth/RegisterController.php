<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]); //validate

        User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); //User Create

        auth()->attempt($request->only('email', 'password')); //login query

        return redirect()->route('dashboard');
    }
}
