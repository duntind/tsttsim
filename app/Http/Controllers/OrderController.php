<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('isCustomer'), 401);
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartItems = Auth::user()->cartItems;
        $request->validate([
            'full_name' => 'required',
            'credit_card' => 'required',
            'billing_address' => 'required',
            'shipping_address' => 'required',
        ]);
        foreach ($cartItems as $cartItem) {
            if ($cartItem->quantity > $cartItem->product->inventoryItems->where('status', 'available')->count()) {
                return redirect()->back()->with('error', 'please check your cart')->withInput($request->input());
            }
            for ($i = 0; $i < ($cartItem['quantity']); ++$i) {
                $inventoryItem = InventoryItem::Where('product_id', $cartItem->product_id)->where('status', 'available')->first();
                $inventoryItem->status = "sold";
                $inventoryItem->save();
                Order::Create([
                    'inventory_item_id' => $inventoryItem->id,
                    'full_name' => request('full_name'),
                    'billing_address' => request('billing_address'),
                    'shipping_address' => request('shipping_address'),
                    'user_id' => Auth::user()->id,
                    'credit_card' => request('credit_card'),
                    'status' => "pending",
                ]);
            }
        }
        $cartItem->delete();
        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
