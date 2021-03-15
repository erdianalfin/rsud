<?php

namespace App\Http\Controllers\Backend;

use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Poliklinik;
use App\Models\Day;
use App\Models\DoctorAccess;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() 
    {
        if (user()->role->name == 'doctor') {

            $doctor = DoctorAccess::where('user_id', user()->id)->first();
    
            if(is_null($doctor)) {
                return view('backend.doctor.access.create');
            }else {
                $schedules = Schedule::where('doctor_id', $doctor->id)->get();
                return view('backend.schedule.index', compact('schedules'));
            }

        }else {
            $schedules = Schedule::all();
            return view('backend.schedule.index', compact('schedules'));
        }
    }
  
    public function create() 
    {
        $polikliniks = Poliklinik::all();
        $doctors     = Doctor::all();
        $days        = Day::all();

        return view('backend.schedule.create', compact('polikliniks', 'doctors', 'days'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'doctor'          => 'required',
            'day'             => 'required',
            'start_hours'     => 'required',
            'hours_completed' => 'required',
            'poliklinik'      => 'required',
            'price'           => 'required|numeric',
        ]);

        $request['day_id'] = $request->day;
        $request['doctor_id'] = $request->doctor;
        $request['poliklinik_id'] = $request->poliklinik;

        Schedule::create($request->all());

        return redirect('backend/schedules')->with('success', 'Schedule has been added');

    }

    public function edit(Schedule $schedule) 
    {
        $polikliniks = Poliklinik::all();
        $doctors     = Doctor::all();
        $days        = Day::all();

        return view('backend.schedule.edit', compact('schedule', 'polikliniks', 'doctors', 'days'));
    }

    public function update(Schedule $schedule, Request $request) 
    {
        $this->validate($request, [
            'doctor'          => 'required',
            'day'             => 'required',
            'start_hours'     => 'required',
            'hours_completed' => 'required',
            'poliklinik'      => 'required',
            'price'           => 'required|numeric',
        ]);

        $request['day_id'] = $request->day;
        $request['doctor_id'] = $request->doctor;
        $request['poliklinik_id'] = $request->poliklinik;

        $schedule->update($request->all());

        return redirect('backend/schedules')->with('success', 'Schedule has been edited');
    } 

    public function destroy(Schedule $schedule) 
    {
        $schedule->delete();

        return redirect('backend/schedules')->with('success', 'Schedule has been deleted');
    }
}
