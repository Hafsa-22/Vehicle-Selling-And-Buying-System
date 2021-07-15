<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\DB;

class CarControl extends Controller
{
    //
    function carhome()
    {
        $caritem = Car::all();
        return view('carhome', ['allcarpost' => $caritem]);
    }
}
