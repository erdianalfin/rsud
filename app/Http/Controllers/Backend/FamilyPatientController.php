<?php

namespace App\Http\Controllers\Backend;

use App\Models\FamilyPatient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyPatientController extends Controller
{
    public function index() 
    {
        $familys = FamilyPatient::all();

        return view('backend.family.index', compact('familys'));
    }

    public function create() 
    {
        return view('backend.family.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        FamilyPatient::create($request->all());

        return redirect('backend/patient/familys')->with('success', 'Family has been added');

    }

    public function edit(FamilyPatient $family) 
    {
        return view('backend.family.edit', compact('family'));
    }

    public function update(FamilyPatient $family, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $family->update($request->all());

        return redirect('backend/patient/familys')->with('success', 'Family has been edited');
    } 

    public function destroy(FamilyPatient $family) 
    {
        $family->delete();

        return redirect('backend/patient/familys')->with('success', 'Family has been deleted');
    }
}
