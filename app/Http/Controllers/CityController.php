<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{

    public function index()
    {
        return City::get();
    }

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

    public function add(Request $request)
    {
        $city = new City();
        $city->name = $request->input('item');
        $city->save();
        return $city->id;
    }

    public function remove(Request $request)
    {
        $city = City::find($request->segment(4));
        $city->sources()->detach();
        $city->delete();
    }

}
