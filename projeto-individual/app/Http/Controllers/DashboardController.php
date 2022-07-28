<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Release;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function home()
    {

        $allRecords = Release::count();

        $allRevenues = Release::where('release_type', '=', 'RECEITA')->sum('amount');

        $allExpenses = Release::where('release_type', '=', 'DESPESA')->sum('amount');

        $releases = Release::all();

        return view('welcome',[
            'allRecords' => $allRecords,
            'allRevenues' => $allRevenues,
            'allExpenses' => $allExpenses,
            'releases' => $releases,
           
        ]);
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
