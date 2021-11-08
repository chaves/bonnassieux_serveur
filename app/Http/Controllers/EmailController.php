<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function save(Request $request)
    {
        $letter = new Letter();
        $letter->nom = $request->input('nom');
        $letter->affiliation = $request->input('affiliation');
        $letter->email = $request->input('email');
        $letter->save();
        return $letter->id;
    }
}
