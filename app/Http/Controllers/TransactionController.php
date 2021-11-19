<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $rows = Transaction::latest()->get();

        return view('user.transactions.index')->with(compact('rows'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $location_id = $request->input('location_id');
        $products = $request->input('products');
        $note = $request->input('note');

        foreach($products as $key => $val){
            Transaction::create(['customer_id' => $customer_id, 'location_id' => $location_id, 'product_id' => $key, 'selling_price' => $val, 'note' => $note]);
        }

        return back()->with('success', 'Added Successfully');

    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        //
    }

    public function scan(){
        $item = Item::filter(request(['search']))->first();
        if($item){
            $product = $item->product;
        }else{
            $product = Product::filter(request(['search']))->first();
        }

        if($product){
            if($product->transactions){
                return response()->json($product->load('productType', 'make', 'productModel', 'conditions', 'transactions', 'supplier', 'location', 'items', 'colour'));
            }
        }
        return response()->json(false);
    }
}
