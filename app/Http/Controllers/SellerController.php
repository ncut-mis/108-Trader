<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Product;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function search()
    {
        $name=$_GET['search'];
        $id=$_GET['id'];

        $sellers=Seller::
            join('users','users.id','=','sellers.member_id')
            ->where('sellers.id', $id)
            ->select('sellers.id','users.name')
            ->first();

        $products=Product::
            where('name','like','%'.$name.'%')
            ->where('seller_id', $id)
            ->where('status','=','1')
            ->get();

        $data1=['sellers' => $sellers];
        $data2=['products' => $products];
        return view('markets_search', $data1 ,$data2);
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
     * @param  \App\Http\Requests\StoreSellerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show($seller)
    {
        $sellers=Seller::
            join('users','users.id','=','sellers.member_id')
            ->where('sellers.id', $seller)
            ->select('sellers.id','users.name')
            ->first();
        $products=Product::
            join('sellers','products.seller_id','=','sellers.id')
            ->where('products.seller_id', $seller)
            ->where('products.status', '1')
            ->select('products.id','products.category_id','products.name','products.pictures','products.price')
            ->get();
        $data1=['sellers' => $sellers];
        $data2=['products' => $products];
        return view('markets', $data1 , $data2);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellerRequest  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
