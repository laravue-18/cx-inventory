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
        return redirect('/user/conditions')->with('message', 'New Condition has been added!');
    }
}
