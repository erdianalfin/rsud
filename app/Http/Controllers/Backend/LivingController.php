<?php

namespace App\Http\Controllers\Backend;

use App\Models\Living;
use App\Models\Level;
use App\Models\Building;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivingController extends Controller
{
    public function index() 
    {
        $livings = Living::all();
        
        return view('backend.living.index', compact('livings'));
    }
    
    public function create() 
    {
        $levels    = Level::all();
        $buildings = Building::all();

        return view('backend.living.create', compact('levels', 'buildings'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name'       => 'required',
            'level'      => 'required',
            'building'   => 'required',
            'amount_bed' => 'required|numeric'
        ]);

        $request["level_id"] = $request->level;
        $request["building_id"] = $request->building;

        Living::create($request->all());

        return redirect('backend/livings')->with('success', 'Living has been added');

    }

    public function edit(Living $living) 
    {
        $levels    = Level::all();
        $buildings = Building::all();

        return view('backend.living.edit', compact('living', 'levels', 'buildings'));
    }

    public function update(Living $living, Request $request) 
    {
        
        $this->validate($request, [
            'name'       => 'required',
            'level'      => 'required',
            'building'   => 'required',
            'amount_bed' => 'required|numeric'
        ]);

        $request["level_id"] = $request->level;
        $request["building_id"] = $request->building;


        $living->update($request->all());

        return redirect('backend/livings')->with('success', 'Living has been edited');
    } 

    public function destroy(Living $living) 
    {
        $living->delete();

        return redirect('backend/livings')->with('success', 'Living has been deleted');
    }
}
