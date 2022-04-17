@extends('seller.layouts.master')

@section('title','品質鑑定申請')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
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
            <form action="/products/{{$pid}}/exams" method="POST" role="form" class="row g-3 ">
                @method('POST')
                @csrf

                <div class="row g-3">
                    <div class="col-md-12 mb-3">
                        <label for="inputname" class="form-label">商品名稱</label>
                        <input type="text" class="form-control"  aria-label="name" value="{{$name}}">
                    </div>

                    <div class="col-md-7 mb-3">
                        <label for="inputtime" class="form-label">預約日期</label>
                        <input type="date" class="form-control"  aria-label="time" >
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="inputtime" class="form-label">預約時段</label>
                        <input type="time" class="form-control"  aria-label="time" >
                    </div>

                </div>


                <div class="card" style="color: #577C8A;margin-top: 20px">
                    <div class="card-body">
                        <h5 class="card-title">信用卡資料</h5><hr>
                        <div class="row g-3">

                        <div class="col-md-7 mb-auto">
                            <label for="no" class="form-label ">信用卡/簽帳金融卡號</label>
                            <input type="text" class="form-control" id="no" value="1234-1234-5678-5678" pattern="[0-9]{13,16}" >
                        </div>

                            <div class="col-md-7" style="margin-top: 20px">
                                <label for="date" class="form-label">到期日</label>
                                <input type="text" class="form-control" aria-label="date" value="07/28" pattern="[0-9]{4}">
                            </div>


                            <div class="col-md-2" style="margin-top: 20px">
                                <label for="csv" class="form-label">安全碼</label>
                                <input type="text" class="form-control" aria-label="csv" value="123" pattern="[0-9]{3}">
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
