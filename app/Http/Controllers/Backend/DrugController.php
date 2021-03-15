<?php

namespace App\Http\Controllers\Backend;

use App\Models\Drug;
use App\Models\DrugType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrugController extends Controller
{
    public function index() 
    {
        $drugs = Drug::all();

        return view('backend.drug.index', compact('drugs'));
    }

    public function create() 
    {
        $types = DrugType::all();
        return view('backend.drug.create', compact('types'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
            'type'  => 'required',
            'stok'  => 'required',
        ]);

        $request["drug_type_id"] = $request->type;

        Drug::create($request->all());

        return redirect('backend/drugs')->with('success', 'Drug has been added');

    }

    public function edit(Drug $drug) 
    {
        $types = DrugType::all();

        return view('backend.drug.edit', compact('drug', 'types'));
    }

    public function update(Drug $drug, Request $request) 
    {
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
            'type'  => 'required',
            'stok'  => 'required',
        ]);

        $request["drug_type_id"] = $request->type;

        $drug->update($request->all());

        return redirect('backend/drugs')->with('success', 'Drug has been edited');
    } 

    public function destroy(Drug $drug) 
    {
        $drug->delete();

        return redirect('backend/drugs')->with('success', 'Drug has been deleted');
    }
}
