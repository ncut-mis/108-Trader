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
{{--        @foreach($data2 as $show2)--}}
{{--            @foreach($products as $product)--}}
{{--                @foreach($members as $member)--}}
{{--                @if($show->member_id==$member->id)--}}
                    <tbody>
                    <tr>

                        <td style="text-align: center">{{$show->id}}</td><!--訂單編號-->
                        <td style="text-align: center">
                        @foreach($data2 as $show2)
                            @foreach($products as $product)
                                @if($show->id==$show2->order_id&&$show2->product_id==$product->id)

                        {{$product->name}}<br><!--商品名稱-->
                                @endif
                        @endforeach
                        @endforeach
                        </td>
                        <td style="text-align: center">{{$show->date}}</td><!--出貨日期-->
                        @foreach($members as $member)
                          @if($show->member_id==$member->id)
                              @if(strlen($member->id)==3)
                        <td style="text-align: center">{{$member->id}}</td><!--買家編號-->
                              @elseif(strlen($member->id)==2)
                        <td style="text-align: center">0{{$member->id}}</td><!--買家編號-->
                              @elseif(strlen($member->id)==1)
                         <td style="text-align: center">00{{$member->id}}</td><!--買家編號-->
                                @endif
                        <td style="text-align: center">{{$member->name}}</td><!--買家名稱-->
                            @endif
                        @endforeach
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

{{--                   @endif--}}
                @endforeach
{{--            @endforeach--}}
{{--        @endforeach--}}
{{--    @endforeach--}}
@endsection









