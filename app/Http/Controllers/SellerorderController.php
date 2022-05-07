<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('seller_id', auth()->user()->id)->first();

        $data = Order::where('member_id',auth()->user()->id)->get();



        return view('seller.order', compact('data','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail($order)
    {
        $data= DB::table('orders')->where('id','=',$order)->get();
        $data2= DB::table('order_details')->where('order_id','=',$order)->get();
        $products= DB::table('products')->get();
//        return view('seller.orders.detail', ['order' => $data],['order_de' => $data2],['products' => $product]);
        return view('seller.orders.detail',compact('data','data2','products'));

    }


    public function undone()
    {

       // $data = Order::where('member_id',auth()->user()->id)->where('status','4')->get();
        $data = Order::where('seller_id',auth()->user()->id)->where('status','!=','5')->get();
        //賣家看自己的訂單，以seller_id篩選資料

        return view('seller.orders.undone',compact('data'));

    }


    public function history()
    {

      //  $data = DB::table('orders')->where('member_id',auth()->user()->id)->where('status','5')->get();
        $data = DB::table('orders')->where('seller_id',auth()->user()->id)->where('status','5')->get();
        //賣家看自己的訂單，以seller_id篩選資料

        return view('seller.orders.history', compact('data'));
    }

    public  function  confirm($order)//確認訂單
    {
        DB::table('orders')->where('id', $order)->update(
            [



                'status'=>'1',



            ]
        );
        return redirect()->route('seller.orders.index');
    }

    public function comment()//所有評論評分
    {
        $data= DB::table('orders')->get();
        $data2= DB::table('order_details')->get();
        $products= DB::table('products')->get();
        $members= DB::table('members')->get();
        return view('seller.orders.comment',compact('data','data2','products','members'));

    }

    public function amount()//進帳
    {
        $data= DB::table('orders')->where('status','5')->where('pay','1')->get();
        //訂單已完成且已付款
        $data2= DB::table('order_details')->get();
        $products= DB::table('products')->get();
        return view('seller.orders.amount',compact('data','data2','products'));

    }

    public function unamount()//未進帳
    {
        $data= DB::table('orders')->where('status','!=','5')->get();
        //在訂單狀態完成前該筆訂單就算付錢了賣家也不會有進帳
        $data2= DB::table('order_details')->get();
        $products= DB::table('products')->get();
        return view('seller.orders.unamount',compact('data','data2','products'));

    }

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
