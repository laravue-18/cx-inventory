<?php

namespace App\Http\Controllers;

use App\Models\PartNumber;
use Illuminate\Http\Request;

class PartNumberController extends Controller
{
    public function index(){
        $rows = PartNumber::all();

        return view('user.part-numbers.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.part-numbers.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        PartNumber::create($data);
        return redirect('/user/part-numbers')->with('message', 'New Part Number has been added!');
    }
}
