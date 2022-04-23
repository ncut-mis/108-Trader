@extends('seller.layouts.master')

@section('title','所有評論&評分')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="javascript:history.back()">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97" >所有評論&評分</li>

@endsection

@section('content')
    <thead>
    <tr>
        <th width="35" style="text-align: center">訂單編號</th>
        <th width="20" style="text-align: center">商品名稱</th>
        <th width="20" style="text-align: center">出貨日期</th>
        <th width="20" style="text-align: center">買家編號</th>
        <th width="20" style="text-align: center">買家名稱</th>
        <th width="20" style="text-align: center">買家評分</th>
        <th width="20" style="text-align: center">買家評論</th>
    </tr>
    </thead>

    @foreach($data as $show)
        @foreach($data2 as $show2)
            @foreach($products as $product)
                @foreach($members as $member)
                @if($show->id==$show2->order_id&&$show2->product_id==$product->id&&$show->member_id==$member->id)
                    <tbody>
                    <tr>

                        <td style="text-align: center">{{$show->id}}</td><!--訂單編號-->
                        <td style="text-align: center">{{$product->name}}</td><!--商品名稱-->
                        <td style="text-align: center">{{$show->date}}</td><!--出貨日期-->
                        <td style="text-align: center">{{$member->id}}</td><!--買家編號-->
                        <td style="text-align: center">{{$member->name}}</td><!--買家名稱-->
                        @if($show->score=='')
                            <td style="text-align: center">尚未評分</td><!--買家評分-->
                        @else
                            <td style="text-align: center">{{$show->score}}</td><!--買家評分-->
                        @endif
                        @if($show->score=='')
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
    @endforeach
@endsection









