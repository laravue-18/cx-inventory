<?php

namespace App\Http\Controllers;

use App\Models\Make;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    public function index(){
        $rows = Make::all();

        return view('user.makes.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.makes.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        Make::create($data);
        return redirect(route('user.makes.index'))->with('message', 'New Make has been added!');
    }

    public function edit(Make $make)
    {
        return view('user.makes.edit')->with(compact('make'));
    }

    public function update(Request $request, Make $make)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $make->update($data);
        return redirect(route('user.makes.index'))->with('message', 'This Make has been updated!');
    }

    public function destroy(Make $make)
    {
        $make->delete();
        return redirect(route('user.makes.index'))->with('message', 'The Make has been deleted!');
    }
}
