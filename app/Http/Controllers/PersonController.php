<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function search(Request $request)
    {
        return Person::where('name', 'like', $request->segment(4). '%')->orderBy('name', 'asc')->take(20)->get();
    }

    public function counts()
    {
        return Person::withCount('sources')->orderBy('sources_count', 'desc')->orderBy('name', 'asc')->get();
    }

    public function add(Request $request)
    {
        $person = new Person();
        $person->name = $request->input('item');
        $person->save();
        return $person->id;
    }

    public function remove(Request $request)
    {
        $person = Person::find($request->segment(4));
        $person->sources()->detach();
        $person->delete();
    }

}
