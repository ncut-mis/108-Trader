@extends('layouts.master')

@section('title','訂單詳細資料')

@section('content')
    <div class="table-responsive" style="margin-bottom:5%;text-align: center">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <ol class="breadcrumb mar">
                <li class="breadcrumb-item" style="color: grey"><a style="color: grey" href="/">首頁</a></li>
                <li class="breadcrumb-item active" style="color: grey"  ><a style="color: grey" href="{{route('orders.index')}}">所有訂單</a></li>
                <li class="breadcrumb-item active" style="color: grey">詳細資料</li>
            </ol>
            <thead>
            <tr style="background-color:#9D9D9D">
{{--                <th width="20" style="text-align: center">商品名稱</th>--}}
                <th width="20%" style="text-align: center;color: white">出貨日期</th>
{{--                <th width="20" style="text-align: center">訂單數量</th>--}}
                <th width="20%" style="text-align: center;color: white">付款方式</th>
                <th width="20%" style="text-align: center;color: white">是否付款</th>
                <th width="20%" style="text-align: center;color: white">訂單金額</th>
                <th width="20%" style="text-align: center;color: white">訂單狀態</th>
{{--                <th width="20" style="text-align: center">我的評分</th>--}}
{{--                <th width="20" style="text-align: center">我的評論</th>--}}
            </tr>
            </thead>
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
            <td style="text-align: center">${{$data->price}}</td>

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
            @elseif($data->status=='6')
                <td >退貨中</td>
            @endif

            <thead>
            <tr style="background-color:#9D9D9D">
                <th width="20%" style="text-align: center;color: white">商品圖片</th>
                <th width="20%" style="text-align: center;color: white">商品名稱</th>
                <th width="20%" style="text-align: center;color: white">商品數量</th>
                <th width="20%" style="text-align: center;color: white">商品單價</th>
                <th width="20%" style="text-align: center;color: white">商品總計</th>
            </tr>
            </thead>

            <tbody>
            <?php
                $total=0;
            ?>
            @foreach($data2 as $show2)
                @foreach($products as $product)
                    @if($show2->product_id==$product->id)
                        {{--                            <tr>--}}
                        <td>
                            <div><img  src="{{ asset('img/'.$product->pictures.'') }}" alt="IMG-PRODUCT" height="125" style="display:block; margin:auto;"></div>
                        </td>
                        <td style="text-align: center;vertical-align: middle">{{$product->name}}</td><!--商品名稱-->
                        <td style="text-align: center;vertical-align: middle">{{$show2->quantity}}</td><!--商品數量-->
                        <td style="text-align: center;vertical-align: middle">${{$product->price}}</td><!--商品金額-->
                        <?php
                            $total=$show2->quantity * $product->price;
                        ?>
                        <td style="text-align: center;vertical-align: middle">${{$total}}</td>
            {{--                                <?php--}}
            {{--                                    $sum = $show2->quantity * $product->price;--}}
            {{--                                ?>--}}
            {{--                                <td style="text-align: center">{{$sum}}</td>--}}
            {{--                            </tr>--}}
            <tfoot></tfoot>
            </tbody>
                    @endif
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
{{--                @foreach($data2 as $show2)--}}
{{--                    @foreach($products as $product)--}}
{{--                        @if($show2->product_id==$product->id)--}}

{{--                            <tr>--}}
{{--                                <td style="text-align: center">{{$product->name}}</td><!--商品名稱-->--}}

{{--<<<<<<< HEAD--}}
{{--                                @if($show->status=='0')--}}
{{--                                    <td style="text-align: center">新成立</td>--}}
{{--                                @elseif($show->status=='1')--}}
{{--                                    <td style="text-align: center">確認</td>--}}
{{--                                @elseif($show->status=='2')--}}
{{--                                    <td style="text-align: center">出貨中</td>--}}
{{--                                @elseif($show->status=='3')--}}
{{--                                    <td style="text-align: center">已出貨</td>--}}
{{--                                @elseif($show->status=='4')--}}
{{--                                    <td style="text-align: center">已送達</td>--}}
{{--                                @elseif($show->status=='5')--}}
{{--                                    <td style="text-align: center">已完成</td>--}}
{{--                                @endif--}}
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
{{--=======--}}
{{--                                <td style="text-align: center">{{$show2->quantity}}</td><!--商品數量-->--}}
{{--                                <td>--}}
{{--                                    <div><img  src="{{ asset('img/'.$product->pictures.'') }}" alt="IMG-PRODUCT" height="125" style="display:block; margin:auto;"></div>--}}
{{--                                </td>--}}
{{--                                <td style="text-align: center">{{$product->price}}</td><!--商品金額-->--}}

{{--                                --}}{{--                                <?php--}}
{{--                                    $sum = $show2->quantity * $product->price;--}}
{{--                                ?>--}}
{{--                                <td style="text-align: center">{{$sum}}</td>--}}

{{-->>>>>>> 338323317f98a076d6c724f5ff52d919e2ca1563--}}


{{--                            </tr>--}}

{{--                            <tfoot></tfoot>--}}
{{--                            </tbody>--}}

{{--    @endif--}}
{{--    @endforeach--}}
{{--    @endforeach--}}

{{--        </table>--}}
{{--    </div>--}}
{{--@endsection--}}
