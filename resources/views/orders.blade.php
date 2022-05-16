@extends('layouts.master')

@section('title','訂單紀錄')

@section('content')

    <div class="table-responsive" style="margin-bottom:5%;text-align: center;">
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <ol class="breadcrumb mar">
            <li class="breadcrumb-item" style="color: grey"><a style="color: grey" href="/">首頁</a></li>
            <li class="breadcrumb-item active" style="color: grey"  ><a style="color: grey" href="{{route('orders.index')}}">所有訂單</a></li>
        </ol>
    <thead>
    <tr>
        <th style="text-align: center">訂單日期</th>
        <th style="text-align: center">訂單狀態</th>
        <th style="text-align: center">訂單金額</th>
        <th style="text-align: center">我的評分</th>
        <th style="text-align: center">我的評論</th>
        <th></th>
    </tr>
    </thead>
    @foreach($orders as $order)

            @if(isset($_GET['id']))
                @if($_GET['id'] == $order->id)
                    <?php
                        \App\Models\Order::where('id',$_GET['id'])->update(['comment'=>$_GET['comments']]);
                        echo "<script >alert('評論成功'); location.href ='/orders';</script>";
                    ?>
                @endif
            @elseif(isset($_GET['id2']))
                @if($_GET['id2'] == $order->id)
                    <?php
                        \App\Models\Order::where('id',$_GET['id2'])->update(['comment'=>$_GET['comments']]);
                        echo "<script >alert('評論修改成功'); location.href ='/orders';</script>";
                    ?>
                @endif
            @endif
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

            <td>${{$order->price}}</td>

            @if($order->score=='')
{{--                <td style="text-align: center"><a href="{{route('orders.scores',$order->id)}}}">前往評分</a></td>--}}
                @if(isset($_GET['order_id']))
                    @if($_GET['order_id'] == $order->id)
                        <td style="text-align: center">
                            <form action="{{route('orders.scores')}}">
                                <input type="number" name="scores" value="1" min="1" max="5" class="form-control text-center">
                                <input type="hidden" name="id" value="{{$order->id}}" class="form-control text-center">
                            </form>
                        </td>
                    @else
                        <td style="text-align: center">
                            <form action="{{route('orders.index')}}">
                                <input name="order_id" type='hidden' id='order_id' value="{{ $order->id }}">
                                <button>前往評分</button>
                            </form>
                        </td>
                    @endif
                @else
                    <td style="text-align: center">
                        <form action="{{route('orders.index')}}">
                            <input name="order_id" type='hidden' id='order_id' value="{{ $order->id }}">
                            <button>前往評分</button>
                        </form>
                    </td>
                @endif
            @else
                <td style="text-align: center">{{$order->score}}</td>
            @endif

            @if($order->comment == null)
                <td style="text-align: center"><a href="{{route('orders.comments',  $order->id )}}" style="color: black">前往評論</a></td>
            @else
                <td style="text-align: center"><a href="{{route('orders.comments',  $order->id )}}" style="color: black">查看評論</a></td>
            @endif
            <td><a href="{{route('orders.detail',$order->id)}}}">訂單詳細資料</a></td>
        </tr>
        </tfoot>
        </tbody>

    @endforeach
    </table>
    </div>
@endsection
