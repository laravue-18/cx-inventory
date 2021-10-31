<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        $rows = Location::all();

        return view('user.locations.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.locations.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        Location::create($data);
        return redirect(route('user.locations.index'))->with('message', 'New Location has been added!');
    }

    public function edit(Location $location)
    {
        return view('user.locations.edit')->with(compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $location->update($data);
        return redirect(route('user.locations.index'))->with('message', 'This Location has been updated!');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect(route('user.locations.index'))->with('message', 'The Location has been deleted!');
    }
}
