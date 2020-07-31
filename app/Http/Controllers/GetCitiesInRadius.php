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
        // todo: if there was a bit more time, it could be made as separate xhr action with corresponding request validation
        if (isset($request->city, $request->radius)) {
            $radius = $request->radius;
            $city = City::findOrFail($request->city);
            $citiesInRadius  = City::getCitiesInRadius($city, (int) $request->radius);
        }

        $availableCities = City::all();

        return view('index', compact('citiesInRadius', 'availableCities', 'radius'));
    }
}
