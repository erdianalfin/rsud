<?php

namespace App\Http\Controllers\Backend;

use App\Models\Building;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index() 
    {
        $buildings = Building::all();

        return view('backend.building.index', compact('buildings'));
    }

    public function create() 
    {
        return view('backend.building.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Building::create($request->all());

        return redirect('backend/living/buildings')->with('success', 'Building has been added');

    }

    public function edit(Building $building) 
    {
        return view('backend.building.edit', compact('building'));
    }

    public function update(Building $building, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $building->update($request->all());

        return redirect('backend/living/buildings')->with('success', 'Building has been edited');
    } 

    public function destroy(Building $building) 
    {
        $building->delete();

        return redirect('backend/living/buildings')->with('success', 'Building has been deleted');
    }
}
