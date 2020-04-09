<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function search(Request $request)
    {
        return Group::where('name', 'like', '%' . $request->segment(4). '%')->orderBy('name', 'asc')->take(20)->get();
    }

    public function counts()
    {
        return Group::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
    }

    public function add(Request $request)
    {
        $group = new Group();
        $group->name = $request->input('item');
        $group->save();
        return $group->id;
    }
    public function remove(Request $request)
    {
        $group = Group::find($request->segment(4));
        $group->sources()->detach();
        $group->delete();
    }
}
