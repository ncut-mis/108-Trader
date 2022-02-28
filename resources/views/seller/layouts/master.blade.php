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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
<div id="wrapper">
   @section('sidebar')
        <ul class="navbar-nav sidebar  accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3" style="color: #6E75A4">賣家後台</div>
            </a>
            <hr class="sidebar-divider my-0">

               <!-- Nav Item - Pages Collapse Menu -->
               <li class="nav-item">
                   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                      aria-expanded="true" aria-controls="collapseTwo">
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 15 15" style="color: #211E55">
                           <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                       </svg>
                       <span style="color: #211E55">商品管理</span>
                   </a>
                   <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                       <div class="bg-white py-2 collapse-inner rounded">
                           <h6 class="collapse-header" style="color: #70649A">分類</h6>
                           <a class="collapse-item" href="#" style="color: #113285">大衣洋裝類</a>
                           <a class="collapse-item" href="#" style="color: #113285">書籍類</a>
                           <a class="collapse-item" href="#" style="color: #113285">鋼筆類</a>
                           <a class="collapse-item" href="#" style="color: #113285">專輯類</a>
                       </div>
                   </div>
               </li>

               <!-- Nav Item - Utilities Collapse Menu -->
               <li class="nav-item">
                   <a class="nav-link collapsed" href="#" aria-expanded="false" >
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 15 15" style="color: #211E55">
                           <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                           <path d="M3.5 1h.585A1.498 1.498 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5c0-.175-.03-.344-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1Z"/>
                       </svg>
                       <span style="color: #211E55">訂單管理</span>
                   </a>
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

                       <!-- Topbar Search -->
                       <form
                           class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                           <div class="input-group">
                               <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                      aria-label="Search" aria-describedby="basic-addon2">
                               <div class="input-group-append">
                                   <button class="btn btn-primary" type="button">
                                       <i class="fas fa-search fa-sm"></i>
                                   </button>
                               </div>
                           </div>
                       </form>

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
                                                  placeholder="Search for..." aria-label="Search"
                                                  aria-describedby="basic-addon2">
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
                                   <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ryan</span>
                                   <img class="img-profile rounded-circle"
                                        src="img/1111.jpg">
                               </a>
                               <!-- Dropdown - User Information -->
                               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                   <a class="dropdown-item" href="#">
                                       <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                       個人資料
                                   </a>
                                   <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                       <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                       登出
                                   </a>
                               </div>
                           </li>

                       </ul>

                   </nav>
                   <!-- End of Topbar -->
                   <div class="container-fluid">
                       <div class="card shadow mb-4">
                           <div class="card-header py-3">
                               <h6 class="m-0 font-weight-bold text-primary">
                                   <div class="container">
                                       <ol class="breadcrumb" >
                                           @yield('breadcrumb')
                                       </ol>
                                   </div>
                               </h6>
                           </div>
                           <div class="card-body">
                               <div class="table-responsive">
                                   <div class="row" style="margin-bottom: 10px; text-align: right">
                                       <div class="col-lg-12">
                                          @yield('button')
                                       </div>
                                   </div>
                                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        @yield('content')
                                   </table>
                               </div>
                           </div>
                       </div>
               </div>
               <!-- End of Main Content -->
           </div>
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

<script src="vendor/jquery-admin/jquery.min.js"></script>
<script src="vendor/bootstrap-admin/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>


</body>

</html>
