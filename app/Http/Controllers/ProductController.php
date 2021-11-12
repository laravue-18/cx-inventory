<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Location;
use App\Models\Make;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\ProductStorage;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $rows = Product::all();
        return view('user.products.index')->with(compact('rows'));
    }

    public function create()
    {
        $suppliers = User::all();
        $types = ProductType::all();
        $locations = Location::all();
        $makes = Make::with('models')->get();
        $colors = Colour::all();
        $storages = ProductStorage::all();
        $conditions = Condition::all();

        return view('user.products.create')->with(compact('suppliers', 'types', 'locations', 'makes', 'colors', 'storages', 'conditions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'type_id' => 'required',
            'location_id' => 'required',
            'make_id' => 'required',
            'product_model_id' => 'required',
            'part_number' => 'required',
            'colour_id' => 'required',
            'storage_id' => 'required',
            'conditions' => 'required',
            'qty' => 'required',
            'serials' => 'required',
            'price' => 'required',
            'note' => 'required',
        ]);

        $product = Product::create($data);

        $serials = collect($data['serials'])->map(function ($i) {
            return ['serial_number' => $i];
        });

        $product->conditions()->sync($data['conditions']);

        $product->items()->createMany($serials);

        return redirect(route('user.products.index'))->with('message', 'New Stock has been added.');
    }

    public function show(Product $product)
    {

    }

    public function edit(Product $product)
    {
        $suppliers = User::all();
        $types = ProductType::all();
        $locations = Location::all();
        $makes = Make::with('models')->get();
        $colors = Colour::all();
        $storages = ProductStorage::all();
        $conditions = Condition::all();

        return view('user.products.edit')->with(compact('product', 'suppliers', 'types', 'locations', 'makes', 'colors', 'storages', 'conditions'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'location_id' => 'required',
            'make_id' => 'required',
            'product_model_id' => 'required',
            'part_number' => 'required',
            'colour_id' => 'required',
            'storage_id' => 'required',
            'conditions' => 'required',
            'qty' => 'required',
            'serials' => 'required',
            'price' => 'required',
            'note' => 'required',
        ]);

        $product->update($data);

        $serials = collect($data['serials'])->map(function ($i) {
            return ['serial_number' => $i];
        });

        $product->conditions()->sync($data['conditions']);

        $product->items()->createMany($serials);

        return redirect(route('user.products.index'))->with('message', 'New Stock has been added.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('user.products.index'))->with('message', 'The Product has been deleted!');
    }

    public function createOut(){
        $suppliers = User::all();
        $locations = Location::all();
        $makes = Make::with('models')->get();
        $colors = Colour::all();
        $storages = ProductStorage::all();
        $conditions = Condition::all();

        return view('user.products.out')->with(compact('suppliers', 'locations', 'makes', 'colors', 'storages', 'conditions'));
    }

    public function storeOut(Request $request){

    }

    public function createReturn(){
        $suppliers = User::all();
        $locations = Location::all();
        $makes = Make::with('models')->get();
        $colors = Colour::all();
        $storages = ProductStorage::all();
        $conditions = Condition::all();

        return view('user.products.create_return')->with(compact('suppliers', 'locations', 'makes', 'colors', 'storages', 'conditions'));
    }

    public function storeReturn(Request $request){

    }

    public function scan(){
        $items = Item::filter(request(['search']))->get();
        $products = $items->map(function ($item) {
            return $item->product->load('productType', 'make', 'productModel');
        });
        $merged = $products->merge(Product::with('productType', 'make', 'productModel')->filter(request(['search']))->get());
        return $merged;
    }
}
