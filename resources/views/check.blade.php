@extends('layouts.master')

@section('title','結帳')

@section('content')

    <div class="table-responsive" style="margin-bottom:5%;text-align: center;">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <ol class="breadcrumb mar">
                <li class="breadcrumb-item" style="color: grey"><a>首頁</a></li>
                <li class="breadcrumb-item active" style="color: grey"><a style="color: grey" href="{{route('cart_items.index')}}">購物車</a></li>
                <li class="breadcrumb-item" style="color: grey"><a>結帳</a></li>
            </ol>
            <thead>
            <tr>
                <th style="text-align: center">圖片</th>
                <th style="text-align: center">商品名稱</th>
                <th style="text-align: center">單價</th>
                <th style="text-align: center">數量</th>
                <th style="text-align: center">小計</th>
            </tr>
            </thead>
            <?php
                $cart_total = 0;
            ?>
            @foreach($checks as $checkout)
                <tfoot>
                <tbody>
                <tr>
                    <?php
                        $pic = $checkout->pictures;
                    ?>
                    <td style="text-align: center;vertical-align: middle">
                        <img src="{{ asset('img/'.$pic.'') }}" alt="IMG-PRODUCT" height="150">
                    </td>
                    <td style="text-align: center;vertical-align: middle">
                        {{$checkout->name}}
                    </td>
                    <td style="text-align: center;vertical-align: middle">
                        {{$checkout->price}}
                    </td>
                    <td style="text-align: center;vertical-align: middle">
                        {{$checkout->quantity}}
                    </td>
                    <td style="text-align: center;vertical-align: middle">
                        <?php
                            $sum = $checkout->price * $checkout->quantity;
                            $cart_total = $cart_total + $sum
                        ?>
                        ${{$sum}}
                    </td>
            @endforeach
                </tr>
                <tr>
                    <td colspan="5">
                        <div style="text-align: right">
                            <b>總計：<u>${{$cart_total}}</u></b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div style="text-align: center">
                            <b>基本資料</b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div style="text-align: left">
                            <b>姓名：</b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <div style="text-align: left">
                            <b>電話：</b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="9">
                        <div style="text-align: left">
                            <b>地址：</b>
                        </div>
                    </td>
                </tr>
                </tfoot>
                </tbody>
        </table>
    </div>
@endsection

