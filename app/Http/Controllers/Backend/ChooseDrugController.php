<?php

namespace App\Http\Controllers\Backend;

use App\Models\HealthCheckup;
use App\Models\Hospitalization;
use App\Http\Controllers\Controller;
use App\Models\ChooseDrug;
use App\Models\Drug;
use Illuminate\Http\Request;

class ChooseDrugController extends Controller
{
    public function index(HealthCheckup $health) 
    {
        $drugs = Drug::all();
        $chooses = ChooseDrug::where('health_checkup_id', $health->id)->get();

        return view('backend.ChooseDrug.index', compact('drugs', 'chooses', 'health'));
    }

    public function store(Request $request, HealthCheckup $health) 
    {
        $this->validate($request, [
            'drug'             => 'required',
            'qty_drink_rules'  => 'required|numeric',
            'qty_dosage_rules' => 'required|numeric'
        ]);

        $drug = Drug::where('id', $request->drug)->first();

        $qty1 = $request->qty_drink_rules * $request->qty_dosage_rules;
        $qty2 = $qty1 * 3;

        $request['health_checkup_id'] = $health->id;
        $request['drug_id']           = $request->drug;
        $request['price']             = $drug->price;
        $request['amout_day']         = 3;
        $request['totals']            = $qty2 * $drug->price;
        $request['status']            = 'waiting';

        ChooseDrug::create($request->all());

        if ($health->medical_measures == 'berat') {
            $hospital = Hospitalization::where('health_checkup_id', $health->id)->first();
            return redirect('backend/hospitalization/show/' . $hospital->id)->with('success', 'Choose drug has been added');
        }else {
            return redirect()->back()->with('success', 'Choose drug has been added');
        }

    }
    
    public function destroy(ChooseDrug $choose) 
    {
        $choose->delete();
        return redirect()->back()->with('success', 'Choose drug has been deleted');
    }
    
    public function success(ChooseDrug $choose) 
    {
        $choose->update([
            'status' => 'success'
        ]);
        
        return redirect()->back()->with('success', 'Choose drug has been edited');
    }

    public function recipe(ChooseDrug $choose) 
    {
        $choose->update([
            'status' => 'recipe'
        ]);
        
        return redirect()->back()->with('success', 'Choose drug has been edited');

    }
}
