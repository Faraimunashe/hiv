<?php

namespace App\Http\Controllers\labtech;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $searches = Patient::where('artnum', '%LIKE%', '')->get();
        if(isset($request->search))
        {
            $searches = Patient::where('artnum', 'LIKE', $request->search)->get();
        }

        //dd($search);

        return view('labtech.dashboard', [
            'searches' => $searches
        ]);
    }

    public function followup($patient_id)
    {
        $patient = Patient::find($patient_id);
        return view('labtech.art', [
            'patient' => $patient,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'integer'],
            'cd4t_count' => ['required', 'integer'],
            'viral_load' => ['required', 'integer', 'max:100', 'min:0']
        ]);

        try{
            $fll = FollowUp::where('patient_id', $request->patient_id)->latest()->first();
            if(is_null($fll)){
                return redirect()->back()->with('error', 'Empty follow up record ');
            }
            $fll->cd4t_count = $request->cd4t_count;
            $fll->viral_load = $request->viral_load;
            $fll->save();

            return redirect()->back()->with('success', 'successfully updated follow up');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
