<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $searches = FollowUp::join('patients', 'patients.id', '=', 'follow_ups.patient_id')
            //->where('follow_ups.follow_up_status', 'LIKE', $request->query)
            ->select('patients.fullname', 'patients.sex', 'patients.phone', 'patients.dob', 'patients.address', 'patients.id', 'patients.artnum')
            ->get();
        if(isset($request->search))
        {
            $searches = FollowUp::join('patients', 'patients.id', '=', 'follow_ups.patient_id')
                ->where('follow_ups.follow_up_status', 'LIKE', $request->search)
                ->select('patients.fullname', 'patients.sex', 'patients.phone', 'patients.dob', 'patients.address', 'patients.id', 'patients.artnum')
                ->get();
        }

        return view('nurse.report', [
            'reports' => $searches
        ]);

    }
}
