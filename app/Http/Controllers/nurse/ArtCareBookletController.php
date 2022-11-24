<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use App\Models\ArtCareBooklet;
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



    public function add(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'integer'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'clinical_stage' => ['required', 'integer'],
            'tb_status' => ['required', 'string'],
            'next_time' => ['required', 'date']
        ]);

        try{
            $bk = new ArtCareBooklet();
            $bk->patient_id = $request->patient_id;
            $bk->weight = $request->weight;
            $bk->height = $request->height;
            $bk->clinical_stage = $request->clinical_stage;
            $bk->tb_status = $request->tb_status;
            $bk->next_time = $request->next_time;
            $bk->save();

            return redirect()->back()->with('success', 'Successfully added data to art care booklet');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
