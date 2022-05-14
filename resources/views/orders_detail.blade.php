@extends('layouts.master')

@section('title')

@section('content')
    <div class="table-responsive" style="margin-bottom:5%;text-align: center">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <ol class="breadcrumb mar">
                <li class="breadcrumb-item" style="color: grey"><a>首頁</a></li>
                <li class="breadcrumb-item active" style="color: grey"  ><a style="color: grey" href="{{route('orders.index')}}">所有訂單</a></li>
                <li class="breadcrumb-item active" style="color: grey">詳細資料</li>
            </ol>
            <thead>
            <tr>
                <th width="20" style="text-align: center">商品名稱</th>
                <th width="20" style="text-align: center">出貨日期</th>
                <th width="20" style="text-align: center">訂單數量</th>
                <th width="20" style="text-align: center">付款方式</th>
                <th width="20" style="text-align: center">是否付款</th>
                <th width="20" style="text-align: center">訂單金額</th>
                <th width="20" style="text-align: center">訂單狀態</th>
{{--                <th width="20" style="text-align: center">我的評分</th>--}}
{{--                <th width="20" style="text-align: center">我的評論</th>--}}
            </tr>
            </thead>

            @foreach($data as $show)
                @foreach($data2 as $show2)
                    @foreach($products as $product)
                        @if($show2->product_id==$product->id)
                            <tbody>
                            <tr>
                                <td style="text-align: center">{{$product->name}}</td><!--商品名稱-->
                                <td style="text-align: center">{{$show->date}}</td><!--出貨日期-->
                                <td style="text-align: center">{{$show2->quantity}}</td><!--訂單數量-->
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
                                <?php
                                    $sum = $show2->quantity * $product->price;
                                ?>
                                <td style="text-align: center">{{$sum}}</td>

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
{{--                                @if($show->score=='')--}}
{{--                                    <td style="text-align: center"><a href="#">前往評分</a></td><!--買家評分-->--}}
{{--                                @else--}}
{{--                                    <td style="text-align: center">{{$show->score}}</td><!--買家評分-->--}}
{{--                                @endif--}}
{{--                                @if($show->comment=='')--}}
{{--                                    <td style="text-align: center"><a href="#">前往評論</a></td><!--買家評論-->--}}
{{--                                @else--}}
{{--                                    <td style="text-align: center">{{$show->comment}}</td><!--買家評論-->--}}
{{--                                @endif--}}

                            </tr>

                            <tfoot></tfoot>
                            </tbody>

    @endif
    @endforeach
    @endforeach
    @endforeach
        </table>
    </div>
@endsection
