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
    <tr style="background-color:#9D9D9D">
        <th style="text-align: center;color: white">訂單日期</th>
        <th style="text-align: center;color: white">訂單狀態</th>
        <th style="text-align: center;color: white">訂單金額</th>
        <th style="text-align: center;color: white">我的評分</th>
        <th style="text-align: center;color: white">我的評論</th>
        <th width="30%" colspan='2'></th>
{{--        <th></th>--}}
    </tr>
    </thead>
    @foreach($orders as $order)

{{--        評論訂單    --}}
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

            @if(isset($_GET['id_back']))
                @if($_GET['id_back'] == $order->id)
                    <?php
                    \App\Models\Order::where('id',$_GET['id_back'])->update(['status'=>'6']);
                    echo "<script >alert('退貨申請成功'); location.href ='/orders';</script>";
                    ?>
                @endif
            @endif

        <tfoot>
        <tbody>
        @if($order->status=='7')
            <tr style="color: gray">
        @else
            <tr style="color: black">
        @endif

            <td >{{$order->date}}</td>

            @if($order->status=='0')
                <td >新成立</td>
            @elseif($order->status=='1')
                <td >確認</td>
            @elseif($order->status=='2')
                <td >備貨中</td>
            @elseif($order->status=='3')
                <td >已出貨</td>
            @elseif($order->status=='4')
                <td >已送達</td>
            @elseif($order->status=='5')
                <td >已完成</td>
            @elseif($order->status=='6')
                <td >退貨中</td>
            @elseif($order->status=='7')
                <td >已取消</td>
            @endif

            <td>${{$order->price}}</td>

            @if($order->status=='5')
                @if($order->score=='')
                    @if(isset($_GET['order_id']))
                        @if($_GET['order_id'] == $order->id)
                            <td style="text-align: center">
                                <form action="{{route('orders.scores')}}">
{{--                                    <input type="number" name="scores" value="1" min="1" max="5" class="form-control text-center">--}}
                                    <select name="scores">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <button style="color: #5389ff">評分</button>
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
                    <td style="text-align: center">{{$order->score}} / 5</td>
                @endif
            @else
                <td style="text-align: center">請先完成訂單</td>
            @endif

            @if($order->status=='5')
                @if($order->comment == null)
                    <td style="text-align: center"><a href="{{route('orders.comments',  $order->id )}}" style="color: black">前往評論</a></td>
                @else
                    <td style="text-align: center"><a href="{{route('orders.comments',  $order->id )}}" style="color: black">查看評論</a></td>
                @endif
            @else
                <td style="text-align: center">請先完成訂單</td>
            @endif

            @if($order->status=='7')
                <td><a href="{{route('orders.detail',$order->id)}}}" style="color: gray">訂單詳細資料</a></td>
            @else
                <td><a href="{{route('orders.detail',$order->id)}}}" style="color: black">訂單詳細資料</a></td>
            @endif

            <td>
                @if($order->status=='0')
                    <form action="{{ route('orders.cancel', $order->id) }}" style="display: inline">
                        <button class="btn btn-sm btn-info" type="submit" onClick="return confirm('確定要取消訂單?')">取消訂單</button> /
                    </form>
{{--                    下面方法有問題--}}
{{--                    <a href="{{route('orders.destroy', $order->id )}}" class="btn btn-sm btn-info" onClick="return confirm('確定要取消訂單?')">取消訂單</a> /--}}
                    <form style="display: inline">
                        <button class="btn btn-sm btn-danger" type="submit" disabled>退貨</button>
                    </form>
                @elseif($order->status=='4')
                    <form action="{{ route('orders.done', $order->id) }}" style="display: inline">
                        @csrf
                        <button class="btn btn-sm btn-success" type="submit" onClick="return confirm('確定要完成訂單?')">完成訂單</button> /
                    </form>
                   <form action="{{ route('orders.back', $order->id)}}" style="display: inline">
                        <button class="btn btn-sm btn-danger" type="submit" onClick="return confirm('確定要退貨?')">退貨</button>
                    </form>
                @else
                    <form style="display: inline">
                        <button class="btn btn-sm btn-success" type="submit" disabled>完成訂單</button> /
                    </form>
                    <form style="display: inline">
                        <button class="btn btn-sm btn-danger" type="submit" disabled>退貨</button>
                    </form>
                @endif
            </td>
        </tr>
        </tfoot>
        </tbody>

    @endforeach
    </table>
    </div>
@endsection
