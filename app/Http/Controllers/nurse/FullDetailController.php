<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class FullDetailController extends Controller
{
    public function index($patient_id)
    {
        $patient = Patient::find($patient_id);
        return view('nurse.full-detail', [
            'patient' => $patient
        ]);
    }
}
