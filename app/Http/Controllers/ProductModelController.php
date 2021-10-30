<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductModelController extends Controller
{
    public function index(){
        $rows = ProductModel::all();

        return view('user.product-models.index')->with(compact('rows'));
    }

    public function create(){
        $makes = Make::all();
        return view('user.product-models.create')->with(compact('makes'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'make_id' => 'required',
            'name' => 'required',
        ]);

        ProductModel::create($data);
        return redirect(route('user.models.index'))->with('message', 'New Product Type has been added!');
    }

    public function edit(ProductModel $model)
    {
        $makes = Make::all();
        return view('user.product-models.edit')->with(compact('model', 'makes'));
    }

    public function update(Request $request, ProductModel $model)
    {
        $data = $request->validate([
            'make_id' => 'required',
            'name' => 'required',
        ]);

        $model->update($data);
        return redirect(route('user.models.index'))->with('message', 'This Model has been updated!');
    }

    public function destroy(ProductModel $model)
    {
        $model->delete();
        return redirect(route('user.models.index'))->with('message', 'The Model has been deleted!');
    }
}
