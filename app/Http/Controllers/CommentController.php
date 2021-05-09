<?php

namespace App\Http\Controllers;
 
use App\Models\Comment;
use App\Models\Apartment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function store(Apartment $apartment,Request $request){
        $this->validate($request, [
            'comment' => 'required'
        ]);
        $apartment->comments()->create([
            'description' =>  $request->comment,  
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
