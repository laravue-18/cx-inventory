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
        return redirect('/user/product-types')->with('message', 'New Product Type has been added!');
    }

}
