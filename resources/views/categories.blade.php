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
                @if(count($products)>0)
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
    {{--                                <a href="{{route('products.show', $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">--}}
                                        Quick View
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{route('products.detail', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
    {{--                                    <a href="{{route('products.show', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">--}}
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
                @else
{{--                    <p>&nbsp;</p>????????????????????????--}}
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <div style="text-align:center;margin:0px auto;">
                        <h1>????????????????????????</h1>
                    </div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                @endif
            </div>
        </div>
    </div>
@endsection
