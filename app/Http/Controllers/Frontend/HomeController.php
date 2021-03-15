<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Poliklinik;
use App\Http\Controllers\Controller;
use App\Models\PatientAccess;
use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $polikliniks = Poliklinik::all();
        return view('frontend.home.index', compact('polikliniks'));
    }
}
