<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookingSchedule;
use App\Models\BookingScheduleInsurance;
use App\Models\ChooseDrug;
use App\Models\HealthCheckup;
use App\Models\Hospitalization;
use App\Models\PatientInsurance;
use App\Models\Poliklinik;
use App\Models\DoctorAccess;
use Illuminate\Http\Request;
use PDF;

class OutPatientController extends Controller
{
    public function index() 
    {
        if (user()->role->name == 'doctor') {

            $doctor = DoctorAccess::where('user_id', user()->id)->first();
    
            if(is_null($doctor)) {
                return view('backend.doctor.access.create');
            }else {

                $outs = HealthCheckup::where('medical_measures', 'ringan')->get();
                return view('backend.outpatient.index', compact('outs', 'doctor'));
            }

        }else {

            $outs = HealthCheckup::where('medical_measures', 'ringan')->get();
            return view('backend.outpatient.index', compact('outs'));
        }
    }

    public function create() 
    {
        if (user()->role->name == 'doctor') {

            $doctor = DoctorAccess::where('user_id', user()->id)->first();
    
            if(is_null($doctor)) {
                return view('backend.doctor.access.create');
            }else {

                $bookings = BookingSchedule::where('status', 'waiting')->get();
                return view('backend.outpatient.create', compact('bookings', 'doctor'));
            }

        }else {

            $polikliniks = Poliklinik::all();
            return view('backend.outpatient.create', compact('polikliniks'));
        }

    }

    public function store(Request $request, BookingSchedule $booking) 
    {
        $this->validate($request, [
            'complaints'       => 'required',
            'action'           => 'required',
            'medical_measures' => 'required'
        ]);

        $booking->update([
            'status' => 'success'
        ]);

        $request['booking_schedule_id'] = $booking->id;
        $request['date'] = time();

        $health = HealthCheckup::create($request->all());

        if ($request->medical_measures == 'berat') {
            return redirect('backend/hospitalization/create/' . $health->id)->with('success', 'Health checkup has been added');
        }else {
            return redirect('backend/choose/drugs/' . $health->id)->with('success', 'Health checkup has been added');
        }
        
    }

    public function edit(HealthCheckup $outpatient) 
    {
        return view('backend.outpatient.edit', compact('outpatient'));
    }

    public function update(Request $request, HealthCheckup $outpatient) 
    {
        $this->validate($request, [
            'complaints'       => 'required',
            'action'           => 'required',
        ]);

        $outpatient->update($request->all());

        $hospital = Hospitalization::where('health_checkup_id', $outpatient->id)->first();

        if ($outpatient->medical_measures == 'berat') {
            return redirect('backend/hospitalization/show/' . $hospital->id)->with('success', 'Health checkup has been edited');
        }else {
            return redirect('backend/outpatient/read/' . $outpatient->id)->with('success', 'Health checkup has been edited');
        }
    }

    public function destroy(HealthCheckup $outpatient) 
    {
        $outpatient->delete();
        BookingSchedule::where('id', $outpatient->booking_schedule_id)->delete();
        ChooseDrug::where('health_checkup_id', $outpatient->id)->delete();

        return redirect('backend/outpatients')->with('success', 'Outpatient has been deleted');
    }

    public function show(BookingSchedule $booking) 
    {
        $patient = $booking->patient_id;
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $booking->id)->first();

        return view('backend.outpatient.show', compact('booking', 'insurance'));
    }

    
    public function get(Poliklinik $poliklinik) 
    {
        $schedules = BookingSchedule::where([['poliklinik_id', '=', $poliklinik->id], ['status', '=', 'process']])->get();
        $no = 1;

        foreach ($schedules as $schedule) {
            echo '
                <tr>
                    <td class"text-center">'. $no++ .'</td>
                    <td>'. $schedule->patient->no_rm .'</td>
                    <td>'. $schedule->patient->name .'</td>
                    <td>'. $schedule->patient->city->name .', '. date('d F Y', strtotime($schedule->patient->date_of_birth)) .'</td>
                    <td>'. $schedule->patient->gender .'</td>
                    <td>'. $schedule->patient->phone .'</td>
                    <td><a href="/backend/outpatient/show/'. $schedule->id .'" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                </tr>
            ';
        }
    }

    public function read(HealthCheckup $outpatient) 
    {
        $booking = BookingSchedule::where('id', $outpatient->booking_schedule_id)->first();
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $booking->id)->first();
        $chooses = ChooseDrug::where('health_checkup_id', $outpatient->id)->get();
        $chooseDrug = ChooseDrug::where([['health_checkup_id', '=', $outpatient->id], ['status', '=', 'success']])->get();

        return view('backend.outpatient.read', compact('outpatient', 'insurance', 'chooseDrug', 'chooses'));
    }

    public function pdf(HealthCheckup $outpatient) 
    {
        $booking = BookingSchedule::where('id', $outpatient->booking_schedule_id)->first();
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $outpatient->booking_schedule_id)->first();
        $chooses = ChooseDrug::where([['health_checkup_id', '=', $outpatient->id], ['status', '=', 'success']])->get();

        $pdf = PDF::loadview('backend.outpatient.pdf', compact('outpatient', 'booking', 'insurance', 'chooses'));
        return $pdf->stream();
    }

}
