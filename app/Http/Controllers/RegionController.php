<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return Region::get();
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
}