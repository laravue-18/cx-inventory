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
        return redirect(route('user.colours.index'))->with('message', 'New Colour has been added!');
    }

    public function edit(Colour $colour)
    {
        return view('user.colours.edit')->with(compact('colour'));
    }

    public function update(Request $request, Colour $colour)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $colour->update($data);
        return redirect(route('user.colours.index'))->with('message', 'This Colour has been updated!');
    }

    public function destroy(Colour $colour)
    {
        $colour->delete();
        return redirect(route('user.colours.index'))->with('message', 'The Colour has been deleted!');
    }
}
