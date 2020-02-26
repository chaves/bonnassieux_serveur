<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Models\Matter;

class MatterController extends Controller
{
    public function search(Request $request)
    {
        return Matter::where('name', 'like', $request->segment(4). '%')->orderBy('name', 'asc')->take(20)->get();
    }

    public function counts()
    {
        return Matter::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
    }
}
