@extends('seller.layouts.master')

@section('title','編輯商品')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">編輯商品</li>
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
            <form action="/seller/products/{{$product->id}}" method="POST" role="form">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">商品名稱</label>
                    <input name="name" class="form-control" placeholder="請輸入商品名稱" value="{{old('name',$product->name)}}">
                </div>

                <div class="form-group">
                    <label for="type">類別</label>
                    <select id="type" name="type" class="form-control" rows="10">
                        @if($product->category_id=='1')
                           <option value="1" selected>大衣洋裝</option>
                           <option value="2">鋼筆</option>
                           <option value="3">書籍</option>
                           <option value="4">專輯</option>
                           <option value="5">拼圖</option>
                    </select>
                        @elseif($product->category_id=='2')
                            <option value="1" >大衣洋裝</option>
                            <option value="2" selected>鋼筆</option>
                            <option value="3">書籍</option>
                            <option value="4">專輯</option>
                            <option value="5">拼圖</option>
                    </select>
                        @elseif($product->category_id=='3')
                            <option value="1" >大衣洋裝</option>
                            <option value="2" >鋼筆</option>
                            <option value="3" selected>書籍</option>
                            <option value="4">專輯</option>
                            <option value="5">拼圖</option>
                    </select>
                        @elseif($product->category_id=='4')
                            <option value="1" >大衣洋裝</option>
                            <option value="2" >鋼筆</option>
                            <option value="3">書籍</option>
                            <option value="4" selected>專輯</option>
                            <option value="5">拼圖</option>
                    </select>
                        @elseif($product->category_id=='5')
                            <option value="1" >大衣洋裝</option>
                            <option value="2" >鋼筆</option>
                            <option value="3">書籍</option>
                            <option value="4" >專輯</option>
                            <option value="5" selected>拼圖</option>

                    </select>
                    @endif
                </div>

                <div class="form-group">
                    <label for="price">價格</label>
                    <input name="price" class="form-control" placeholder="請輸入商品價格" value="{{old('price',$product->price)}}">
                </div>

                <div class="form-group">
                    <label for="content">說明</label>
                    <textarea name="content" class="form-control">{{old('content',$product->detail)}}</textarea>
                </div>

                <div class="form-group">
                    <label for="photo">圖片：</label>
                    <img class="pic" src="/../../img/{{$product->picture}}">
                    <input type="file" name="photo" value="{{old('photo',$product->picture)}}">
                </div>

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

