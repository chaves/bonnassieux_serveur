<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Industry;

class IndustryController extends Controller
{
    public function index()
    {
        return Industry::with('domain')->orderBy('name', 'asc')->get();
    }
}
