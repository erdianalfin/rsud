<?php

namespace App\Http\Controllers\Backend;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    
    public function index() 
    {
        $employees = Employee::all();

        return view('backend.employee.index', compact('employees'));
    }

    public function create() 
    {
        $positions    = Position::all();
        $departements = Departement::all();

        return view('backend.employee.create', compact('positions', 'departements'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name'        => 'required',
            'npwp'        => 'required',
            'phone'       => 'required',
            'departement' => 'required',
            'position'    => 'required',
        ]);

        $request['departement_id'] = $request->departement;
        $request['position_id'] = $request->position;

        Employee::create($request->all());

        return redirect('backend/employees')->with('success', 'Employee has been added');

    }

    public function edit(Employee $employee) 
    {
        $positions    = Position::all();
        $departements = Departement::all();

        return view('backend.employee.edit', compact('employee', 'positions', 'departements'));
    }

    public function update(Employee $Employee, Request $request) 
    {
        $this->validate($request, [
            'name'        => 'required',
            'npwp'        => 'required',
            'phone'       => 'required',
            'departement' => 'required',
            'position'    => 'required',
        ]);

        $request['departement_id'] = $request->departement;
        $request['position_id'] = $request->position;

        $Employee->update($request->all());

        return redirect('backend/employees')->with('success', 'Employee has been edited');
    } 

    public function destroy(Employee $Employee) 
    {
        $Employee->delete();

        return redirect('backend/employees')->with('success', 'Employee has been deleted');
    }
}
