<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
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

    public function dashboard()
    {
        $order=Order::where('seller_id','=',auth()->user()->id)->get();
        $count=Order::where('seller_id','=',auth()->user()->id)->count();
        $total=Order_detail::orderby('id','ASC')->get();
        $quantity=0;
        $price=0;
        $score=0;

        foreach ($order as $o)
        {
                foreach ($total as $sum)
                {
                    if($sum->order_id==$o->id)
                    {
                        $quantity=$quantity+$sum->quantity;
                    }
                }
                $price=$price+$o->price;
                $score=$score+$o->score;
                $p[]=$o['price'];;
        }

        $score=number_format($score/$count,1);

        return view('seller.dashboard', compact('quantity','price','score','count','p'));

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
        $data = Category::all();
        return view('seller.products.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       Product::create(['seller_id'=>auth()->user()->id,
            'category_id'=>$_POST['type'],'name'=>$_POST['name'],'picture'=>$_POST['photo'],
            'price'=>$_POST['price'],'detail'=>$_POST['content'],'status'=>$_POST['status'],'stock'=>$_POST['stock']]);

        return redirect()->route('seller.products.index');
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

        $name=Category::all();

        return view('seller.products.edit', compact('product','name'));
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
