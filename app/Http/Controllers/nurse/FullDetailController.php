<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\ArtRegister;
use App\Models\Patient;
use App\Models\PreArtRegister;
use Illuminate\Http\Request;

class FullDetailController extends Controller
{
    public function index($patient_id)
    {
        $patient = Patient::find($patient_id);
        $preart = PreArtRegister::where('patient_id', $patient_id)->first();
        $art = ArtRegister::where('patient_id', $patient_id)->first();

        return view('nurse.full-detail', [
            'patient' => $patient,
            'preart' => $preart,
            'art' => $art
        ]);
    }
}
