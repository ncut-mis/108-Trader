@extends('seller.layouts.master')

@section('title','品質鑑定申請')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">申請品質鑑定</li>
@endsection

@section('content')
    <style>
        .mar
        {
            margin-bottom: 20px;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form action="/products/{{$pid}}/exams" method="POST" role="form" class="row g-3" name="aa">
                @method('POST')
                @csrf

                <div class="row g-3">
                    <div class="col-md-7 mb-3">
                        <label for="inputname" class="form-label">商品名稱</label>
                        <input type="text" class="form-control"  aria-label="name" value="{{$name}}" disabled>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="inputname" class="form-label">類別</label>
                        <input type="text" class="form-control"  aria-label="name" value="{{$category}}" disabled>
                    </div>

                    <div class="col-md-7 mb-3">
                        <label for="inputtime" class="form-label">檢測日期</label>
                        <input type="date" class="form-control"  aria-label="time" value="<?php use App\Models\Category;use App\Models\Exam;use App\Models\Per_week_schedule;use App\Models\Product;use App\Models\Staff;echo date ("Y-m-d")?>"
                         min="<?php echo date ("Y-m-d"); ?>" max="<?php echo date ("Y-m-d"); ?>">
                    </div>

                <div class="col-md-2 mb-3">
                        <label for="inputtime" class="form-label">檢測時段</label>
                        <select  class="form-control"  aria-label="time" name="time">

                          @foreach($work as $w)
                          @foreach($staff as $staffs)
                          @if($staffs->id==$w->staff_id && $exam->date==date('Y-m-d') && $w->start!=$exam->start && $w->end!=$exam->end && $w->start!=$exam->end && $w->end!=$exam->start)
                           <option >{{$w->start}} </option>

                          @endif

                          @endforeach
                            @endforeach

                        </select>
                    </div>
                </div>


        <div class="card" style="color: #577C8A;margin-top: 20px">
                    <div class="card-body">
                        <h5 class="card-title">信用卡資料</h5><hr>
                        <div class="row g-3">

                        <div class="col-md-7 mb-auto">
                            <label for="no" class="form-label ">信用卡/簽帳金融卡號(Visa/Mastercard/JCB)</label>
                            <input type="text" class="form-control" id="no"  pattern="[0-9]{13,16}" >
                        </div>


                            <div class="col-md-4 mb-auto" >
                                <label for="csv" class="form-label">信用卡到期日</label>
                                <input type="text" class="form-control" aria-label="date" >
                            </div>

                            <div class="col-md-3 mb-auto" style="margin-top: 20px">
                                <label for="csv" class="form-label">信用卡安全碼(CSV)</label>
                                <input type="text" class="form-control" aria-label="csv"  pattern="[0-9]{3}">
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-12" style="margin-top:20px ">
                    <button class="btn btn-facebook " type="submit">確認</button>
                </div>

            </form>
        </div>
       </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
        </div>
    </div>

    <!-- /.row -->
@endsection
