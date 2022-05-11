@extends('layouts.master')

@section('title', $sellers->name.'的賣場')

@section('content')

<div class="bg0 m-t-23 p-b-140">
    <div class="container">

        <div class="row">
            <div class="col-lg-2">
                <div class="flex-w flex-sb-m p-b-52">
                    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                        <h2>Seller_name</h2>

                        <table>
                            <tr>
                                <td>
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
                            <?php
                                $categories = DB::table('categories')->orderBy('id','ASC')->get();
                            ?>
                            <tr>
                                <td>
                                    <a href="{{route('sellers.show', $sellers->id)}}">全部</a>
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
                        <h4>搜尋結果</h4>
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
                                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                    <i class="zmdi zmdi-search"></i>
                                </button>

                                <input name="id" type='hidden' id='id' value="{{ $sellers->id }}">
                                <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="search" name="search" placeholder="Search">
                            </form>                        </div>
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
                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            {{--                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">--}}
                                            {{--                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">--}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($products->isEmpty())
{{--                            <p>&nbsp;</p>空白失敗--}}
                        <div style="text-align:center;margin:0px auto;">
                            <h1>查無結果</h1>
                        </div>

                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
