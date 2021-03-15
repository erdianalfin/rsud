<?php

namespace App\Http\Controllers\Backend;

use App\Models\HealthCheckup;
use App\Models\DoctorAccess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AwarenessController extends Controller
{
    public function index() 
    {
        if (user()->role->name == 'doctor') {

            $doctor = DoctorAccess::where('user_id', user()->id)->first();
    
            if(is_null($doctor)) {
                return view('backend.doctor.access.create');
            }else {

                $healths = HealthCheckup::all();
                return view('backend.awareness.index', compact('healths', 'doctor'));
            }

        }else {

            $healths = HealthCheckup::all();
            return view('backend.awareness.index', compact('healths'));
        }
    }
}
