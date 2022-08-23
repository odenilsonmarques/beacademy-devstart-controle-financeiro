<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Release;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    //método para buscar e exibir as informações no dashboard
    public function dash()
    {
        $allsReleasesUser = Auth::user()->releases()->count();
        
        $allsRevenues = Auth::user()->releases()->where('release_type', '=', 'RECEITA')->sum('amount');

        $allsExpenses = Auth::user()->releases()->where('release_type', '=', 'DESPESA')->sum('amount');

        $releases = Release::where('user_id', Auth::id())->paginate(4);
        
        return view('dashboard.dashboard',[
            'allsReleasesUser' => $allsReleasesUser,
            'allsRevenues' => $allsRevenues,
            'allsExpenses' => $allsExpenses,
            'releases' => $releases,
        ]);
    }

    public function home()
    {
        return view('welcome');
    }
}
