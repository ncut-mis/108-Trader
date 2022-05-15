@extends('seller.layouts.master')

@section('title','訂單詳細資料')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a>首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97"  ><a href="{{route('seller.orders.index')}}">訂單管理</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">詳細資料</li>
@endsection

@section('content')
    <thead>
    <tr>
        <th width="35" style="text-align: center">訂單編號</th>
{{--        <th width="20" style="text-align: center">商品名稱</th>--}}
        <th width="20" style="text-align: center">出貨日期</th>
{{--        <th width="20" style="text-align: center">商品數量</th>--}}
        <th width="20" style="text-align: center">付款方式</th>
        <th width="20" style="text-align: center">是否付款</th>
        <th width="20" style="text-align: center">訂單金額</th>
        <th width="20" style="text-align: center">訂單狀態</th>
        <th width="20" style="text-align: center">買家評分</th>
        <th width="20" style="text-align: center">買家評論</th>
    </tr>
    </thead>

    <td style="text-align: center">{{$data->id}}</td><!--訂單編號-->
    <td style="text-align: center">{{$data->date}}</td><!--出貨日期-->
    @if($data->way=='0')
        <td style="text-align: center">信用卡</td>
    @elseif($data->way=='1')
        <td style="text-align: center">現金</td>
    @endif
    @if($data->pay=='0')
        <td style="text-align: center">未付款</td>
    @elseif($data->pay=='1')
        <td style="text-align: center">已付款</td>
    @endif
    <td style="text-align: center">{{$data->price}}</td>

    @if($data->status=='0')
        <td style="text-align: center">新成立</td>
    @elseif($data->status=='1')
        <td style="text-align: center">確認</td>
    @elseif($data->status=='2')
        <td style="text-align: center">出貨中</td>
    @elseif($data->status=='3')
        <td style="text-align: center">已出貨</td>
    @elseif($data->status=='4')
        <td style="text-align: center">已送達</td>
    @elseif($data->status=='5')
        <td style="text-align: center">已完成</td>
    @endif
    @if($data->score=='')
        <td style="text-align: center">尚未評分</td><!--買家評分-->
    @else
        <td style="text-align: center">{{$data->score}}</td><!--買家評分-->
    @endif
    @if($data->comment=='')
        <td style="text-align: center">尚未評論</td><!--買家評論-->
    @else
        <td style="text-align: center">{{$data->comment}}</td><!--買家評論-->
    @endif




        <?php
//        $order=\Illuminate\Support\Facades\DB::table('orders')->select('id')->first();
//        $order1=\Illuminate\Support\Facades\DB::table('order_details')->select('product_id')->first();
//        $quantity=\Illuminate\Support\Facades\DB::table('order_details')->where('order_id','=',$order)->select('quantity')->first();
//        $name=\Illuminate\Support\Facades\DB::table('products')->where('id','=',$order1)->select('name')->first();

        ?>

    <thead>
    <tr style="background-color:#9D9D9D">
        <th width="20" style="text-align: center;color: white">商品名稱</th>
        <th width="20" style="text-align: center;color: white">商品數量</th>
        <th width="20" style="text-align: center;color: white">商品圖片</th>
        <th width="20" style="text-align: center;color: white">商品單價</th>
    </tr>
    </thead>
        <tbody>

            @foreach($data2 as $show2)
                @foreach($products as $product)
                    @if($show2->product_id==$product->id)


        <td style="text-align: center">{{$product->name}}</td><!--商品名稱-->

       <td style="text-align: center">{{$show2->quantity}}</td>

        <td><div><img  src="{{ asset('img/'.$product->pictures.'') }}" alt="IMG-PRODUCT" height="125" style="display:block; margin:auto;"></div></td>
        <td style="text-align: center">{{$product->price}}</td><!--商品金額-->
{{--            <td style="text-align: center">--}}

{{--                {{$array->$array[3]}}--}}

{{--                <br><hr class="sidebar-divider d-none d-md-block">--}}
{{--                買家評價:{{$show->score}}<br>--}}
{{--                {{$show->comment}}</td>--}}



{{--            <td style="text-align: center">{{}}</td>--}}





        <tfoot></tfoot>
        </tbody>


                    @endif
                      @endforeach
                            @endforeach


@endsection








