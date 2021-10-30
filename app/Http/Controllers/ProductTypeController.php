<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index(){
        $rows = ProductType::all();

        return view('user.product-types.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.product-types.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        ProductType::create($data);
        return redirect(route('user.types.index'))->with('message', 'New Product Type has been added!');
    }

    public function edit(ProductType $type)
    {
        return view('user.product-types.edit')->with(compact('type'));
    }

    public function update(Request $request, ProductType $type)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $type->update($data);
        return redirect(route('user.types.index'))->with('message', 'This Product Type has been updated!');
    }

    public function destroy(ProductType $type)
    {
        $type->delete();
        return redirect(route('user.types.index'))->with('message', 'The Product Type has been deleted!');
    }

}
