<?php

namespace App\Http\Controllers\Backend;

use App\Models\DoctorAccess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorAccessController extends Controller
{
    public function store(Request $request) 
    {
        $this->validate($request, [
            'license_number' => 'required'
        ]);

        $access = DoctorAccess::where('license_number', $request->license_number)->first();

        if (is_null($access)) {
            
            $doctor = Doctor::where('license_number', $request->license_number)->first();
            
            $request['doctor_id'] = $doctor->id;
            $request['user_id']   = user()->id;

            DoctorAccess::create($request->all());

            return redirect('backend')->with('success', 'Doctor access has been added');
            
        }else {
            return redirect('backend')->with('success', 'License number already registered');
        }
    }
}
