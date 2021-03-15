<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Poliklinik;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\Models\BookingSchedule;
use App\Models\PatientAccess;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index($slug) 
    {
        $poliklinik = Poliklinik::where('slug', $slug)->first();    
        $schedules = Schedule::where('poliklinik_id', $poliklinik->id)->get();

        return view('frontend.schedule.index', compact('schedules', 'poliklinik'));
    }

    public function store(Request $request, Schedule $schedule) 
    {
        $request['schedule_id'] = $schedule->id;
        $request['patient_id']  = patientAccess()->patient_id;
        $request['booking_date'] = time();
        $request['booking_date_expires'] = time() + 345600;
        $request['no_reservation'] = rand(111111, 999999);
        $request['user_id'] = user()->id;
        $request['status'] = 'waiting';
        $request['poliklinik_id'] = $schedule->poliklinik_id;

        BookingSchedule::create($request->all());

        return redirect('/patient/booking')->with('success', 'Booking schedule has been added');
    }
}
