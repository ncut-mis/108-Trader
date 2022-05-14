@extends('layouts.master')

@section('title', $products->name)

@section('content')

<?php
    $categories = \App\Models\Category::where('id', $products->category_id )->first();
    $sellers = \App\Models\Seller::
                    join('users','sellers.member_id','=','users.id')
                    ->where('sellers.id','=', $products->seller_id)
                    ->select('users.name','sellers.id')
                    ->first();
?>
<!-- breadcrumb 首頁/類別/商品名稱-->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('products.index')}}" class="stext-109 cl8 hov-cl1 trans-04">
            全部
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="{{route('categories.show', $categories->id)}}" class="stext-109 cl8 hov-cl1 trans-04">
            {{ $categories->name }}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $products->name }}
        </span>
    </div>
</div>


<!-- Product Detail 商品詳細資訊 -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
{{--                        <div class="wrap-slick3-dots"></div>--}}
{{--                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>--}}

                        <div class="slick3 gallery-lb">
{{--                            <div class="item-slick3" data-thumb="images/product-detail-01.jpg">--}}
{{--                                <div class="wrap-pic-w pos-relative">--}}
{{--                                    <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">--}}
                                    <?php
                                        $pictures=$products->pictures;
                                    ?>
                                    <img src="{{ asset('img/'.$pictures.'') }}" alt="IMG-PRODUCT" height="200">

{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="item-slick3" data-thumb="images/product-detail-02.jpg">--}}
{{--                                <div class="wrap-pic-w pos-relative">--}}
{{--                                    <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">--}}

{{--                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">--}}
{{--                                        <i class="fa fa-expand"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="item-slick3" data-thumb="images/product-detail-03.jpg">--}}
{{--                                <div class="wrap-pic-w pos-relative">--}}
{{--                                    <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">--}}

{{--                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">--}}
{{--                                        <i class="fa fa-expand"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $products->name }}
                        @if($exams !== null)
                            @if($exams->perfect == 1)
                                <img src="{{ asset('img/medal.png') }}" height="30" style="float: right;">
                            @elseif($exams->pass == 1)
                                <img src="{{ asset('img/pass.png') }}" height="30" style="float: right;">
                            @endif
                        @endif
                    </h4>

                    <span class="mtext-106 cl2">
						${{ $products->price }}
                    </span><br><br>

                    <span class="mtext-106 cl2">
						賣家：<a href="{{route('sellers.show', $products->seller_id)}}">{{ $sellers->name }}</a>
                    </span><br><br>

                    <span class="mtext-106 cl2">
						庫存：{{ $products->inventory }}
                    </span><br><br>

                    <form action="{{route('cart_items.add', $products->id)}}">
                        <span class="mtext-106 cl2">
                            選擇數量：<input type="number" name="quantity" value="1" min="1" max="{{$products->inventory}}" class="form-control text-center">
                        </span>
                        <div class="flex-c-m flex-w w-full p-t-45">
                            <?php
                                if(\Illuminate\Support\Facades\Auth::check())
                                    $s_id=\App\Models\Seller::where('member_id',auth()->user()->id)->first();
                            ?>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if($products->seller_id == $s_id->id || $products->inventory == 0)
                                    <button type="submit" disabled>
                                        加入購物車
                                    </button>
                                @else
                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        加入購物車
                                    </button>
                                @endif
                            @else
                                <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    加入購物車
                                </button>
                            @endif
                        </div>
                    </form>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

                        <div class="col-md-6 col-lg-5 p-b-30">
                            <div class="p-r-50 p-t-5 p-lr-0-lg">
{{--                            <div class="size-204 flex-w flex-m respon6-next">--}}
{{--                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">--}}
{{--                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--                                        <i class="fs-16 zmdi zmdi-minus"></i>--}}
{{--                                    </div>--}}

{{--                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1" min="1">--}}

{{--                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">--}}
{{--                                        <i class="fs-16 zmdi zmdi-plus"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                {{--                                <form action="/" method="post">--}}
{{--                                    @method('POST')--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="member_id" value="1">--}}
{{--                                    <input type="hidden" name="product_id" value="{{ $products->id }}">--}}
{{--                                    <input type="hidden" name="quantity" value="1">--}}

{{--                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">--}}
{{--                                        加入購物車--}}
{{--                                    </button>--}}
{{--                                </form>--}}

{{--                                <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">--}}
{{--                                    加入購物車--}}
{{--                                </button>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div>
                <h4><center>商品描述</center></h4>

                <div class="tab-content p-t-43">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
{{--                                內容--}}
                                {{ $products->detail }}
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 目前是做賣家其他商品-->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                賣家其他商品
            </h3>
        </div>
<?php
    $products2 = \App\Models\Product::
                    where( 'seller_id' , $products->seller_id)
                    ->where('id','!=',$products->id)
                    ->where('status','=','1')
                    ->get();//抓賣家其他商品
?>
        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($products2 as $p)
                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
{{--                                    <div class="t_div">--}}
{{--                                        <img src="img/{{$p->pictures}}" alt="IMG-PRODUCT" class="t_img">--}}
                                    <?php
                                        $p2=$p->pictures;
                                    ?>
                                    <img src="{{ asset('img/'.$p2.'') }}" alt="IMG-PRODUCT" height="200">
{{--                                    </div>--}}
                                    <a href="{{route('products.detail', $p->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
{{--                                    <a href="{{route('products.show', $p->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">--}}
                                        Quick View
                                    </a>

                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{route('products.detail', $p->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
{{--                                        <a href="{{route('products.show', $p->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">--}}
                                            {{$p->name}}
                                        </a>

                                        <span class="stext-105 cl3">
                                             ${{$p->price}}
                                        </span>
                                    </div>
                                    <?php
                                        $exams2=\App\Models\Exam::where('product_id', $p->id)->first();
                                    ?>
                                    @if($exams2 !== null)
                                        @if($exams2->perfect == 1)
                                            <img src="{{ asset('img/medal.png') }}" height="25" style="float: right;">
                                        @elseif($exams2->pass == 1)
                                            <img src="{{ asset('img/pass.png') }}" height="25" style="float: right;">
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

