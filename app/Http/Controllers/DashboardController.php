<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('nurse'))
        {
            return redirect()->route('nurse-dashboard');
        }elseif(Auth::user()->hasRole('labtech'))
        {
            return redirect()->route('labtech-dashboard');
        }elseif(Auth::user()->hasRole('patient'))
        {
            return redirect()->route('patient-dashboard');
        }
    }
}
