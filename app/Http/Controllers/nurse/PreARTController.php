<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\PreArt;
use Exception;
use Illuminate\Http\Request;

class PreARTController extends Controller
{
    public function index()
    {
        $preARTs = PreArt::join('patients', 'patients.id', '=', 'pre_art.patient_id')
            ->join('art_numbers', 'art_numbers.patient_id', '=', 'patients.id')
            ->select('patients.id', 'patients.fullname', 'patients.sex', 'patients.dob', 'pre_art.status', 'art_numbers.number')
            ->get();

        return view('nurse.pre-arts', [
            'preARTs' => $preARTs
        ]);
    }

    public function add_patient(Request $request)
    {
        if($request->method() === 'GET')
        {
            return view('nurse.add-patient');
        }elseif($request->method() === 'POST')
        {
            $request->validate([
                'fullname' => ['required', 'string'],
                'sex' => ['required', 'string'],
                'dob' => ['required', 'date', 'before:today'],
                'address' => ['required', 'string'],
                //'entry_point' => ['required', 'string'],
                'natid' => ['required', 'string'],
                'phone' => ['required', 'digits:10', 'starts_with:07'],
            ]);

            try{
                $pre = new PreArt();
                $pre->fullname = $request->fullname;
                $pre->sex = $request->sex;
                $pre->dob = $request->dob;
                $pre->address = $request->address;
                $pre->natid = $request->natid;
                $pre->phone = $request->phone;

                return redirect()->back()->with('success', 'Successfully added new patient in Pre-ART');
            }catch(Exception $e)
            {
                return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
            }
        }
    }
}
