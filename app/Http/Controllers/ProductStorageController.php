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
        return redirect(route('user.storages.index'))->with('message', 'New Storage has been added!');
    }

    public function edit(ProductStorage $storage)
    {
        return view('user.storages.edit')->with(compact('storage'));
    }

    public function update(Request $request, ProductStorage $storage)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $storage->update($data);
        return redirect(route('user.storages.index'))->with('message', 'This Storage has been updated!');
    }

    public function destroy(ProductStorage $storage)
    {
        $storage->delete();
        return redirect(route('user.storages.index'))->with('message', 'The Model has been deleted!');
    }
}
