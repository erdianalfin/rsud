<?php

namespace App\Http\Controllers\Backend;

use App\Models\Specialist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index() 
    {
        $specialists = Specialist::all();

        return view('backend.doctor.specialist.index', compact('specialists'));
    }

    public function create() 
    {
        return view('backend.doctor.specialist.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Specialist::create($request->all());

        return redirect('backend/doctor/specialists')->with('success', 'Specialist has been added');
    }

    public function edit(Specialist $specialist) 
    {
        return view('backend.doctor.specialist.edit', compact('specialist'));
    }

    public function update(Specialist $specialist, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $specialist->update($request->all());

        return redirect('backend/doctor/specialists')->with('success', 'Specialist has been edited');
    } 

    public function destroy(Specialist $specialist) 
    {
        $specialist->delete();

        return redirect('backend/doctor/specialists')->with('success', 'Specialist has been deleted');
    }
}
