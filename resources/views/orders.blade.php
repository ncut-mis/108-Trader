@extends('layouts.master')

@section('title')

@section('content')

    <div class="table-responsive" style="margin-bottom:5%;text-align: center;">
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <ol class="breadcrumb mar">
            <li class="breadcrumb-item" style="color: grey"><a>首頁</a></li>
            <li class="breadcrumb-item active" style="color: grey"  ><a style="color: grey" href="{{route('orders.index')}}">所有訂單</a></li>
        </ol>
    <thead>
    <tr>
        <th style="text-align: center">訂單日期</th>
        <th style="text-align: center">訂單狀態</th>
        <th style="text-align: center">訂單金額</th>
        <th></th>
    </tr>
    </thead>
    @foreach($data as $order)
        <tfoot>
        <tbody>
        <tr>
            <td >{{$order->date}}</td>

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
