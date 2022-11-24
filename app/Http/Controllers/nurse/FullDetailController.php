<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FullDetailController extends Controller
{
    public function index($patient_id)
    {
        return view('nurse.full-detail');
    }
}
