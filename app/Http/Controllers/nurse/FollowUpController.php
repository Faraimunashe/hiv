<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function index()
    {
        $followups = FollowUp::latest()->get();
        return view('nurse.follow-up', [
            'followups' => $followups
        ]);
    }

    public function follow_up($patient_id)
    {
        $patient = Patient::find($patient_id);

        return view('nurse.create-follow-up', [
            'patient' => $patient
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'integer'],
            'follow_up_status' => ['required', 'string'],
            'tb_status' => ['required', 'string'],
            'clinical_stage' => ['required', 'string'],
            'cd4t_count' => ['required', 'integer']
        ]);

        try{
            $flp = new FollowUp();
            $flp->date = now();
            $flp->patient_id = $request->patient_id;
            $flp->follow_up_status = $request->follow_up_status;
            $flp->tb_status = $request->tb_status;
            $flp->clinical_stage = $request->clinical_stage;
            $flp->cd4t_count = $request->cd4t_count;
            $flp->save();

            return redirect()->back()->with('success', 'successfully added follow up data');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
