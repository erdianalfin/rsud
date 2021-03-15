<?php

namespace App\Http\Controllers\Backend;

use App\Models\DrugType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrugTypeController extends Controller
{
    public function index() 
    {
        $drugs = DrugType::all();

        return view('backend.drug.type.index', compact('drugs'));
    }

    public function create() 
    {
        return view('backend.drug.type.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        DrugType::create($request->all());

        return redirect('backend/drug/types')->with('success', 'Drug type has been added');

    }

    public function edit(DrugType $drugType) 
    {
        return view('backend.drug.type.edit', compact('drugType'));
    }

    public function update(DrugType $drugType, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $drugType->update($request->all());

        return redirect('backend/drug/types')->with('success', 'Drug type has been edited');
    } 

    public function destroy(DrugType $drugType) 
    {
        $drugType->delete();

        return redirect('backend/drug/types')->with('success', 'Drug type has been deleted');
    }
}
