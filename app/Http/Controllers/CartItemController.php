<?php

namespace App\Http\Controllers;

use App\Models\Cart_item;
use App\Http\Requests\StoreCart_itemRequest;
use App\Http\Requests\UpdateCart_itemRequest;
use App\Models\Product;
use App\Models\Seller;

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
//            ->join('products','sellers.id','=','products.seller_id')
            ->select('sellers.id','users.name')
            ->get();

        $data1=['sellers' => $sellers];
        if(\Illuminate\Support\Facades\Auth::check())
        {
            $cart_items = Cart_item::
                join('products','cart_items.product_id','=','products.id')
                ->where('member_id',auth()->user()->id)
                ->select('products.seller_id','products.name','products.pictures','products.price','cart_items.id','cart_items.quantity')

                ->get();
            $data=['cart_items' => $cart_items];
            return view('carts', $data,$data1);
        }
        else
        {
            echo "<script >alert('尚未登入')</script>";
            return redirect()->route('login');
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
                        'quantity'=>1


                    ]
                );
                echo "<script>alert('已加入購物車'); location.href ='../';</script>";
            }
            else if($addOK==1) {
                 echo "<script>alert('已存在該商品'); location.href ='../';</script>"; //這種跳轉才會有訊息，但不知為何在這怪怪的
//               return redirect()->route('home.index');//先以不跳訊息的方式呈現
            }
        }
        else
        {
            echo "<script >alert('尚未登入')</script>";
            return redirect()->route('login');

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
    public function update(UpdateCart_itemRequest $request, Cart_item $cart_item)
    {
        //
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
