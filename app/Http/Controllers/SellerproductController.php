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
        $num=Order::where('seller_id','=',auth()->user()->id)->count();
        $count=Order::where('seller_id','=',auth()->user()->id)->where('score','!=','')->where('comment','!=','')->count();
        $total=Order_detail::orderby('id','ASC')->get();
        $id = Product::orderby('id', 'ASC')->get();
        $category=Category::orderBy('id', 'ASC')->get();

        $price=0;
        $p[]='';
        $score=0;

        foreach ($order as $o)
        {
                foreach ($total as $sum)
                {
                    if($sum->order_id==$o->id)
                    {
                      $score+=$sum->score;
                    }
                }
                $price=$price+$o->price;
                $p[]=$o['price'];
        }
        if($count>0)
        {
            $score=$score/$count;
        }

        return view('seller.dashboard', compact('price','count','p','num','score'));


    }

    public function detail($id)
    {
        $data = Product::where('seller_id', auth()->user()->id)->where('id','=',$id)->get();

        $name=Category::all();

        return view('seller.products.detail', compact('data','name'));
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
            'category_id'=>$_POST['type'],'name'=>$_POST['name'],'pictures'=>$_POST['photo'],
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
