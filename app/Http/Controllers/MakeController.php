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
        return redirect('/user/makes')->with('message', 'New Make has been added!');
    }
}
