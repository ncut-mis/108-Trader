<?php

namespace App\Http\Controllers;
use App\Models\Category;
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
        $data = Product::where('seller_id', auth()->user()->id)->get();

        $name=Category::all();

        return view('seller.products.index', compact('data','name'));

    }

    public function type1()
    {
        //顯示大衣洋裝類商品
        $data = Product::where('category_id', '1')->get();


        return view('seller.products.type.coat',compact('data'));
    }

    public function type2()
    {
        //顯示鋼筆類商品
        $data = Product::where('category_id', '2')->get();


        return view('seller.products.type.pan', compact('data'));
    }

    public function type3()
    {
        //顯示書籍類商品
        $data = Product::where('category_id', '3')->get();


        return view('seller.products.type.book', compact('data'));
    }

    public function type4()
    {
        //顯示專輯類商品
        $data = Product::where('category_id', '4')->get();


        return view('seller.products.type.album', compact('data'));

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('seller.products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {


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
        $product = Product::find($id);

        return view('seller.products.edit', compact('product'));
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
        $product = Product::find($id);

        $product ->update($request->all());

        return redirect()->route('seller.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('seller.products.index');
    }

    public function launch($id)
    {
        $product=Product::where('id',$id)->first();

        $product->status ='1';

        $product->save();

        return redirect()->route('seller.products.index');
    }

    public function stop($id)
    {
        $product=Product::where('id',$id)->first();

        $product->status ='0';

        $product->save();

        return redirect()->route('seller.products.index');
    }
}
