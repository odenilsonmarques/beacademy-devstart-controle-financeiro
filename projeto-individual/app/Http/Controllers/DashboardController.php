<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Release;

class DashboardController extends Controller
{
    //
    public function home()
    {
        return view('welcome');
    }
}
