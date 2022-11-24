<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $patient = Patient::latest()->first();
        return view('patient.dashboard', [
            'patient' => $patient
        ]);
    }
}
