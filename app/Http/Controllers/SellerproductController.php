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
    public function index($id)
    {
        $data = Product::where('seller_id', auth()->user()->id)->get();
        $product = Product::where('id',$id)->first();
        return view('seller.products.index', compact('data', 'product'));

    }

    public function type1($id)
    {
        //顯示大衣洋裝類商品
        $data = Product::where('category_id', '1')->get();
        $product = Product::where('id',$id)->first();
        return view('seller.products.type.coat',compact('data','product'));
    }

    public function type2($id)
    {
        //顯示鋼筆類商品
        $data = Product::where('category_id', '2')->get();
        $product = Product::where('id',$id)->first();
        return view('seller.products.type.pan', compact('data','product'));
    }

    public function type3($id)
    {
        //顯示書籍類商品
        $data = Product::where('category_id', '3')->get();
        $product = Product::where('id',$id)->first();
        return view('seller.products.type.book', compact('data','product'));
    }

    public function type4($id)
    {
        //顯示專輯類商品
        $data = Product::where('category_id', '4')->get();
        $product = Product::where('id',$id)->first();
        return view('seller.products.type.album', compact('data','product'));

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::where('id',$id)->first();
        return view('seller.products.create', compact('product'));
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
    public function edit(Product $products,$id)
    {
        $product = Product::where('id',$id)->first();
        return view('seller.products.index', compact('products','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Product $products)
    {
        $products = Product::where('id',$id)->first();
        $products->update($request->all());
        return redirect()->route('seller.products.index', $id);
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
