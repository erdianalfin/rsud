<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Models\Poliklinik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    public function index() 
    {
        $polikliniks = Poliklinik::all();

        return view('backend.schedule.poliklinik.index', compact('polikliniks'));
    }

    public function create() 
    {
        return view('backend.schedule.poliklinik.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name'  => 'required',
            'image'  => 'image|required|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        
        $file      = $request->file('image');
        $file_name = random_int(11111, 99999) . "_" .  $file->getClientOriginalName();
        if ($file->move('./img/poliklinik/', $file_name)) :
            Poliklinik::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $file_name
            ]);
        endif;


        return redirect('backend/schedule/polikliniks')->with('success', 'Poliklinik has been added');

    }

    public function edit(Poliklinik $poliklinik) 
    {
        return view('backend.schedule.poliklinik.edit', compact('poliklinik'));
    }

    public function update(Poliklinik $poliklinik, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required',
            'image'  => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        
		if ($request->hasFile('image')) {

            unlink('./img/poliklinik/' . $poliklinik->image);

			$file      = $request->file('image');
			$file_name = Str::random(10) . "." .  $file->getClientOriginalExtension();
			$file->move('./img/poliklinik/', $file_name);
            $request['image'] = $file_name;
            $poliklinik->update ([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $file_name
            ]);
		}else {
            $poliklinik->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
        }

        return redirect('backend/schedule/polikliniks')->with('success', 'Poliklinik has been edited');
    } 

    public function destroy(Poliklinik $poliklinik) 
    {
        unlink('./img/poliklinik/' . $poliklinik->image);
        $poliklinik->delete();

        return redirect('backend/schedule/polikliniks')->with('success', 'Poliklinik has been deleted');
    }
}
