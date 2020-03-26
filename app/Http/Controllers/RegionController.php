<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return Region::orderBy('name', 'asc')->get();
    }

    public function counts()
    {
        return Region::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
    }

    public function add(Request $request)
    {
        $region = new Region();
        $region->name = $request->input('item');
        $region->save();
        return $region->id;
    }

    public function remove(Request $request)
    {
        $region = Region::find($request->segment(4));
        $region->sources()->detach();
        $region->delete();
    }
}
