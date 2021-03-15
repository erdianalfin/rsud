<?php

namespace App\Http\Controllers\Backend;

use App\Models\BookingSchedule;
use App\Http\Controllers\Controller;
use App\Models\BookingScheduleInsurance;
use App\Models\Guarantee;
use App\Models\Patients;
use App\Models\Poliklinik;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingScheduleController extends Controller
{
    
    public function index() 
    {
        $bookings = BookingSchedule::where('status', 'waiting')->get();

        return view('backend.booking.index', compact('bookings'));
    }

    public function process() 
    {
        $bookings = BookingSchedule::where('status', 'process')->get();

        return view('backend.booking.index', compact('bookings'));
    }

    public function create() 
    {
        $patients = Patients::all();
        $polikliniks = Poliklinik::all();

        return view('backend.booking.create', compact('patients', 'polikliniks'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'patient' => 'required',
            'poliklinik' => 'required',
            'schedule' => 'required'
        ]);


        $request['schedule_id'] = $request->schedule;
        $request['patient_id']  = $request->patient;
        $request['booking_date'] = time();
        $request['booking_date_expires'] = time() + 345600;
        $request['no_reservation'] = rand(111111, 999999);
        $request['user_id'] = user()->id;
        $request['status'] = 'waiting';
        $request['poliklinik_id'] = $request->poliklinik;

        BookingSchedule::create($request->all());

        return redirect('/backend/bookings')->with('success', 'Booking schedule has been added');
    }

    public function get(Poliklinik $poliklinik) 
    {
        $schedules = Schedule::where('poliklinik_id', $poliklinik->id)->get();
        $no = 1;

        foreach ($schedules as $schedule) {
            echo '
                <tr>
                    <td class"text-center">
                        <div class="form-check text-center">
                            <input class="form-check-input" type="radio" name="schedule" id="schedule" value="'. $schedule->id .'">
                        </div>
                    </td>
                    <td>'. $schedule->doctor->name .'</td>
                    <td>'. $schedule->day->name .'</td>
                    <td>'. $schedule->start_hours .'</td>
                    <td>'. $schedule->hours_completed .'</td>
                    <td>'. $schedule->poliklinik->name .'</td>
                </tr>
            ';
        }
    }

    public function destroy(BookingSchedule $booking) 
    {
        $booking->delete();

        return redirect('/backend/bookings')->with('success', 'Booking schedule has been deleted');
    }

    public function show(BookingSchedule $booking) 
    {
        $guarantees = Guarantee::all();
        $insurance = BookingScheduleInsurance::where('booking_schedule_id', $booking->id)->first();
        return view('backend.booking.show', compact('booking', 'insurance', 'guarantees'));
    }

    public function insurance(Request $request) 
    {
        if ($request->access == 'personal') {
            $this->validate($request, [
                'no_reservation' => 'required',
                'access' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'no_reservation' => 'required',
                'access' => 'required',
                'card_number' => 'required',
            ]);
        }

        $booking = BookingSchedule::where('no_reservation', $request->no_reservation)->first();

        if ($request->access == 'personal') {
            BookingScheduleInsurance::create([
                'booking_schedule_id' => $booking->id,
                'access' => 'personal',
                'guarantee_id' => null,
                'card_number' => null
            ]);
        }else {
            BookingScheduleInsurance::create([
                'booking_schedule_id' => $booking->id,
                'access' => 'insurances',
                'guarantee_id' => $request->access,
                'card_number' => $request->card_number
            ]);
        }

        BookingSchedule::where('id', $booking->id)->update([
            'status' => 'process'
        ]);

        return redirect('/backend/booking/process')->with('success', 'The booking schedule was successfully processed');

    }

    public function insurance_edit(Request $request, BookingScheduleInsurance $insurance) 
    {
        if ($request->access == 'personal') {
            $this->validate($request, [
                'no_reservation' => 'required',
                'access' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'no_reservation' => 'required',
                'access' => 'required',
                'card_number' => 'required',
            ]);
        }

        if ($request->access == 'personal') {
            $insurance->update([
                'access' => 'personal',
                'guarantee_id' => null,
                'card_number' => null
            ]);
        }else {
            $insurance->update([
                'access' => 'insurances',
                'guarantee_id' => $request->access,
                'card_number' => $request->card_number
            ]);
        }

        return redirect()->back()->with('success', 'Guarantee has been edited');
        
    }
}
