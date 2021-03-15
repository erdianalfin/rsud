<?php

namespace App\Http\Controllers\Backend;

use App\Models\Handler;
use App\Models\Patients;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FamilyPatient;

class PatientsController extends Controller
{
    public function index() 
    {
        $patients = Patients::where('access', 'personal')->get();

        return view('backend.patient.index', compact('patients'));
    }

    public function create() 
    {
        $provinces = Province::all();
        $familys   = FamilyPatient::all();

        return view('backend.patient.create', compact('provinces', 'familys'));
    }

    public function store(Request $request) 
    {
        if ($request->question == 'sudah') {
            $this->validate($request, [
                'nik'              => 'required|numeric',
                'name'             => 'required',
                'date_of_birth'    => 'required',
                'province'         => 'required',
                'city'             => 'required',
                'gender'           => 'required',
                'address'          => 'required',
                'phone'            => 'required',
            ]);
        }else {
            $this->validate($request, [
                'name'             => 'required',
                'date_of_birth'    => 'required',
                'province'         => 'required',
                'city'             => 'required',
                'gender'           => 'required',
                'address'          => 'required',
                'phone'            => 'required',
            ]);
        }

        $request['no_rm'] = 'RM_' . rand(111111, 999999);

        $request["city_id"] = $request->city;
        $request["province_id"] = $request->province;

        Patients::create($request->all());
        
        return redirect('backend/patients')->with('success', 'Patients has been added');

    }

    public function edit(Patients $patient) 
    {
        $cities = City::all();
        $provinces = Province::all();

        return view('backend.patient.edit', compact('patient', 'cities', 'provinces'));
    }

    public function update(Patients $patient, Request $request) 
    {
        
        if ($request->question == 'sudah') {
            $this->validate($request, [
                'nik'              => 'required|numeric',
                'name'             => 'required',
                'date_of_birth'    => 'required',
                'province'         => 'required',
                'city'             => 'required',
                'gender'           => 'required',
                'address'          => 'required',
                'phone'            => 'required',
            ]);
        }else {
            $this->validate($request, [
                'name'             => 'required',
                'date_of_birth'    => 'required',
                'province'         => 'required',
                'city'             => 'required',
                'gender'           => 'required',
                'address'          => 'required',
                'phone'            => 'required',
            ]);
        }
        
        $request["city_id"] = $request->city;
        $request["province_id"] = $request->province;
        $request['access'] = 'personal';
        
        $handler = Handler::where('id', $patient->handler_id)->update([
            'name_handler'      => $request->name_handler,
            'phone_handler'     => $request->phone_handler,
            'job_handler'       => $request->job_handler,
            'address_handler'   => $request->address_handler,
            'family_patient_id' => $request->family
        ]);

        $patient->update($request->all());

        return redirect('backend/patients')->with('success', 'Patient has been edited');
    } 

    public function destroy(Patients $patient) 
    {
        Handler::where('id', $patient->handler_id)->delete();
        $patient->delete();

        return redirect('backend/patients')->with('success', 'Patient been deleted');
    }

    public function show(Patients $patient) 
    {
        return view('backend.patient.show', compact('patient'));
    }
    
    public function get($province)
    {
        $cities = City::where('province_id', $province)->get();

        foreach ($cities as $s) {
            echo '<option value="' . $s->id . '">' . $s->name .  ' (' .  $s->type .  ') ' . '</option>';
        }
    }
}
