<?php

namespace App\Http\Controllers\Backend;

use App\Models\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index() 
    {
        $levels = Level::all();

        return view('backend.level.index', compact('levels'));
    }

    public function create() 
    {
        return view('backend.level.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required',
            'best' => 'required'
        ]);

        Level::create($request->all());

        return redirect('backend/living/levels')->with('success', 'Level has been added');

    }

    public function edit(Level $level) 
    {
        return view('backend.level.edit', compact('level'));
    }

    public function update(Level $level, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required',
            'best' => 'required',
        ]);

        $level->update($request->all());

        return redirect('backend/living/levels')->with('success', 'Level has been edited');
    } 

    public function destroy(Level $level) 
    {
        $level->delete();

        return redirect('backend/living/levels')->with('success', 'Level has been deleted');
    }
}
