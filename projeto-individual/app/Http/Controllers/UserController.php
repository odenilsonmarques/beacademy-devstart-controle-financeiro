<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function display()
    {
        // if(Auth::check()){
            // $inforUsers = Auth()->user()->get();
            // $inforUsers = User::all();
            // $inforUsers = Auth()->user()->releases();
            $inforUsers = User::where('id', Auth::id())->get();
            return view('users.display',compact('inforUsers'));
        // }
    }
}
