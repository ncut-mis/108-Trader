@extends('seller.layouts.master')

@section('title','商品管理')

@section('button')
    <a href="" class="btn btn btn-info">新增商品</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">商品管理</a></li>
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">書籍類</a></li>
@endsection

@section('content')
    <thead>
    <tr>
        <th width="35" style="text-align: center">商品名稱</th>
        <th width="20" style="text-align: center">類別</th>
        <th width="20" style="text-align: center">數量</th>
        <th width="20" style="text-align: center">價格</th>
        <th width="35" style="text-align: center">狀態</th>
        <th width="40" style="text-align: center"></th>
        <th width="35" style="text-align: center">申請品質鑑定</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td style="text-align: center"></td>
        <td></td>
        <td style="text-align: center"></td>
        <td></td>
        <td></td>
        <td style="text-align: center">
            <a href="">編輯</a> /
            <a href="">刪除</a>
        </td>
        <td></td>
    </tr>
    </tfoot>
    <tbody>
@endsection















