<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TikiProduct;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = TikiProduct::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = TikiProduct::create([
            'title' => $request->input('title'),
            'rate' => $request->input('rate'),
            'sold' => $request->input('sold'),
            'image' => $request->input('image'),
            'unit_price' => $request->input('unit_price'),
            'promo_price' => $request->input('promo_price'),
            'des' => $request->input('des')
        ]);

        $product->save();
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
