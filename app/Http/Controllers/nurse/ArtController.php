<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\ArtRegister;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function index()
    {
        $arts = ArtRegister::join('patients', 'patients.id', '=', 'art_registers.patient_id')
            ->select('patients.fullname', 'patients.sex', 'patients.phone', 'patients.dob', 'patients.address')
            ->get();

        return view('nurse.art', [
            'arts' => $arts
        ]);
    }


    public function add_art(Request $request)
    {
        if($request->method == "POST")
        {
            $request->validate([
                'patient_id' => ['required', 'integer'],
                'function_status' => ['required', 'string'],
                'weight' => ['required', 'numeric'],
                'clinical_stage' => ['required', 'integer'],
                'cd4t_count' => ['required', 'integer'],
                'original_regiment' => ['required', 'string']
            ]);
            try{
                $art = new ArtRegister();
                $art->patient_id = $request->patient_id;
                $art->function_status = $request->function_status;
                $art->weight = $request->weight;
                $art->clinical_stage = $request->clinical_stage;
                $art->cd4t_count = $request->cd4t_count;
                $art->original_regiment = $request->original_regiment;
                $art->save();

                return redirect()->back()->with('success', 'successfully added patient in art register');
             }catch(Exception $e)
             {
                return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
             }
        }else{
            $patient = Patient::find($request->patient_id);
            return view('nurse.add-art', [
                'patient_id' => $request->patient_id,
                'patient' => $patient
            ]);
        }
    }
}
