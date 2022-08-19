<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Release;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function dash()
    {

        
        $allRecords = Auth::user()->releases()->count();
        
        $allRevenues = Auth::user()->releases()->where('release_type', '=', 'RECEITA')->sum('amount');

        $allExpenses = Auth::user()->releases()->where('release_type', '=', 'DESPESA')->sum('amount');

        // $releases = Release::all();
       
        // $releases = Release::where('user_id', Auth::id())->get();
        $releases = Release::where('user_id', Auth::id())->paginate(4);
        
        

        return view('dashboard.dashboard',[
            'allRecords' => $allRecords,
            'allRevenues' => $allRevenues,
            'allExpenses' => $allExpenses,
            'releases' => $releases,
           
        ]);
    }

    public function home()
    {
        return view('welcome');
    }

    
    

    // public function record()
    // {
    //     $full = DB::table('releases')->get();
    //     return view('welcome',['full' => $full]);
    // }

    // public function revenue()
    // {
    //     $cost = DB::table('releases')->where('release_type', 'RECEITA');
    //     return view('welcome',['cost' => $cost]);
    // }
    

    // public function expense()
    // {
    //     $expenses = DB::table('releases')->where('release_type', 'DESPESA')->get();
    //     return view('welcome',['expenses' => $expenses]);
    // }

}
