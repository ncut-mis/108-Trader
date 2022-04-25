@extends('layouts.master')

@section('title')

@section('content')
    <div class="table-responsive" style="margin-bottom:5%">
    <table class="table text-start align-middle table-bordered table-hover mb-0">
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
            @elseif($order->status=='1')
                <td >確認</td>
            @elseif($order->status=='2')
                <td >出貨中</td>
            @elseif($order->status=='3')
                <td >已出貨</td>
            @elseif($order->status=='4')
                <td >已送達</td>
            @elseif($order->status=='5')
                <td >已完成</td>
            @endif


            <td >{{$order->price}}</td>
                <td ><a href="{{route('orders.detail',$order->id)}}}">訂單詳細資料</a></td>


        </tr>
        </tfoot>
        </tbody>

    @endforeach
    </table>
    </div>
@endsection
