@extends('seller.layouts.master')

@section('title','商品管理')

@section('button')
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-facebook shadow-sm">新增商品</a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.products.index')}}">商品管理</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">專輯類</li>
@endsection

@section('content')
    <thead>
    <tr>
        <th width="20">商品圖片</th>
        <th width="20" >商品名稱</th>
        <th width="20" >類別</th>
        <th width="20" >價格</th>
        <th width="20" >庫存</th>
        <th width="20" >細節說明</th>
        <th width="20" >上架狀態</th>
        <th width="20" ></th>
        <th width="20" >申請品質鑑定</th>

    </tr>
    </thead>
    @foreach($data as $product)
        <tfoot>
        <tbody>
        <tr>
            <td ><img class="pic" src="/../../img/{{$product->picture}}"></td>
            <td >{{$product->name}}</td>
            <td >專輯</td>
            <td >{{$product->price}}</td>
            <td ></td>
            <td>{{$product->detail}}</td>

            @if($product->status == '1')
                <td >已上架<br>
                    <hr class="sidebar-divider d-none d-md-block">
                    <b><a href="{{route('seller.products.stop', $product->id)}}" style="color:#DC9FB4" onClick="return confirm('確定要下架此商品?')">下架</a></b>
                </td>
            @else
                <td >未上架<br>
                    <hr class="sidebar-divider d-none d-md-block">
                    <b><a href="{{route('seller.products.launch', $product->id)}}" style="color:#4E4F97" onClick="return confirm('確定要上架此商品?')">上架</a></b>
                </td>
            @endif

            <td >
                <a href="{{ route('seller.products.edit', $product->id) }}" style="color:#4E4F97">編輯</a><br>
                <hr class="sidebar-divider d-none d-md-block">
                <a href="{{ route('seller.products.destroy',  $product->id) }}" style="color:#DC9FB4" onClick="return confirm('確定要刪除此商品?')">刪除</a>
            </td>

            <td ><a href="{{ route('products.exams.create', $product->id) }}" style="color:#4E4F97">申請</a></td>
        </tr>
        </tfoot>
        </tbody>

    @endforeach
@endsection















