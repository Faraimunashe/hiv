<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PreArtRegister;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PreARTController extends Controller
{
    public function index()
    {
        $preARTs = PreArtRegister::join('patients', 'patients.id', '=', 'pre_art_registers.patient_id')
            ->select('patients.id','patients.artnum', 'patients.fullname', 'patients.sex', 'patients.dob', 'patients.phone', 'patients.address', 'patients.created_at')
            ->where('pre_art_registers.date_eligible', null)
            ->get();

        return view('nurse.pre-arts', [
            'prearts' => $preARTs
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
                'phone' => ['required', 'digits:10', 'starts_with:07'],
                'entry_point' => ['required', 'string'],
                'status_at_end' => ['required', 'string'],
                'clinical_stage' => ['required', 'string'],
                //'date_eligible' => ['required', 'date']
            ]);

            try{
                $artnum = rand(11111,99999);

                $user = User::create([
                    'name' => $request->fullname,
                    'email' => $artnum."@hiv.sys",
                    'password' => Hash::make($artnum),
                ]);

                $user->attachRole('patient');

                event(new Registered($user));

                $pat = new Patient();
                $pat->artnum = $artnum;
                $pat->user_id = $user->id;
                $pat->fullname = $request->fullname;
                $pat->sex = $request->sex;
                $pat->dob = $request->dob;
                $pat->address = $request->address;
                $pat->phone = $request->phone;
                $pat->save();

                $pre = new PreArtRegister();
                $pre->patient_id = $pat->id;
                $pre->entry_point= $request->entry_point;
                $pre->status_at_end = $request->status_at_end;
                $pre->clinical_stage = $request->clinical_stage;
                $pre->save();


                return redirect()->back()->with('success', 'Successfully added new patient.');
            }catch(Exception $e)
            {
                return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
            }
        }
    }
}
