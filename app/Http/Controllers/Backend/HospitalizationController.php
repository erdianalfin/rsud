<?php

namespace App\Http\Controllers\Backend;

use App\Models\Hospitalization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingSchedule;
use App\Models\BookingScheduleInsurance;
use App\Models\Level;
use App\Models\HealthCheckup;
use App\Models\Living;
use App\Models\ChooseDrug;
use App\Models\PatientInsurance;
use App\Models\DoctorAccess;
use App\Models\FamilyPatient;
use App\Models\Handler;
use PDF;

class HospitalizationController extends Controller
{
    public function index() 
    {
        if (user()->role->name == 'doctor') {

            $doctor = DoctorAccess::where('user_id', user()->id)->first();
    
            if(is_null($doctor)) {
                return view('backend.doctor.access.create');
            }else {

                $hospitals = Hospitalization::all();
                return view('backend.hospitalization.index', compact('hospitals', 'doctor'));
            }

        }else {

            $hospitals = Hospitalization::all();
            return view('backend.hospitalization.index', compact('hospitals'));
        }
    }

    public function create(HealthCheckup $health)
    {
        $familys = FamilyPatient::all();
        $levels = Level::all();

        return view('backend.hospitalization.create', compact('levels', 'familys', 'health'));
    }

    public function store(Request $request, HealthCheckup $health) 
    {
        $this->validate($request, [
            'name_handler'  => 'required',
            'phone_handler'  => 'required',
            'address_handler'  => 'required',
            'job_handler'  => 'required',
            'family'  => 'required',
            'level'  => 'required',
            'living' => 'required'
        ]);

        $request['no_hospitalization'] = 'H_' . rand(111111, 999999);
        $request['health_checkup_id']  = $health->id;
        $request['living_id']          = $request->living;
        $request['entry_date']         = time();

        $hospitalization = Hospitalization::create($request->all());

        $request['family_patient_id'] = $request->family;
        $request['hospitalization_id'] = $hospitalization->id;

        Handler::create($request->all());

        return redirect('backend/hospitalization/show/' . $hospitalization->id)->with('success', 'Hospitalization has been created');
        
    }
    
    public function gohome(Hospitalization $hospital) 
    {
        Hospitalization::where('id', $hospital->id)->update([
            'exit_date' => time()
        ]);

        return redirect('backend/hospitalization/show/' . $hospital->id)->with('success', 'Pasient successfully returned');
    }

    public function show(Hospitalization $hospital) 
    {
        $chooses = ChooseDrug::where('health_checkup_id', $hospital->health_checkup_id)->get();
        $choosedrugs = ChooseDrug::where([['health_checkup_id', '=', $hospital->health_checkup_id], ['status', '=', 'success']])->get();
        $health = HealthCheckup::where('id', $hospital->health_checkup_id)->first();
        $booking = BookingSchedule::where('id', $health->booking_schedule_id)->first();
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $booking->id)->first();
        $handler = Handler::where('hospitalization_id', $hospital->id)->first();

        return view('backend.hospitalization.show', compact('hospital', 'handler', 'chooses', 'choosedrugs', 'insurance'));
    }
    
    public function edit(Hospitalization $hospital) 
    {
        $levels = Level::all();
        $livings = Living::all();
        
        return view('backend.hospitalization.edit', compact('levels', 'livings', 'hospital'));
    }

    public function update(Hospitalization $hospital, Request $request)
    {
        $this->validate($request, [
            'level'  => 'required',
            'living' => 'required'
        ]);

        $request['living_id'] = $request->living;
        $hospital->update($request->all());

        return redirect('backend/hospitalization/show/' . $hospital->id)->with('success', 'Living room successfully returned');
    } 

    public function get(Level $level) 
    {
        $livings = Living::where([['level_id', '=', $level->id], ['amount_bed', '!=', 0]])->get();

        if ($livings->isEmpty()) {
            echo '
                <option value="" hidden>Living not found</option>
            ';
        }else {
            foreach ($livings as $living) {
                echo '
                    <option value="'. $living->id .'">'. $living->name .'</option>
                ';
            }
        }
    }

    public function destroy(Hospitalization $hospital) 
    {
        ChooseDrug::where('health_checkup_id', $hospital->health_checkup_id)->delete();
        HealthCheckup::where('id', $hospital->health_checkup_id)->delete();
        $hospital->delete();
    }

    public function read(HealthCheckup $health) 
    {
        $hospital = Hospitalization::where('health_checkup_id', $health->id)->first();
        $chooses = ChooseDrug::where('health_checkup_id', $hospital->health_checkup_id)->get();
        $booking = BookingSchedule::where('id', $health->booking_schedule_id)->first();
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $health->booking_schedule_id)->first();
        
        return view('backend.hospitalization.read', compact('hospital', 'health', 'chooses', 'insurance'));
    }

    
    public function pdf_read(HealthCheckup $health) 
    {
        $hospital = Hospitalization::where('health_checkup_id', $health->id)->first();
        $chooses = ChooseDrug::where([['health_checkup_id', '=', $hospital->health_checkup_id], ['status', '=', 'success']])->get();
        $booking = BookingSchedule::where('id', $health->booking_schedule_id)->first();
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $health->booking_schedule_id)->first();

        
        $pdf = PDF::loadview('backend.hospitalization.pdf_read', compact('hospital', 'chooses', 'insurance'));
        return $pdf->stream();
    }
    
    public function pdf_show(Hospitalization $hospital) 
    {
        $chooses = ChooseDrug::where('health_checkup_id', $hospital->health_checkup_id)->get();
        $choosedrugs = ChooseDrug::where([['health_checkup_id', '=', $hospital->health_checkup_id], ['status', '=', 'success']])->get();
        $health = HealthCheckup::where('id', $hospital->health_checkup_id)->first();
        $booking = BookingSchedule::where('id', $health->booking_schedule_id)->first();
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $health->booking_schedule_id)->first();

        $pdf = PDF::loadview('backend.hospitalization.pdf_show', compact('hospital', 'chooses', 'choosedrugs', 'insurance'));
        return $pdf->stream();
    }
}
