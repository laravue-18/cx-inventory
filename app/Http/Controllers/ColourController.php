<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;

class ColourController extends Controller
{
    public function index(){
        $rows = Colour::all();

        return view('user.colours.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.colours.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        Colour::create($data);
        return redirect('/user/colours')->with('message', 'New Colour has been added!');
    }
}
