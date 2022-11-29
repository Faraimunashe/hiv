<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\ArtCareBooklet;
use App\Models\Patient;
use App\Models\Pill;
use Exception;
use Illuminate\Http\Request;

class ArtCareBookletController extends Controller
{
    public function index()
    {
        $booklets = ArtCareBooklet::latest()->get();
        return view('nurse.booklet', [
            'booklets' => $booklets
        ]);
    }

    public function book($patient_id)
    {
        $patient = Patient::find($patient_id);
        return view('nurse.create-booklet',[
            'patient' => $patient
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'integer'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'clinical_stage' => ['required', 'integer'],
            'next_date' => ['required', 'date', 'after:today'],
            'name' => ['required', 'string'],
            'qty' => ['required', 'integer']
        ]);

        try{
            $pill = new Pill();

            $bk = new ArtCareBooklet();
            $bk->date = now();
            $bk->patient_id = $request->patient_id;
            $bk->weight = $request->weight;
            $bk->height = $request->height;
            $bk->clinical_stage = $request->clinical_stage;
            $bk->tb_status = $request->tb_status;
            $bk->next_date = $request->next_date;

            $bk->save();

            $pill->book_id = $bk->id;
            $pill->name = $request->name;
            $pill->qty = $request->qty;
            $pill->save();

            return redirect()->back()->with('success', 'Successfully added data to art care booklet');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
