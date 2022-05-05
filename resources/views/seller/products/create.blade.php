@extends('seller.layouts.master')

@section('title','新增商品')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">新增商品</li>
@endsection

@section('content')

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
            <form action="/seller/products" method="POST" role="form">
                @method('POST')
                @csrf

                <div class="form-group">
                    <label for="name">商品名稱</label>
                    <input name="name" class="form-control" placeholder="請輸入商品名稱">
                </div>

                <div class="form-group">
                    <label for="type">類別</label>
                    <select  name="type" class="form-control" rows="10">
                        <option value="1" selected>大衣洋裝</option>
                        <option value="2">鋼筆</option>
                        <option value="3">書籍</option>
                        <option value="4">專輯</option>
                        <option value="5">拼圖</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">價格</label>
                    <input name="price" class="form-control" placeholder="請輸入商品價格">
                </div>

                <div class="form-group">
                    <label for="content">說明</label>
                    <textarea name="content" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="photo">圖片</label>
                    <input type="file" name="photo" >
                </div>

                <div class="form-group">
                    <label for="stock">庫存</label>
                    <input name="stock" class="form-control" placeholder="請輸入商品庫存">
                </div>

                <div class="form-group">
                    <label for="status">狀態</label>
                    <label class="radio-inline" for="t1">
                        <input type="radio" name="status" id="0" value="0">未上架
                    </label>
                    <label class="radio-inline" for="t2">
                        <input type="radio" name="status" id="1" value="1">已上架
                    </label>
                </div>

                <div class="text-right">
                    <button type="submit" class="d-none d-sm-inline-block btn btn-facebook shadow-sm">新增</button>
                </div>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection

