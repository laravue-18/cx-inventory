<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductModelController extends Controller
{
    public function index(){
        $rows = ProductModel::all();

        return view('user.product-models.index')->with(compact('rows'));
    }

    public function create(){
        return view('user.product-models.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        ProductModel::create($data);
        return redirect('/user/product-models')->with('message', 'New Product Type has been added!');
    }
}
