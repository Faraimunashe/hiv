<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $searches = Patient::where('artnum', '%LIKE%', '')->get();
        if(isset($request->search))
        {
            $searches = Patient::where('artnum', 'LIKE', $request->search)->get();
        }

        //dd($search);

        return view('nurse.dashboard', [
            'searches' => $searches
        ]);
    }
}
