<?php

namespace App\Http\Controllers\Backend;

use App\Models\Doctor;
use App\Models\Specialist;
use App\Models\Departement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    
    public function index() 
    {
        $doctors = Doctor::all();

        return view('backend.doctor.index', compact('doctors'));
    }

    public function create() 
    {
        $specialists = Specialist::all();
        $departements = Departement::all();

        return view('backend.doctor.create', compact('specialists', 'departements'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'license_number' => 'required',
            'nik'           => 'required|numeric',
            'name'           => 'required',
            'alumni'         => 'required',
            'mobile_phone'   => 'required',
            'specialist'     => 'required',
            'departement'    => 'required',
        ]);

        $request['specialist_id'] = $request->specialist;
        $request['departement_id'] = $request->departement;

        Doctor::create($request->all());

        return redirect('backend/doctors')->with('success', 'Doctor has been added');

    }

    public function edit(Doctor $doctor) 
    {
        $specialists = Specialist::all();
        $departements = Departement::all();

        return view('backend.doctor.edit', compact('doctor', 'specialists', 'departements'));
    }

    public function update(Doctor $doctor, Request $request) 
    {
        $this->validate($request, [
            'license_number' => 'required',
            'nik'           => 'required|numeric',
            'name'           => 'required',
            'alumni'         => 'required',
            'mobile_phone'   => 'required',
            'specialist'     => 'required',
            'departement'    => 'required',
        ]);

        $request['specialist_id'] = $request->specialist;
        $request['departement_id'] = $request->departement;


        $doctor->update($request->all());

        return redirect('backend/doctors')->with('success', 'Doctor has been edited');
    } 

    public function destroy(Doctor $doctor) 
    {
        $doctor->delete();

        return redirect('backend/doctors')->with('success', 'Doctor has been deleted');
    }
}
