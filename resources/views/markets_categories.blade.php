@extends('layouts.master')

@section('title', $sellers->name.'的賣場')

@section('content')

    <div class="bg0 m-t-23 p-b-140">
        <div class="container">

            <div class="row">
                <div class="col-lg-2">
                    <div class="flex-w flex-sb-m p-b-52">
                        <div class="flex-w flex-l-m filter-tope-group m-tb-10">

                            <table>
                                <tr>
                                    <td>
                                        <h2>{{ $sellers->name }}</h2>
                                        <p>&nbsp;</p>
                                    </td>
                                </tr>
                                <?php
                                    $categories = \App\Models\Category::where('disable','=','0')->orderBy('id','ASC')->get();
                                ?>
                                <tr>
                                    <td>
                                        <a href="{{route('sellers.show', $sellers->id)}}" style="color: black">全部</a>
                                    </td>
                                </tr>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <form action="{{route('sellers.category')}}">
                                                <input name="seller_id" type='hidden' id='seller_id' value="{{ $sellers->id }}">
                                                <input type='hidden' name="category_id" id='category_id' value="{{$category->id}}">
                                                <button>{{$category->name}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>

                </div>
                <div class="col-lg-10">

                    <div class="flex-w flex-sb-m p-b-52">
                        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                            <?php
                                $categories=\App\Models\Category::
                                    where('id', $_GET['category_id'])
                                    ->first();
                            ?>
                            <h4>{{ $categories->name }}</h4>
                        </div>

                        <div class="flex-w flex-c-m m-tb-10">
                            <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                                <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                                <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                                Search
                            </div>
                        </div>

                        <!-- Search product -->
                        <div class="dis-none panel-search w-full p-t-10 p-b-15">
                            <div class="bor8 dis-flex p-l-15">
                                <form action="{{route('sellers.search')}}">
{{--                                加上符號，版面很怪--}}
{{--                                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">--}}
{{--                                    <i class="zmdi zmdi-search"></i>--}}
{{--                                </button>--}}

                                    <input name="id" type='hidden' id='id' value="{{ $sellers->id }}">
                                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="search" name="search" placeholder="Search">
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="row isotope-grid">
                        @foreach($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <?php
                                        $pictures=$product->pictures;
                                        ?>
                                        <img src="{{ asset('img/'.$pictures.'') }}" alt="IMG-PRODUCT" height="200">

                                        <a href="{{route('products.detail', $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="{{route('products.detail', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                {{ $product->name }}
                                            </a>

                                            <span class="stext-105 cl3">
									${{ $product->price }}
								</span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <?php
                                                $exams=\App\Models\Exam::where('product_id', $product->id)->first();
                                            ?>
                                            @if($exams !== null)
                                                @if($exams->perfect == 1)
                                                    <img src="{{ asset('img/medal.png') }}" height="25" style="float: right;">
                                                @elseif($exams->pass == 1)
                                                    <img src="{{ asset('img/pass.png') }}" height="25" style="float: right;">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            @if($products->isEmpty())
                                {{--                            <p>&nbsp;</p>空白失敗--}}
                                <div style="text-align:center;margin:0px auto;">
                                    <h1>無此類商品</h1>
                                </div>

                            @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
