<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Gate;
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
        if(isset(request()->search)){
            $search = request()->search;            
            $products = Product::where('name','LIKE','%'.$search.'%')->orWhere('brand','LIKE','%'.$search.'%')->get();
        } else {
            $products = Product::all();
        }  
        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('isAdmin'),401);
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
            'storage' => 'required',
            'description' => 'required',
            'stock' => 'required|integer|min:0|max:999',
            'price' => 'required|numeric|min:0.02|max:39999',
        ]);
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $product=Product::create([
            'name' => request('name'),
            'brand' => request('brand'),
            'primary_camera' => request('primary_camera'),
            'secondary_camera' => request('secondary_camera'),
            'image' => $imageName,
            'display' => request('display'),
            'color' => request('color'),
            'chipset' => request('chipset'),
            'description' => request('description'),            
            'price' => request('price'),
            'storage' => request('storage'),
        ]);

        for ($i = 0; $i < ($request['stock']); ++$i) {
            InventoryItem::Create([
                'product_id' => $product->id,
                'status'=>'available'
            ]);
        }
        
        
        return redirect('/products/'.$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort_if(Gate::denies('isAdmin'),401);
        return view('products.edit',compact('product'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'primary_camera' => 'required',
            'secondary_camera' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'display' => 'required',
            'color' => 'required',
            'chipset' => 'required',
            'storage' => 'required',
            'description' => 'required',
            'stock' => 'nullable|integer|min:0|max:999',
            'price' => 'required|numeric|min:0.02|max:39999',
        ]);
            if(!empty($request->image)){
                $imageName = time().'.'.$request->image->extension();
                 $request->image->move(public_path('images'), $imageName);
                 $product->image = $imageName;
                 $product->save;
            }
            $product->update([
                'name' => request('name'),
                'brand' => request('brand'),
                'primary_camera' => request('primary_camera'),
                'secondary_camera' => request('secondary_camera'),                
                'display' => request('display'),
                'color' => request('color'),
                'chipset' => request('chipset'),
                'description' => request('description'),            
                'price' => request('price'),
                'storage' => request('storage'),
            ]);
            for ($i = 0; $i < ($request['stock']); ++$i) {
                InventoryItem::Create([
                    'product_id' => $product->id,
                    'status'=>'available'
                ]);
            }
            return redirect('/products/'.$product->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
    }
}
