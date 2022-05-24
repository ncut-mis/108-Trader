<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>賣家後台 | @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        .pic
        {
            border: 5px black;
            border-radius: 5px;
            max-width: 100px;
            max-height: 100px;
        }
        .breadcrumb
        {
            display: flex;
            flex-wrap:wrap;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            list-style: none;
            background:none;

        }
        .breadcrumb-item + .breadcrumb-item::before {
            float: left;
            padding-right: 0.5rem;
            color: #858796;
            content:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E");

        }
        .bg
        {
            background-color: #FCFAF2;
        }



    </style>
</head>
<body>
<div id="wrapper">
   @section('sidebar')
        <ul class="navbar-nav sidebar  accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('seller.dashboard')}}">
                <div class="sidebar-brand-text mx-3" style="color: #6E75A4">賣家後台</div>
            </a>
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{route('seller.post')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16" style="color: #8F77B5">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg>
                    <span style="color: #211E55">賣家公告</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('seller.dashboard')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16" style="color: #8F77B5">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
                    </svg>
                    <span style="color: #211E55">營運資料</span></a>
            </li>



            <!-- Nav Item - Pages Collapse Menu -->
               <li class="nav-item">
                   <a class="nav-link" href="{{route('seller.products.index')}}">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-dash" viewBox="0 0 16 16" style="color: #8F77B5">
                           <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                           <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                       </svg>
                       <span style="color: #211E55">商品管理</span>
                   </a>
               </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16" style="color: #8F77B5">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                    </svg>
                    <span style="color: #211E55">品質檢測</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('products.exams.index')}}" style="color: #113285">所有品質鑑定商品</a>
                        <a class="collapse-item" href="{{route('products.exams.undone')}}" style="color: #113285">未檢測品質鑑定商品</a>
                        <a class="collapse-item" href="{{route('products.exams.finish')}}" style="color: #113285">已完成品質鑑定商品</a>
                    </div>
                </div>
            </li>

               <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePages"
                   aria-expanded="true" aria-controls="collapsePages">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16" style="color: #8F77B5">
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                       <span style="color: #211E55">訂單管理</span>
                   </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg py-2 collapse-inner rounded">
                           <a class="collapse-item" href="{{route('seller.orders.index')}}" style="color: #113285">所有訂單</a>
                           <a class="collapse-item" href="{{route('seller.orders.undone')}}" style="color: #113285">未完成訂單</a>
                           <a class="collapse-item" href="{{route('seller.orders.history')}}" style="color: #113285">已完成訂單</a>
                           <a class="collapse-item" href="{{route('seller.products.comment')}}" style="color: #113285">所有評論評分</a>
                           <a class="collapse-item" href="{{route('seller.products.amount')}}" style="color: #113285">所有進帳訂單</a>
                           <a class="collapse-item" href="{{route('seller.products.unamount')}}" style="color: #113285">所有未進帳訂單</a>

                    </div>
                   </div>
               </li>
               <!-- Divider -->
               <hr class="sidebar-divider d-none d-md-block">

           </ul>
           <!-- End of Sidebar -->
           <div id="content-wrapper" class="d-flex flex-column">

               <!-- Main Content -->
               <div id="content">
                   <!-- Content Wrapper -->

                   <!-- Topbar -->
                   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                       <!-- Sidebar Toggle (Topbar) -->
                       <form class="form-inline">
                           <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                               <i class="fa fa-bars"></i>
                           </button>
                       </form>

                       <!-- Topbar Search
                       <form  method="GET" action=""
                           class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                           <div class="input-group">
                               <input type="text" class="form-control bg-light border-0 small" placeholder="搜尋商品"
                                      aria-label="Search" aria-describedby="basic-addon2" name="search" >
                               <div class="input-group-append">
                                   <button class="btn btn-primary" type="submit">
                                       <i class="fas fa-search fa-sm"></i>
                                   </button>
                               </div>
                           </div>
                       </form>-->

                       <!-- Topbar Navbar -->
                       <ul class="navbar-nav ml-auto">

                           <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                           <li class="nav-item dropdown no-arrow d-sm-none">
                               <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-search fa-fw"></i>
                               </a>
                               <!-- Dropdown - Messages -->
                               <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                   <form class="form-inline mr-auto w-100 navbar-search">
                                       <div class="input-group">
                                           <input type="text" class="form-control bg-light border-0 small"
                                                  aria-label="Search" aria-describedby="basic-addon2">
                                           <div class="input-group-append">
                                               <button class="btn btn-primary" type="button">
                                                   <i class="fas fa-search fa-sm"></i>
                                               </button>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </li>

                           <!-- Nav Item - Alerts -->
                           <li class="nav-item dropdown no-arrow mx-1">
                               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-bell fa-fw"></i>
                                   <!-- Counter - Alerts -->
                                   <span class="badge badge-danger badge-counter">3+</span>
                               </a>
                               <!-- Dropdown - Alerts -->
                               <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                   <h6 class="dropdown-header">
                                       Alerts Center
                                   </h6>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <div class="mr-3">
                                           <div class="icon-circle bg-primary">
                                               <i class="fas fa-file-alt text-white"></i>
                                           </div>
                                       </div>
                                       <div>
                                           <div class="small text-gray-500">December 12, 2019</div>
                                           <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                       </div>
                                   </a>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <div class="mr-3">
                                           <div class="icon-circle bg-success">
                                               <i class="fas fa-donate text-white"></i>
                                           </div>
                                       </div>
                                       <div>
                                           <div class="small text-gray-500">December 7, 2019</div>
                                           $290.29 has been deposited into your account!
                                       </div>
                                   </a>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <div class="mr-3">
                                           <div class="icon-circle bg-warning">
                                               <i class="fas fa-exclamation-triangle text-white"></i>
                                           </div>
                                       </div>
                                       <div>
                                           <div class="small text-gray-500">December 2, 2019</div>
                                           Spending Alert: We've noticed unusually high spending for your account.
                                       </div>
                                   </a>
                                   <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                               </div>
                           </li>

                           <!-- Nav Item - Messages -->
                           <li class="nav-item dropdown no-arrow mx-1">
                               <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-envelope fa-fw"></i>
                                   <!-- Counter - Messages -->
                                   <span class="badge badge-danger badge-counter">7</span>
                               </a>
                               <!-- Dropdown - Messages -->
                               <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                   <h6 class="dropdown-header">
                                       Message Center
                                   </h6>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <div class="dropdown-list-image mr-3">
                                           <img class="rounded-circle" src="img/1111.jpg"
                                                alt="...">
                                           <div class="status-indicator bg-success"></div>
                                       </div>
                                       <div class="font-weight-bold">
                                           <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                               problem I've been having.</div>
                                           <div class="small text-gray-500">Emily Fowler · 58m</div>
                                       </div>
                                   </a>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <div class="dropdown-list-image mr-3">
                                           <img class="rounded-circle" src="img/1111.jpg"
                                                alt="...">
                                           <div class="status-indicator"></div>
                                       </div>
                                       <div>
                                           <div class="text-truncate">I have the photos that you ordered last month, how
                                               would you like them sent to you?</div>
                                           <div class="small text-gray-500">Jae Chun · 1d</div>
                                       </div>
                                   </a>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <div class="dropdown-list-image mr-3">
                                           <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                                alt="...">
                                           <div class="status-indicator bg-warning"></div>
                                       </div>
                                       <div>
                                           <div class="text-truncate">Last month's report looks great, I am very happy with
                                               the progress so far, keep up the good work!</div>
                                           <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                       </div>
                                   </a>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <div class="dropdown-list-image mr-3">
                                           <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                alt="...">
                                           <div class="status-indicator bg-success"></div>
                                       </div>
                                       <div>
                                           <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                               told me that people say this to all dogs, even if they aren't good...</div>
                                           <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                       </div>
                                   </a>
                                   <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                               </div>
                           </li>

                           <div class="topbar-divider d-none d-sm-block"></div>

                           <!-- Nav Item - User Information -->
                           <li class="nav-item dropdown no-arrow">
                               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php
                                   $id=\App\Models\Product::where('seller_id','=',auth()->user()->id)->value('seller_id');
                                   $seller=\App\Models\Seller::where('id','=',$id)->value('member_id');
                                   $sname=\App\Models\User::where('id','=',$seller)->value('name');
                                   ?>
                                   <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$sname}}</span>
                               </a>

                               <!-- Dropdown - User Information -->
                               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                   <a class="dropdown-item" href="{{ route('home.index') }}">
                                       <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                       主頁
                                   </a>
                                   <a class="dropdown-item" href="">
                                       <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                       個人資料
                                   </a>

                                   <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                                      onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           @csrf
                                       </form>
                                       登出
                                   </a>
                               </div>
                           </li>

                       </ul>

                   </nav>
                   <!-- End of Topbar -->
                   <div class="container-fluid">

                       <div class="card shadow mb-4">

                           <div class="card-body">
                               <div class="table-responsive">

                                   <table class="table table-hover" frame="void" >
                                       <ol class="breadcrumb mar">
                                           @yield('breadcrumb')
                                       </ol>

                                       <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                           @yield('button')
                                       </div>
                                       @yield('content')

                                   </table>
                               </div>
                           </div>
                       </div>
               </div>
               </div>
               <!-- End of Main Content -->
           <!-- End of Content Wrapper -->
               <!-- Footer -->
               <footer class="sticky-footer bg-white">
                   <div class="container my-auto">
                       <div class="copyright text-center my-auto">
                           <span>Copyright &copy; Your Website 2022</span>
                       </div>
                   </div>
               </footer>
               <!-- End of Footer -->
           <!-- Scroll to Top Button-->
           <a class="scroll-to-top rounded" href="#page-top">
               <i class="fas fa-angle-up"></i>
           </a>
       @show

</div>
</div>


<script src="{{asset('vendor/jquery-admin/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-admin/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>


</body>

</html>
