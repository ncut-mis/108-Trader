@extends('seller.layouts.master')

@section('title','商品管理')

@section('button')
    <a href="{{url('/products/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-facebook shadow-sm">新增商品</a>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
<li class="breadcrumb-item active" style="color: #4E4F97">所有商品</li>
@endsection

@section('content')
    <thead>
    <tr>
        <th >商品照片</th>
        <th >商品名稱</th>
        <th >類別</th>
        <th >價格</th>
        <th >上架狀態</th>
        <th >操作</th>
        <th >申請品質鑑定</th>

    </tr>
    </thead>

        <tfoot>
    <tbody>
    <tr >
        @foreach($data as $product)

        <?php
            $pic = $product->pictures;
        ?>
        <td>

            <img class="pic" src="{{ asset('img/'.$pic.'') }}"></td>

        <td>{{$product->name}}</td>

         @foreach($name as $cname)
         @if($product->category_id==$cname->id)
         <td>{{$cname->name}}</td>
         @endif
         @endforeach

        <td >{{$product->price}}</td>

        @if($product->status == '1')
            <td>已上架<br>
                <hr class="sidebar-divider d-none d-md-block">
            <b><a href="{{route('seller.products.stop',  $product->id)}}" style="color:#DC9FB4" onClick="return confirm('確定要下架此商品?')">下架</a></b>
            </td>
        @else
            <td>未上架<br>
                <hr class="sidebar-divider d-none d-md-block">
            <b><a href="{{route('seller.products.launch', $product->id)}}" style="color:#4E4F97" onClick="return confirm('確定要上架此商品?')">上架</a></b>
            </td>
        @endif

        <td>
            <b><a href="{{ route('seller.products.edit', $product->id) }}" style="color:#4E4F97">編輯</a></b><br>
            <hr class="sidebar-divider d-none d-md-block">
            <b><a href="{{ route('seller.products.destroy',$product->id) }}" style="color:#DC9FB4" onClick="return confirm('確定要刪除此商品?')">刪除</a></b>
        </td>
        <td><b><a href="{{ route('products.exams.create', $product->id) }}" style="color:#4E4F97">申請</a></b></td>

    </tr>
        </tfoot>
    </tbody>

    @endforeach
@endsection














