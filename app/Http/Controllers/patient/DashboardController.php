<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\ArtCareBooklet;
use App\Models\ArtRegister;
use App\Models\Patient;
use App\Models\PreArtRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $patient = Patient::where('user_id', Auth::id())->first();
        $preart = PreArtRegister::where('patient_id', $patient->id)->first();
        $art = ArtRegister::where('patient_id', $patient->id)->first();
        //$book = ArtCareBooklet::where('patient_id', $patient->id)->last();
        return view('patient.dashboard', [
            'preart' => $preart,
            'art' => $art,
            'patient' => $patient
            //'book' => $book
        ]);
    }
}
