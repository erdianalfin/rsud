<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    
    public function index() 
    {
        $positions = Position::all();

        return view('backend.employees.position.index', compact('positions'));
    }

    public function create() 
    {
        return view('backend.employees.position.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Position::create($request->all());

        return redirect('backend/employees/positions')->with('success', 'Position has been added');
    }

    public function edit(Position $position) 
    {
        return view('backend.employees.position.edit', compact('position'));
    }

    public function update(Position $position, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $position->update($request->all());

        return redirect('backend/employees/positions')->with('success', 'Position has been edited');
    } 

    public function destroy(Position $position) 
    {
        $position->delete();

        return redirect('backend/employees/positions')->with('success', 'Position has been deleted');
    }
}
