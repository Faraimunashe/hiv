<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect()->route('nurse-preARTs');
    }
}
