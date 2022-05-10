@extends('seller.layouts.master')

@section('title','品質鑑定商品')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">未完成品質鑑定商品</li>
@endsection

@section('content')
    <thead>
    <tr>
        <th width="20" >商品名稱</th>
        <th width="20" >類別</th>
        <th width="20" >是否通過</th>
        <th width="20" >是否優良</th>
        <th width="20" >鑑定日期</th>
        <th width="20" >檢測情形</th>

    </tr>
    </thead>
    @foreach($product as $exam)
    @foreach($name as $pname)
        @foreach($category as $pcategory)
            @if($pname->id==$exam->product_id && $pname->category_id==$pcategory->id)
        <tfoot>
        <tbody>
        <tr>
            <td>{{$pname->name}}</td>
            <td>{{$pcategory->name}}</td>

            <td>尚未檢測</td>

            <td>尚未檢測</td>

            <td>{{$exam->date}}</td>

            <td><a href="{{ route('products.exams.destroy',$exam->id) }}" onclick="return confirm('確定要取消檢測?')" >取消檢測</a></td>

        </tr>
        </tfoot>
        </tbody>
            @endif
        @endforeach
    @endforeach
    @endforeach
@endsection



