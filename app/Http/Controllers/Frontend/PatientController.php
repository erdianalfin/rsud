<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Handler;
use App\Models\Patients;
use App\Models\PatientAccess;
use App\Http\Controllers\Controller;
use App\Models\BookingSchedule;
use App\Models\Guarantee;
use App\Models\PatientInsurance;
use App\Models\Province;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() 
    {
        if (is_null(patientAccess())) {
            return view('frontend.patient.create');
        }else {
            return view('frontend.patient.index');
        }
    }

    public function create() 
    {
        return view('frontend.patient.create');

    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'no_rm' => 'required',
        ],
        [
            'no_rm.required' => 'The no rekab medis field is required.'
        ]);

        $patient = Patients::where('no_rm', $request->no_rm)->first();

        if (is_null($patient)) {
			return redirect('patient')->with('error', 'The patient`s medical record number was not found');
        }else {

            $request['patient_id'] = $patient->id;
            $request['user_id']   =  user()->id;

            $access = PatientAccess::where([['no_rm', '=', $request->no_rm], ['user_id', '=', user()->id]])->first();
    
            if (is_null($access)) {
                PatientAccess::create($request->all());

                return redirect('/patient')->with('success', 'Patients has been added');
            }else{
                return redirect('/patient')->with('error', 'The patient`s medical record number is already registered');
            }

        }

    }

    public function register() 
    {
        $provinces = Province::all();
        return view('frontend.patient.register', compact('provinces'));
    }
    
    public function postRegister(Request $request) 
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
        $request["user_id"] = user()->id;

        $patient = Patients::create($request->all());
        $request["patient_id"] = $patient->id;

        PatientAccess::create($request->all());

        return redirect('/patient')->with('success', 'Patients has been added');
    }
    
    public function delete(PatientAccess $patientAcces) 
    {
        $patientAcces->delete();
        return redirect('/patient')->with('success', 'Patients has been deleted');
    }

    public function insurances($no) 
    {
        $guarantees = Guarantee::all();
        $patient = Patients::where('no_rm', $no)->first();

        return view('frontend.patient.insurances', compact('patient', 'guarantees'));
    }
    
    public function show(PatientAccess $patientAcces) 
    {
        $patient = Patients::where('id', $patientAcces->patient_id)->first();
        return view('frontend.patient.show', compact('patient'));
    }

    public function booking() 
    {
        $id = user()->id;

        if (is_null(patientAccess())) {
            return view('frontend.patient.create');
        }else {
            $bookings = BookingSchedule::where([['user_id', '=', $id], ['patient_id', '=', patientAccess()->patient_id]])->get();
            return view('frontend.patient.booking', compact('bookings'));
        }
    }

    public function confirm(BookingSchedule $booking) 
    {
        return view('frontend.patient.confirm', compact('booking'));
    }
}
