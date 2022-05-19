@extends('layouts.master')

@section('title','訂單退貨申請')

@section('content')
    <ol class="breadcrumb mar">
        <li class="breadcrumb-item" style="color: grey"><a style="color: grey" href="/">首頁</a></li>
        <li class="breadcrumb-item active" style="color: grey" ><a style="color: grey" href="{{route('orders.index')}}">所有訂單</a></li>
        <li class="breadcrumb-item active" style="color: grey" >評論</li>
    </ol>
    <div class="row">
        <div class="col-lg-6">
            <table class="table table-bordered table-hover" cellpadding="10" cellspacing="10">
                <thead>
                    <tr>
                        <th colspan='2' style="text-align: center;background-color:#9D9D9D;color: white">
                            訂單資料
                        </th>
                    </tr>
                    <tr>
                        <th width="20%" style="text-align: center">圖片</th>
                        <th style="text-align: center">商品名稱</th>
                    </tr>
                </thead>

            @foreach($orders as $order)
                <tfoot>
                <tbody>
                <tr>
                    <?php
                        $p=$order->pictures;
                    ?>
                    <td>
                        <img src="{{ asset('img/'.$p.'') }}" alt="IMG-PRODUCT" height="150">
                    </td>

                    <td style="text-align: center;vertical-align: middle">
                        {{$order->name}}
                    </td>
                    <?php
                        $o=\App\Models\Order::where('id',$order->id)->first();
                    ?>
            @endforeach
                    </tfoot>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <table class="table table-bordered table-hover" cellpadding="10" cellspacing="10">
                <thead>
                    <tr>
                        <th style="text-align: center;background-color:#9D9D9D;color: white">
                            退貨原因
                        </th>
                    </tr>
                        <form action="{{route('orders.index')}}">
                            <tr>
                                <td>
                                    <textarea style="border:1px lightgray solid;" rows="15" cols="70" name="reasons" id="reasons"></textarea>
                                    <div class="flex-c-m flex-w w-full p-t-15">
    {{--                                <p>&nbsp;</p>--}}
                                        <input name="id_back" type='hidden' id='id_back' value="{{ $o->id }}">
                                        <button class="btn btn-primary">提交</button>
                                    </div>
                                </td>
                            </tr>
                        </form>
                </thead>
            </table>
        </div>
    </div>

@endsection
