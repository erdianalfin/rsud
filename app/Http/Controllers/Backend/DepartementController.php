<?php

namespace App\Http\Controllers\Backend;

use App\Models\Departement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    
    public function index() 
    {
        $departements = Departement::all();

        return view('backend.departement.index', compact('departements'));
    }

    public function create() 
    {
        return view('backend.departement.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Departement::create($request->all());

        return redirect('backend/departements')->with('success', 'Departement has been added');

    }

    public function edit(Departement $departement) 
    {
        return view('backend.departement.edit', compact('departement'));
    }

    public function update(Departement $departement, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $departement->update($request->all());

        return redirect('backend/departements')->with('success', 'Departement has been edited');
    } 

    public function destroy(Departement $departement) 
    {
        $departement->delete();

        return redirect('backend/departements')->with('success', 'Departement has been deleted');
    }
}
