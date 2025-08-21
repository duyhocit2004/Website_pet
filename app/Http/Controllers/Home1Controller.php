<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Home1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $NewProduct = Product::query()
        ->select('product.*',DB::raw('max(product_vartiant.price) as PriceMax'),DB::raw('min(product_vartiant.price) as PriceMin'))
        ->join('product_vartiant','product.id','=','product_vartiant.product_id')
        ->groupBy('product.id')
        ->orderBy('rating','desc')
        ->where('status','appear')
        ->take(12)
        ->get();

        $Seller =  Product::query()
        ->select('product.*',DB::raw('max(product_vartiant.price) as PriceMax'),DB::raw('min(product_vartiant.price) as PriceMin'))
        ->join('product_vartiant','product.id','=','product_vartiant.product_id')
        ->groupBy('product.id')
        ->orderBy('discount','desc')
        ->where('status','appear')
        ->take(12)
        ->get();

        // dd($Seller );
        return view('client.index',compact(['NewProduct','Seller']));
    }

    public function AboutUs(){
        return view('client.AboutUs.AboutUs');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
