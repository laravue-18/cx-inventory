<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('user.orders.index')->with(compact('orders'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $data = $request->detail;

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_id' => $data['id'],
            'product_id' => $request['product_id'],
            'payer_email' => $data['payer']['email_address'],
            'shipping_name' => $data['purchase_units'][0]['shipping']['name']['full_name'],
            'shipping_address' => $data['purchase_units'][0]['shipping']['address']['address_line_1'],
            'amount' => $data['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            'currency' => $data['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
        ]);

        dd($order);
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
