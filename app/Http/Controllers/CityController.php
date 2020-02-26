<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function search(Request $request)
    {
        if ($request->segment(4)) {
            return City::where('name', 'like', $request->segment(4). '%')->orderBy('name', 'asc')->take(20)->get();
        }
    }

    public function counts()
    {
        return City::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->take(200)->get();
    }

}
