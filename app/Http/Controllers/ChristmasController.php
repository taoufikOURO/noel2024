<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChristmasController extends Controller
{

    public function send(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'chaine' => 'nullable',
        ]);
        $fields['chaine'] = Str::random(16);
        $user = User::create($fields);
        $url = 'http://127.0.0.1:8000/' . $user->chaine;
        return view('lien', ['lien' => $url]);
    }

    public function show($chaine)
    {
        $user = User::where('chaine', $chaine)->first();
        return view('show', ['user' => $user]);
    }
}
