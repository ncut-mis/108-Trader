@extends('seller.layouts.master')

@section('title','品質鑑定商品')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">品質鑑定商品</li>
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

            @if($exam->pass=='0')
            <td>未通過</td>
            @elseif($exam->pass=='1')
            <td>通過</td>
            @else
            <td>尚未檢測</td>
            @endif

            @if($exam->perfect=='0')
                <td>非優良</td>
            @elseif($exam->perfect=='1')
                <td>優良</td>
            @else
            <td>尚未檢測</td>
            @endif

            <td>{{$exam->date}}</td>

            @if($exam->date<date('Y-m-d'))

            <td>已完成</td>

            @elseif($exam->date==date('Y-m-d') && $exam->start<date('H-i-s'))
            <td>已完成</td>

            @elseif($exam->date==date('Y-m-d') && $exam->start>date('H-i-s-30minutes'))
            <td><a href="{{ route('products.exams.destroy',$exam->id) }}" onclick="return confirm('確定要取消檢測?')">取消檢測</a></td>

            @else
            <td><a href="{{ route('products.exams.destroy',$exam->id) }}" onclick="return confirm('確定要取消檢測?')">取消檢測</a></td>

            @endif

        </tr>
        </tfoot>
        </tbody>
          @endif
         @endforeach
     @endforeach
    @endforeach
@endsection


