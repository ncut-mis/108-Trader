@extends('seller.layouts.master')

@section('title','訂單管理')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">訂單管理</li>
@endsection

@section('content')
    <thead>
    <tr>
        <th>訂單編號</th>
        <th>訂單狀態</th>
        <th>訂單金額</th>
        <th></th>
    </tr>
    </thead>
    @foreach($data as $order)
    <tfoot>
    <tbody>
    <tr>
        <td >{{$order->id}}</td>

        @if($order->status=='0')
            <td >新成立</td>
{{--        @elseif($order->status=='1')--}}
{{--            <td >確認</td>--}}
{{--        @elseif($order->status=='2')--}}
{{--            <td >出貨中</td>--}}
{{--        @elseif($order->status=='3')--}}
{{--            <td >已出貨</td>--}}
        @elseif($order->status=='4')
            <td >已送達</td>
        @elseif($order->status=='5')
            <td >已完成</td>
        @elseif($order->status=='6')
            <td >退貨中</td>
        @elseif($order->status=='7')
            <td >取消</td>
        @endif
        @if($order->status!='0'&&$order->status!='4'&&$order->status!='5'&&$order->status!='6'&&$order->status!='7')
        <td>
        <select onChange="location = this.options[this.selectedIndex].value;">


            @if($order->status=='1')

                  <option value="#">確認</option>
                  <option value="/seller/orders/status/{{$order->id}}/2">備貨中</option>
                  <option value="/seller/orders/status/{{$order->id}}/3">已出貨</option>
                  <option value="/seller/orders/status/{{$order->id}}/4">已送達</option>


            @elseif($order->status=='2')
                <option value="#">備貨中</option>
                <option value="/seller/orders/status/{{$order->id}}/3">已出貨</option>
                <option value="/seller/orders/status/{{$order->id}}/4">已送達</option>

            @elseif($order->status=='3')
                 <option value="#">已出貨</option>
                 <option value="/seller/orders/status/{{$order->id}}/4">已送達</option>
            @endif
        </select>
        </td>
        @endif


        <td >{{$order->price}}</td>
        @if($order->status=='0')
        <td ><a style="color:red" href="{{route('seller.products.confirm',$order->id)}}}">確認訂單</a></td>
        @else
         <td ><a href="{{route('seller.products.detail',$order->id)}}}">訂單詳細資料</a></td>
        @endif

    </tr>
    </tfoot>
    </tbody>
@endforeach
@endsection








