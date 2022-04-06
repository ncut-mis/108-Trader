@extends('layouts.master')

@section('title', $categories->name)

@section('content')

    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <h4>{{ $categories->name }}</h4>
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

                                <a href="{{route('products.show', $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{route('products.show', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>

                                    <span class="stext-105 cl3">
									${{ $product->price }}
								</span>
                                </div>

{{--                                <div class="block2-txt-child2 flex-r p-t-3">--}}
{{--                                   --}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load more -->
            {{--        <div class="flex-c-m flex-w w-full p-t-45">--}}
            {{--            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">--}}
            {{--                Load More--}}
            {{--            </a>--}}
            {{--        </div>--}}
        </div>
    </div>
@endsection
