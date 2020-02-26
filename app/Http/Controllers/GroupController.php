<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function search(Request $request)
    {
        return Group::where('name', 'like', $request->segment(4). '%')->orderBy('name', 'asc')->take(20)->get();
    }

    public function counts()
    {
        return Group::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
    }

}
