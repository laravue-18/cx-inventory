<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index(){
        $rows = Condition::all();

        return view('user.conditions.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.conditions.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        Condition::create($data);
        return redirect(route('user.conditions.index'))->with('message', 'New Condition has been added!');
    }

    public function edit(Condition $condition)
    {
        return view('user.conditions.edit')->with(compact('condition'));
    }

    public function update(Request $request, Condition $condition)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $condition->update($data);
        return redirect(route('user.conditions.index'))->with('message', 'This Condition has been updated!');
    }

    public function destroy(Condition $condition)
    {
        $condition->delete();
        return redirect(route('user.conditions.index'))->with('message', 'The Condition has been deleted!');
    }
}
