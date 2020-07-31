<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class GetCitiesInRadius extends Controller
{
    public function __invoke(Request $request)
    {
        $radius = 50;
        $citiesInRadius = [];

        if (isset($request->city, $request->radius)) {
            $radius = $request->radius;
            $city = City::findOrFail($request->city);
            $citiesInRadius  = City::getCitiesInRadius($city, (int) $request->radius);
        }

        $availableCities = City::all();

        return view('index', compact('citiesInRadius', 'availableCities', 'radius'));
    }
}
