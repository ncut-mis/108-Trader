<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::where('member_id', auth()->user()->id)->get();
        $data=['orders' => $orders];
        return view('orders', $data);
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
//    public function show(Order $order)
//    {
//        $data= DB::table('orders')->where('id','=',$order)->get();
//        $data2= DB::table('order_details')->where('order_id','=',$order)->get();
//        $products= DB::table('products')->get();
//        return view('orders_detail',compact('data','data2','products'));
//    }
    public function detail($id)
    {
        $data= DB::table('orders')->where('id','=',$id)->get();
        $data2= DB::table('order_details')->where('order_id','=',$id)->get();
        $products= DB::table('products')->get();
        return view('orders_detail',compact('data','data2','products'));

    }

    public function scores()
    {
        Order::where('id',$_GET['id'])->update(['score'=>$_GET['scores']]);
        $orders=Order::where('member_id', auth()->user()->id)->get();
        $data=['orders' => $orders];
        return view('orders', $data);

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
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
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
