<?php

namespace App\Http\Controllers\Backend;

use App\Models\Guarantee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuaranteeController extends Controller
{
    public function index() 
    {
        $guarantees = Guarantee::all();

        return view('backend.guarantee.index', compact('guarantees'));
    }

    public function create() 
    {
        return view('backend.guarantee.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Guarantee::create($request->all());

        return redirect('backend/guarantees')->with('success', 'Guarantee has been added');
    }

    public function edit(Guarantee $guarantee) 
    {
        return view('backend.guarantee.edit', compact('guarantee'));
    }

    public function update(Guarantee $guarantee, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $guarantee->update($request->all());

        return redirect('backend/guarantees')->with('success', 'Guarantee has been edited');
    } 

    public function destroy(Guarantee $guarantee) 
    {
        $guarantee->delete();

        return redirect('backend/guarantees')->with('success', 'Guarantee has been deleted');
    }
}
