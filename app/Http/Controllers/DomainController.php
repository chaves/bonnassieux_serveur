<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;

class DomainController extends Controller
{
    public function index()
    {
        return Domain::get();
    }

    public function counts()
    {
        return Domain::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
    }

    public function add(Request $request)
    {
        $domain = new Domain();
        $domain->name = $request->input('item');
        $domain->save();
        return $domain->id;
    }
}
