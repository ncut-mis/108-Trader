<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order_detail;
use App\Models\Product;
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
        $orders=Order::where('member_id', auth()->user()->id)->orderby('id','DESC')->get();
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

    public function done($order)
    {
        Order::where('id',$order)->update(['status'=>'5','pay'=>'1']);
        echo "<script >alert('成功完成訂單'); location.href ='/orders';</script>";
    }

    public function cancel($order)
    {
        Order::where('id',$order)->update(['status'=>'7']);
        $order_details=Order_detail::
                        join('products','products.id','=','order_details.product_id')
                        ->where('order_id','=',$order)
                        ->select('order_details.quantity','products.inventory','products.id')
                        ->get();
        foreach($order_details as $order_detail)
        {
            Product::
            where('id',$order_detail->id)
            ->update(['inventory'=> $order_detail->inventory+$order_detail->quantity]);
        }
        echo "<script >alert('成功取消訂單'); location.href ='/orders';</script>";
    }

    public function back($order)
    {
        $orders=Order::
            join('order_details','order_details.order_id','=','orders.id')
            ->join('products','order_details.product_id','=','products.id')
            ->where('orders.id', $order)
            ->select('products.pictures','products.name','orders.id','orders.comment')
            ->get();
        $data=['orders' => $orders];
        return view('orders_back', $data);

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

    }
}
