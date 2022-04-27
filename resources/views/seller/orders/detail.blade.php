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
        <th width="20" style="text-align: center">商品名稱</th>
        <th width="20" style="text-align: center">出貨日期</th>
        <th width="20" style="text-align: center">訂單數量</th>
        <th width="20" style="text-align: center">付款方式</th>
        <th width="20" style="text-align: center">是否付款</th>
        <th width="20" style="text-align: center">訂單金額</th>
        <th width="20" style="text-align: center">訂單狀態</th>
        <th width="20" style="text-align: center">買家評分</th>
        <th width="20" style="text-align: center">買家評論</th>
    </tr>
    </thead>

        @foreach($data as $show)
            @foreach($data2 as $show2)
                @foreach($products as $product)
                    @if($show2->product_id==$product->id)
        <?php
//        $order=\Illuminate\Support\Facades\DB::table('orders')->select('id')->first();
//        $order1=\Illuminate\Support\Facades\DB::table('order_details')->select('product_id')->first();
//        $quantity=\Illuminate\Support\Facades\DB::table('order_details')->where('order_id','=',$order)->select('quantity')->first();
//        $name=\Illuminate\Support\Facades\DB::table('products')->where('id','=',$order1)->select('name')->first();

        ?>
        <tbody>
        <tr>

            <td style="text-align: center">{{$show->id}}</td><!--訂單編號-->
            <td style="text-align: center">{{$product->name}}</td><!--商品名稱-->
            <td style="text-align: center">{{$show->date}}</td><!--出貨日期-->
            <td style="text-align: center">{{$show2->quantity}}</td><!--訂單數量-->

{{--            <td style="text-align: center">--}}

{{--                {{$array->$array[3]}}--}}

{{--                <br><hr class="sidebar-divider d-none d-md-block">--}}
{{--                買家評價:{{$show->score}}<br>--}}
{{--                {{$show->comment}}</td>--}}



{{--            <td style="text-align: center">{{}}</td>--}}

            @if($show->way=='0')
            <td style="text-align: center">信用卡</td>
            @elseif($show->way=='1')
            <td style="text-align: center">現金</td>
            @endif
            @if($show->pay=='0')
                <td style="text-align: center">未付款</td>
            @elseif($show->pay=='1')
                <td style="text-align: center">已付款</td>
            @endif
            <td style="text-align: center">{{$show->price}}</td>

            @if($show->status=='0')
                <td style="text-align: center">新成立</td>
            @elseif($show->status=='1')
                <td style="text-align: center">確認</td>
            @elseif($show->status=='2')
                <td style="text-align: center">出貨中</td>
            @elseif($show->status=='3')
                <td style="text-align: center">已出貨</td>
            @elseif($show->status=='4')
                <td style="text-align: center">已送達</td>
            @elseif($show->status=='5')
                <td style="text-align: center">已完成</td>
            @endif
            @if($show->score=='')
            <td style="text-align: center">尚未評分</td><!--買家評分-->
            @else
            <td style="text-align: center">{{$show->score}}</td><!--買家評分-->
            @endif
            @if($show->comment=='')
                <td style="text-align: center">尚未評論</td><!--買家評論-->
            @else
                <td style="text-align: center">{{$show->comment}}</td><!--買家評論-->
            @endif

        </tr>

        <tfoot></tfoot>
        </tbody>

                    @endif
                      @endforeach
                            @endforeach
                                 @endforeach
@endsection








