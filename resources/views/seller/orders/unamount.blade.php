@extends('seller.layouts.master')

@section('title','所有未進帳訂單')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="javascript:history.back()">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97" >所有未進帳訂單</li>

@endsection

@section('content')
    <thead>
    <tr>
        <th width="35" style="text-align: center">訂單編號</th>
{{--        <th width="20" style="text-align: center">商品名稱</th>--}}
        <th width="20" style="text-align: center">訂單狀態</th>
{{--        <th width="20" style="text-align: center">是否付款</th>--}}
{{--        <th width="20" style="text-align: center">付款方式</th>--}}
        <th width="20" style="text-align: center">訂單金額</th>
    </tr>
    </thead>

    @foreach($data as $show)

                    <tbody>
                    <tr>

                        <td style="text-align: center">{{$show->id}}</td><!--訂單編號-->
{{--                        <td style="text-align: center">{{$product->name}}</td><!--商品名稱-->--}}
                        @if($show->status=='0')
                            <td style="text-align: center" >新成立</td>
                        @elseif($show->status=='1')
                            <td style="text-align: center">確認</td>
                        @elseif($show->status=='2')
                            <td style="text-align: center" >出貨中</td>
                        @elseif($show->status=='3')
                            <td style="text-align: center" >已出貨</td>
                        @elseif($show->status=='4')
                            <td style="text-align: center" >已送達</td>
                        @elseif($show->status=='5')
                            <td style="text-align: center" >已完成</td>
                        @endif
{{--                        @if($show->pay=='0')--}}
{{--                            <td style="text-align: center">未付款</td>--}}
{{--                        @elseif($show->pay=='1')--}}
{{--                            <td style="text-align: center">已付款</td>--}}
{{--                        @endif--}}
{{--                        @if($show->way=='0')<!--付款方式-->--}}
{{--                        <td style="text-align: center">信用卡</td>--}}
{{--                        @elseif($show->way=='1')--}}
{{--                            <td style="text-align: center">現金</td>--}}
{{--                        @endif--}}
                        <td style="text-align: center">{{$show->price}}</td><!--訂單金額-->


                    </tr>

                    <tfoot></tfoot>
                    </tbody>


            @endforeach
                   <?php

                       echo '<td></td><td></td><td style="text-align: right"><a><strong>總計: ' .$_SESSION['unamount'].'</a></strong></td>';
                       ?>


@endsection









