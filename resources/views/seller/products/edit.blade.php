@extends('seller.layouts.master')

@section('title','編輯商品')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">編輯商品</a></li>
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
            <form action="/seller/products/" method="POST" role="form">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name1">商品名稱</label>
                    <input name="name1" class="form-control" placeholder="請輸入商品名稱">
                </div>

                <div class="form-group">
                    <label for="type1">類別</label>
                    <select id="type1" name="type" class="form-control" rows="10">
                        <option value="1">大衣洋裝</option>
                        <option value="2">書籍</option>
                        <option value="3">鋼筆</option>
                        <option value="4">專輯</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price1">價格</label>
                    <input name="price1" class="form-control" placeholder="請輸入商品價格">
                </div>

                <div class="form-group">
                    <label for="content1">說明</label>
                    <textarea name="content1" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="photo1">圖片：</label>
                    <input type="file" name="photo1" >
                </div>

                @if('')
                    <div class="form-group">
                        <label for="status1">狀態：</label>
                        <label class="radio-inline" for="t1">
                            <input type="radio" name="status" id="0" value="0" checked>已上架
                        </label>

                        <label class="radio-inline" for="t2">
                            <input type="radio" name="status" id="1" value="1">未上架
                        </label>
                    </div>
                @else
                    <div class="form-group">
                        <label for="status1">狀態：</label>
                        <label class="radio-inline" for="1">
                            <input type="radio" name="status" id="0" value="0">已上架
                        </label>
                        <label class="radio-inline" for="2">
                            <input type="radio" name="status" id="1" value="1" checked>未上架
                        </label>
                    </div>
                @endif

                <div class="text-right">
                    <button type="submit" class="btn btn-info">更新</button>
                </div>

            </form>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection

