<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order_detail;
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
        $data= DB::table('orders')->where('id','=',$id)->first();
        $data2= DB::table('order_details')->where('order_id','=',$id)->get();
        $products= DB::table('products')->get();
        return view('orders_detail',compact('data','data2','products'));

    }

    public function scores()
    {
        Order::where('id',$_GET['id'])->update(['score'=>$_GET['scores']]);
//        $orders=Order::where('member_id', auth()->user()->id)->get();
//        $data=['orders' => $orders];
        echo "<script >alert('評分成功'); location.href ='/orders';</script>";

    }

    public function comments($order)
    {
        $orders=Order::
                join('order_details','order_details.order_id','=','orders.id')
                ->join('products','order_details.product_id','=','products.id')
                ->where('orders.id', $order)
                ->select('products.pictures','products.name','orders.id','orders.comment')
                ->get();
        $data=['orders' => $orders];
        return view('orders_comments', $data);

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
    public function destroy($order)
    {
        Order::destroy($order);
        $order_details=Order_detail::where('order_id','=', $order)->get();
        foreach ($order_details as $order_detail)
        {
            Order_detail::destroy($order_detail->id);
        }
        return redirect()->route('orders.index');
    }
}
