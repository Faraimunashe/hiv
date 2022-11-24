<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->query)){
            $reports = FollowUp::join('patients', 'patients.id', '=', 'follow_ups.patient_id')
                ->where('follow_ups.follow_up_status', '%LIKE%', $request->query)
                ->select('patients.fullname', 'patients.sex', 'patients.phone', 'patients.dob', 'patients.address')
                ->get();

            return view('nurse.report', [
                'reports' => $reports
            ]);
        }else{
            $reports = FollowUp::join('patients', 'patients.id', '=', 'follow_ups.patient_id')
                ->where('follow_ups.follow_up_status', '%LIKE%', 'lost follow up')
                ->select('patients.fullname', 'patients.sex', 'patients.phone', 'patients.dob', 'patients.address')
                ->get();

            return view('nurse.report', [
                'reports' => $reports
            ]);
        }
    }
}
