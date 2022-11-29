<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\ArtCareBooklet;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $patient = Patient::where('user_id', Auth::id())->first();
        $book = ArtCareBooklet::where('patient_id', $patient->id)->latest()->first();
        return view('patient.schedule', [
            'book' => $book
        ]);
    }
}
