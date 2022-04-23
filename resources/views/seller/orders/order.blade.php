@extends('layouts.master')
{{--@extends('seller.layouts.master')--}}
@section('title','訂單管理')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">訂單管理</a></li>
@endsection

@section('content')
    <thead>
    <tr>
        <th width="35" style="text-align: center">訂單編號</th>
        <th width="20" style="text-align: center">運送狀態</th>
        <th width="20" style="text-align: center"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td style="text-align: center"></td>
        <td></td>
        <td style="text-align: center"><a href="">修改</a></td>
    </tr>
    </tfoot>
    <tbody>
@endsection








