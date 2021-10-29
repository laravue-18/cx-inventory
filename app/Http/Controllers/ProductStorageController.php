<?php

namespace App\Http\Controllers;

use App\Models\ProductStorage;
use Illuminate\Http\Request;

class ProductStorageController extends Controller
{
    public function index(){
        $rows = ProductStorage::all();

        return view('user.storages.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.storages.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        ProductStorage::create($data);
        return redirect('/user/storages')->with('message', 'New Storage has been added!');
    }
}
