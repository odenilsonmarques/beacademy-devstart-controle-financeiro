<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function display()
    {
        $inforUsers = User::all();

        return view('users.display',compact('inforUsers'));
    }

    public function admin()
    {
        return view ('admin.index');
    }
}
