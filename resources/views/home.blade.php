<!-- 訪客?? -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- Header -->
<header >

    <!-- Header desktop -->
    <div class="container-menu-desktop">
    {{-- 上方有黑條，不確定需不需要
    <div class="top-bar"></div>--}}
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Icon -->
                <a href="/" class="logo">
                    <img src="{{ asset('img/icon2.png') }}" alt="IMG-LOGO">
                </a>

                <!-- 分類(下拉)-->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <h5><a href="#" style="color: black">分類</a></h5>
                            <ul class="sub-menu">
                                <li><a href="{{route('products.index')}}">全部</a></li>
                                <?php
                                $categories = \App\Models\Category::where('disable','=','0')->orderBy('id','ASC')->get();?>
                                @foreach($categories as $category)
                                        <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
{{--                                我不確定有沒有"其他"選項--}}
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
    {{--                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">--}}
                            <a href="{{ route('cart_items.index') }}" style="color: black"><h5><i class="zmdi zmdi-shopping-cart">購物車</i></h5></a>
                        </div>

                        <div class="menu-desktop">
                            <ul class="main-menu">
                                <li class="active-menu">
                                    <h5><a href="#" style="color: black">會員中心</a></h5>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('users.index')}}">會員資料</a></li>
                                        <li><a href="{{route('orders.index')}}">訂單紀錄</a></li>
                                        <?php
                                        $sellers = \App\Models\Seller::where('member_id','=',auth()->user()->id)->where('status','1')->get();?>
                                        @if($sellers->isEmpty())
                                            <li><a href="{{route('sellers.apply')}}">成為賣家</a></li>
                                        @else
                                            <li><a href="{{route('seller.dashboard')}}">賣家後台</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" style="font-size:15px;color: #6b7280"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('登出') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            {{--                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">--}}
                            <a href="{{ route('cart_items.index') }}" style="color: black"><h5><i class="zmdi zmdi-shopping-cart">購物車</i></h5></a>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <a href="{{ route('register') }}" style="color: black"><h5>註冊</h5></a>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <a href="{{ route('login') }}" style="color: black"><h5>登入</h5></a>
                        </div>
                    @endif
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                       <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                       </h5>
                    </div>

                    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                        <div class="container-search-header">
                            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                                <img src="images/icons/icon-close2.png" alt="CLOSE">
                            </button>

                            <form class="wrap-search-header flex-w p-l-15" action="{{route('products.search')}}">
                                <button class="flex-c-m trans-04">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                                <input class="plh3" type="text" id="search" name="search" placeholder="Search...">
                            </form>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile 輪播-->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/"><img src="{{ asset('img/icon2.png') }}" alt="IMG-LOGO"></a>
        </div>
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="menu-desktop" style="z-index: 9999">
                <ul class="main-menu">
                    <li class="active-menu">
                        <h5><a href="#" style="color: black">分類</a></h5>
                        <ul class="sub-menu">
                            <li><a href="{{route('products.index')}}">全部</a></li>
                            <?php
                            $categories = \App\Models\Category::orderBy('id','ASC')->get();?>
                            @foreach($categories as $category)
                                <li><a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                            {{--                                我不確定有沒有"其他"選項--}}
                        </ul>
                    </li>
                </ul>
            </div>
        @if(\Illuminate\Support\Facades\Auth::check())

            <!-- Icon header -->

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                    {{--                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">--}}
                    <a href="{{ route('cart_items.index') }}" style="color: black"><h5><i class="zmdi zmdi-shopping-cart">購物車</i></h5></a>
                </div>

                <div class="menu-desktop" style="z-index: 9999">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <h5><a href="#" style="color: black">會員中心</a></h5>
                            <ul class="sub-menu">
                                <li><a href="{{route('users.index')}}">會員資料</a></li>
                                <li><a href="{{route('orders.index')}}">訂單紀錄</a></li>
                                <?php
                                $sellers = \App\Models\Seller::where('member_id','=',auth()->user()->id)->where('status','1')->get();?>
                                @if($sellers->isEmpty())
                                    <li><a href="{{route('sellers.apply')}}">成為賣家</a></li>
                                @else
                                    <li><a href="{{route('seller.dashboard')}}">賣家後台</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('logout') }}" style="font-size:15px;color: #6b7280"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('登出') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                {{--                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">--}}
                <a href="{{ route('cart_items.index') }}" style="color: black"><h5><i class="zmdi zmdi-shopping-cart">購物車</i></h5></a>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                <a href="{{ route('register') }}" style="color: black"><h5>註冊</h5></a>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                <a href="{{ route('login') }}" style="color: black"><h5>登入</h5></a>
            </div>
        @endif
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>
        </div>

        <!-- Modal Search 搜尋 -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15" action="{{route('products.search')}}">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" id="search" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
</header>


<!-- Slider 輪播字幕-->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1" style="background-image: url(images/slide-01.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                NEW SEASON
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                Jackets & Coats
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(images/slide-03.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                New arrivals
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Banner 下方類別-->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
{{--            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">--}}
                <!-- 一格block -->
{{--                <div class="block1 wrap-pic-w">--}}
                    <?php
                    $categories = \App\Models\Category::orderBy('id','ASC')->get();?>
                <!--<li><a href="#"></a></li>-->
                    @foreach($categories as $category)
                        <div class="col-md-4 col-xl-2 p-b-30 m-lr-auto">
                            <div class="block1 wrap-pic-w">
                                <a href="{{route('categories.show', $category->id)}}">
        {{--                            <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">--}}
                                    <div class="block1-txt-child1 flex-col-l">
                                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                                {{ $category->name }}
                                            </span>

                                        <span class="block1-info stext-102 trans-04">
                                                來去購物吧~
                                        </span>
                                    </div>

                                    <div class="block1-txt-child2 p-b-4 trans-05">
                                        <div class="block1-link stext-101 cl0 trans-09">
                                            Shop Now
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{--                                我不確定有沒有"其他"選項--}}
        </div>
    </div>
</div>


<!-- Product 新品上架-->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                品質檢測通過
            </h3>
        </div>

{{--        <div class="flex-w flex-sb-m p-b-52">--}}
{{--            品質檢測通過--}}
{{--        </div>--}}
        <?php
            $products = \App\Models\Product::
                            join('exams','exams.product_id','=','products.id')
                            ->where('status','=','1')
                            ->where('pass','=','1')
                            ->orderBy('products.id','DESC')
                            ->select('products.id','products.name','products.pictures','products.price','exams.pass','exams.perfect')
                            ->get();
        ?>
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($products as $product)
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                {{--                                    <div class="t_div">--}}
                                {{--                                        <img src="img/{{$p->pictures}}" alt="IMG-PRODUCT" class="t_img">--}}
                                <?php
                                    $p=$product->pictures;
                                ?>
                                <img src="{{ asset('img/'.$p.'') }}" alt="IMG-PRODUCT" height="200">
                                {{--                                    </div>--}}
                                <a href="{{route('products.detail', $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    {{--                                    <a href="{{route('products.show', $p->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">--}}
                                    Quick View
                                </a>

                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{route('products.detail', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{--                                        <a href="{{route('products.show', $p->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">--}}
                                        {{$product->name}}
                                    </a>

                                    <span class="stext-105 cl3">
                                             ${{$product->price}}
                                        </span>
                                </div>
<!--                                --><?php
//                                    $exams=\App\Models\Exam::where('product_id', $product->id)->first();
//                                ?>
{{--                                @if($exams !== null)--}}
                                    @if($product->perfect == 1)
                                        <img src="{{ asset('img/medal.png') }}" height="25" style="float: right;">
                                    @elseif($product->pass == 1)
                                        <img src="{{ asset('img/pass.png') }}" height="25" style="float: right;">
                                    @endif
{{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
{{--        <div class="row isotope-grid">--}}
{{--            <?php--}}
{{--                $products = \App\Models\Product::where('status','=','1')->orderBy('id','DESC')->get();--}}
{{--            ?>--}}
{{--            @foreach($products as $product)--}}
{{--                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">--}}
{{--                        <!-- Block2 -->--}}
{{--                        <div class="block2">--}}
{{--                            <div class="block2-pic hov-img0">--}}
{{--                                <img src="img/{{ $product->pictures }}" alt="IMG-PRODUCT" height="200">--}}

{{--                                <a href="{{route('products.detail', $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">--}}
{{--        --}}{{--                        <a href="{{route('products.show', $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">--}}
{{--                                    Quick View--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div class="block2-txt flex-w flex-t p-t-14">--}}
{{--                                <div class="block2-txt-child1 flex-col-l ">--}}
{{--                                    <a href="{{route('products.detail', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">--}}
{{--        --}}{{--                            <a href="{{route('products.show', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">--}}
{{--                                        {{ $product->name }}--}}
{{--                                    </a>--}}

{{--                                    <span class="stext-105 cl3">--}}
{{--                                            ${{ $product->price }}--}}
{{--                                        </span>--}}
{{--                                </div>--}}

{{--                                <div class="block2-txt-child2 flex-r p-t-3">--}}
{{--                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">--}}
{{--        --}}{{--                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">--}}
{{--        --}}{{--                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="{{route('products.index')}}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Categories
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Women
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Men
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Shoes
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Watches
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Help
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Track Order
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Returns
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Shipping
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    GET IN TOUCH
                </h4>

                <p class="stext-107 cl7 size-201">
                    Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Newsletter
                </h4>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-t-40">
            <div class="flex-c-m flex-w p-b-18">
                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                </a>

                <a href="#" class="m-all-1">
                    <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
                </a>
            </div>

            <p class="stext-107 cl6 txt-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/slick/slick.min.js"></script>
<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

</script>
<!--===============================================================================================-->
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
