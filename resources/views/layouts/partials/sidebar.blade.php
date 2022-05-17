<div class="container-menu-desktop">
    {{-- 上方有黑條，不確定需不需要
    <div class="top-bar"></div>--}}
    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Icon -->
            <a href="/" class="logo">
                <img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO">
            </a>

            <!-- 分類(下拉)-->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="active-menu">
                        <h5><a href="#" style="color: black">分類</a></h5>
                        <ul class="sub-menu">
                            <li><a href="{{route('products.index')}}">全部</a></li>
                            <?php
                            $categories = DB::table('categories')->orderBy('id','ASC')->get();?>
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
                                    <li><a href="#">會員資料</a></li>
                                    <li><a href="{{route('orders.index')}}">訂單紀錄</a></li>
                                    <?php
                                    $sellers = DB::table('sellers')->where('member_id','=',auth()->user()->id)->get();?>
                                    @if($sellers->isEmpty())
                                        <li><a href="#">成為賣家</a></li>
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

            </div>
        </nav>
    </div>
</div>

<!-- Modal Search 搜尋目前 -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15" action="{{route('products.search')}}">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" id="search" name="search" placeholder="Search...">
        </form>
    </div>
</div>
