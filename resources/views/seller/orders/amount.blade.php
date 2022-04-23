@extends('seller.layouts.master')

@section('title','所有評論&評分')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="javascript:history.back()">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97" >所有訂單進帳</li>

@endsection

@section('content')
    <thead>
    <tr>
        <th width="35" style="text-align: center">訂單編號</th>
        <th width="20" style="text-align: center">商品名稱</th>
        <th width="20" style="text-align: center">訂單狀態</th>
        <th width="20" style="text-align: center">是否付款</th>
        <th width="20" style="text-align: center">付款方式</th>
        <th width="20" style="text-align: center">訂單金額</th>
    </tr>
    </thead>

    @foreach($data as $show)
        @foreach($data2 as $show2)
            @foreach($products as $product)

                    @if($show->id==$show2->order_id&&$show2->product_id==$product->id)
                        <tbody>
                        <tr>

                            <td style="text-align: center">{{$show->id}}</td><!--訂單編號-->
                            <td style="text-align: center">{{$product->name}}</td><!--商品名稱-->
                            <td style="text-align: center">已完成</td><!--訂單狀態,在controller做過篩選了，必定為5-->
                            <td style="text-align: center">已付款</td><!--付款狀態,同上-->
                            @if($show->way=='0')<!--付款方式-->
                                <td style="text-align: center">信用卡</td>
                            @elseif($show->way=='1')
                                <td style="text-align: center">現金</td>
                            @endif
                            <td style="text-align: center">{{$show->price}}</td><!--訂單金額-->


                        </tr>

                        <tfoot></tfoot>
                        </tbody>

                    @endif
                @endforeach
            @endforeach
        @endforeach

@endsection









