<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Sellerproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')->where('seller_id', auth()->user()->id)->get();
        return view('seller.products.index', ['products' => $data]);
    }

    public function type1()
    {
        //顯示大衣洋裝類商品
        $data = DB::table('products')->where('category_id', '1')->get();
        return view('seller.products.type.coat', ['products' => $data]);
    }

    public function type2()
    {
        //顯示鋼筆類商品
        $data = DB::table('products')->where('category_id', '2')->get();
        return view('seller.products.type.pan', ['products' => $data]);
    }

    public function type3()
    {
        //顯示書籍類商品
        $data = DB::table('products')->where('category_id', '3')->get();
        return view('seller.products.type.book', ['products' => $data]);
    }

    public function type4()
    {
        //顯示專輯類商品
        $data = DB::table('products')->where('category_id', '4')->get();
        return view('seller.products.type.album', ['products' => $data]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
