<div class="container-menu-desktop">
    {{-- 上方有黑條，不確定需不需要
    <div class="top-bar"></div>--}}
    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Icon -->
            <a href="/home" class="logo">
                <img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO">
            </a>

            <!-- 分類(下拉)-->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="active-menu">
                        <h5><a href="#">分類</a></h5>
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
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                    {{--                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">--}}
                    <h5><i class="zmdi zmdi-shopping-cart">購物車</i></h5>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                    <h5>註冊</h5>
                    {{--                        目前沒看到適合的icon--}}
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                    <h5>登入</h5>
                    {{--                        目前沒看到適合的icon--}}
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                    <h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </h5>
                    {{--        搜尋目前樣子         --}}
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

        <form class="wrap-search-header flex-w p-l-15">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
    </div>
</div>