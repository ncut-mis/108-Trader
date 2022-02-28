@extends('seller.layouts.master')

@section('title','賣家後台')

@section('button')
<a href="" class="btn btn btn-info">新增商品</a>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
@endsection

@section('content')
    <thead>
    <tr>
        <th width="35" style="text-align: center">商品名稱</th>
        <th width="20" style="text-align: center">類別</th>
        <th width="20" style="text-align: center">數量</th>
        <th width="10" style="text-align: center">價格</th>
        <th width="30" style="text-align: center">細節說明</th>
        <th width="10" style="text-align: center">狀態</th>
        <th width="35" style="text-align: center"></th>
        <th width="30" style="text-align: center">申請品質鑑定</th>
    </tr>
    </thead>
    @foreach($products as $product)
        <tfoot>
    <tr>
        <td style="text-align: center">{{$product->name}}</td>
        <td style="text-align: center">{{$product->category_id}}</td>
        <td style="text-align: center"></td>
        <td style="text-align: center">{{$product->price}}</td>
        <td>{{$product->detail}}</td>
        <td>{{$product->status}}</td>
        <td>
            <a href="">編輯</a> /
            <a href="">刪除</a>
        </td>
        <td></td>
    </tr>
        </tfoot>
    <tbody>

    @endforeach
@endsection














