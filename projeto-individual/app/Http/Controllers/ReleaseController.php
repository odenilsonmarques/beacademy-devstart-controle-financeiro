<?php

namespace App\Http\Controllers;

use App\Models\Release;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    public function create()
    {
        return view('releases.add');
    }

    public function createAction(Request $request)
    {
        $data = $request->all();
        Release::create($data);
        return redirect()->route('lancamentos.list');
    }

    public function list()
    {
        $releases = Release::all();
        return view('releases.list', compact('releases'));
    }

}
