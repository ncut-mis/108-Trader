<?php

namespace App\Http\Controllers;

use App\Models\Cart_item;
use App\Http\Requests\StoreCart_itemRequest;
use App\Http\Requests\UpdateCart_itemRequest;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::
            join('users','sellers.member_id','=','users.id')
            ->select('sellers.id','users.name')
            ->get();

        $data1=['sellers' => $sellers];
        if(\Illuminate\Support\Facades\Auth::check())
        {
            $cart_items = Cart_item::
                join('products','cart_items.product_id','=','products.id')
                ->where('member_id',auth()->user()->id)
                ->select('products.seller_id','products.inventory','products.name','products.pictures','products.price','cart_items.id','cart_items.product_id','cart_items.quantity')
                ->get();
            $data2=['cart_items' => $cart_items];
            return view('carts', $data1,$data2);
        }
        else
        {
            echo "<script >alert('尚未登入'); location.href ='/login';</script>";
//            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  add($id) //store方法怪怪的，先自行創造add方法使用
    {
        $addOK=0; //避免重複的商品
        if(\Illuminate\Support\Facades\Auth::check())
        {

            $member_id=auth()->user()->id;

            $data = Cart_item::where('product_id',$id)->get();
            foreach ($data as $dates)
            {
                if($dates->member_id==$member_id)
                    $addOK=1;
            }

            if ($addOK==0){
                Cart_item::insert(
                    [

                        'member_id'=>$member_id,
                        'product_id'=>$id,
                        'quantity'=>$_GET['quantity']


                    ]
                );
                echo "<script>alert('已加入購物車'); location.href ='/cart_items';</script>";
            }
            else if($addOK==1) {
                 echo "<script>alert('已存在該商品'); location.href ='/cart_items';</script>";
            }
        }
        else
        {
            echo "<script >alert('尚未登入'); location.href ='/login';</script>";
        }

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCart_itemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCart_itemRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart_item  $cart_item
     * @return \Illuminate\Http\Response
     */
    public function show(Cart_item $cart_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart_item  $cart_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart_item $cart_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCart_itemRequest  $request
     * @param  \App\Models\Cart_item  $cart_item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCart_itemRequest $request,$cart_item)
    {
        //
    }

    public function renew()
    {
        Cart_item::where('id',$_GET['id'])->update(['quantity'=>$_GET['quantity']]);
        return redirect()->route('cart_items.index');
    }

    public function check($seller_id)
    {
        $check = Cart_item::
            join('products','cart_items.product_id','=','products.id')
            ->join('sellers','sellers.id','=','products.seller_id')
            ->where('cart_items.member_id',auth()->user()->id)
            ->where('sellers.id',$seller_id)
            ->select('products.pictures','products.name','products.price','cart_items.quantity','sellers.id')
            ->get();

        $data = ['checks' => $check];
        return view('check',$data);
    }

    public function next_step($seller_id)
    {
        $check2 = Cart_item::
        join('products','cart_items.product_id','=','products.id')
            ->join('sellers','sellers.id','=','products.seller_id')
            ->where('cart_items.member_id',auth()->user()->id)
            ->where('sellers.id',$seller_id)
            ->select('products.pictures','products.name','products.price','cart_items.quantity','sellers.id')
            ->get();

        $data2 = ['check2' => $check2];
        return view('customer',$data2);
    }

    public function done($seller_id)
    {
        if(!empty($_GET['card_number']) && !empty($_GET['card_date']) && !empty($_GET['card_csv']))
        {
            $done = Cart_item::
                join('products','cart_items.product_id','=','products.id')
                ->join('sellers','sellers.id','=','products.seller_id')
                ->where('cart_items.member_id',auth()->user()->id)
                ->where('sellers.id',$seller_id)
                ->select('products.id','products.inventory','products.price','cart_items.quantity')
                ->get();
            $date = date('Y/m/d');//抓當天日期
            $final_price = 0;
            foreach ($done as $finish)
            {
                $inventory = $finish->inventory - $finish->quantity;//最終庫存=庫存量-賣出數量
                $cart_total = $finish->price * $finish->quantity;//購物車商品金額
                $final_price = $final_price + $cart_total ;//累加為最終金額
                //更新收貨人資料
                //Order::where('id',auth()->user()->id)->update(['receiver'=>$_GET['name'],'receiver_phone'=>$_GET['phone'],'receiver_address'=>$_GET['address']]);
                //更新庫存
                Product::where('id',$finish->id)->update(['inventory'=>$inventory]);
            }
            //判斷付款方式
            $way = 0;
            $pay = 0;
            if($_GET['way']==0)
            {
                $way = 0;
                $pay = 1;
            }
            else if($_GET['way']==1)
            {
                $way = 1;
                $pay = 0;
            }
            //新增order
            Order::insert(['member_id'=>auth()->user()->id,'seller_id'=>$seller_id,'date'=>$date, 'status'=>'0','pay'=>$pay ,'way'=>$way,'price'=>$final_price,'receiver'=>$_GET['name'],'receiver_phone'=>$_GET['phone'],'receiver_address'=>$_GET['address']]);
            $order = Order::orderby('id','DESC')->first();
            foreach ($done as $dd)
            {
                //新增order_detail
                Order_detail::insert(['order_id'=>$order->id,'product_id'=>$dd->id,'quantity'=>$dd->quantity]);
            }
            $d = Cart_item::
                 join('products','cart_items.product_id','=','products.id')
                ->join('sellers','sellers.id','=','products.seller_id')
                ->where('cart_items.member_id',auth()->user()->id)
                ->where('sellers.id',$seller_id)
                ->select('cart_items.id')
                ->get();
            foreach ($d as $d2)
            {
                //刪除購物車內已下單之商品
                Cart_item::destroy($d2->id);
            }
            return redirect()->route('orders.index');
        }
        else
        {
            echo "<script>alert('請輸入卡號、到期日及安全碼'); location.href ='/next_step/".$seller_id."';</script>";
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart_item  $cart_item
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart_item)
    {
        Cart_item::destroy($cart_item);
        return redirect()->route('cart_items.index');
    }
}
