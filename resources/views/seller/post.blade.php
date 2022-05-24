@extends('seller.layouts.master')

@section('title','賣家公告')


@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">賣家公告</li>
@endsection

@section('content')
<thead>
<tr>
    <th >標題</th>
    <th >內容</th>

</tr>
</thead>

<tfoot>
<tbody>
<tr>


@endsection
