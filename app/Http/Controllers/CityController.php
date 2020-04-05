<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{

    public function index()
    {
        return City::orderBy('name', 'asc')->get();
    }

    public function search(Request $request)
    {
        if ($request->segment(4)) {
            return City::where('name', 'like', $request->segment(4). '%')->orderBy('name', 'asc')->take(20)->get();
        }
    }

    public function counts()
    {
        return City::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
    }

    public function countsCoordinates()
    {
        return City::withCount('sources')->with('coordinates')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
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

    public function getForMap(){
        $data = DB::table('city_source')
                    ->select(DB::raw('YEAR(date) as year, city_source.city_id as city_id, nom, count(*) as total, longitude, latitude'))
                    ->join('sources', 'city_source.source_id','=','sources.id')
                    ->join('coordinates', 'coordinates.city_id','=','city_source.city_id')
                    ->whereNotNull('nom')
                    ->groupBy('city_source.city_id', 'year')
                    ->orderByRaw('year ASC, total ASC')
                    ->get();
        return $data;
    }



}
