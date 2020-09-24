<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'primary_camera' => 'required',
            'secondary_camera' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'display' => 'required',
            'color' => 'required',
            'chipset' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric|min:0.02',
        ]);
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $product=Product::create([
            'name' => request('name'),
            'brand' => request('brand'),
            'primary_camera' => request('primary_camera'),
            'secondary_camera' => request('secondary_camera'),
            'image' => '$imageName',
            'display' => request('display'),
            'color' => request('color'),
            'chipset' => request('chipset'),
            'description' => request('description'),            
            'price' => request('price'),
        ]);

        for ($i = 0; $i < ($request['stock']); ++$i) {
            InventoryItem::Create([
                'product_id' => $product->id,
                'status'=>'available'
            ]);
        }
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
