<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Access;
use App\Http\Controllers\Controller;


class AccessController extends Controller
{
    public function index() 
    {
        $access = Access::all();

        return view('backend.access.index', compact('access'));
    }

    public function create() 
    {
        return view('backend.access.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Access::create($request->all());

        return redirect('backend/access')->with('success', 'Access has been added');
    }

    public function edit(Access $access) 
    {
        return view('backend.access.edit', compact('access'));
    }

    public function update(Access $access, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $access->update($request->all());

        return redirect('backend/access')->with('success', 'Access has been edited');
    } 

    public function destroy(Access $access) 
    {
        $access->delete();

        return redirect('backend/access')->with('success', 'Access has been deleted');
    }
}
