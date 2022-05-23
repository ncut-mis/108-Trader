@extends('seller.layouts.master')

@section('title','營運資料')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="#">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">營運資料</li>
@endsection

@section('content')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  mb-1" style="color:#268785">
                               銷售額</div>
                            <div class="h5 mb-0" style="color: black"><small>NT$</small>{{$price}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  mb-1" style="color:#268785">
                                訂單數</div>
                            <div class="h5 mb-0 " style="color: black">{{$num}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  mb-1" style="color: #268785">
                                賣家評價</div>
                            <div class="h5 mb-0 " style="color: black">
                                @if($count!=0)
                                {{$sore}}
                                @else
                                目前沒有評價!!
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  mb-1" style="color: #268785">
                                客單價</div>
                            <div class="h5 mb-0 " style="color: black">
                                <?php
                                if($num>0)
                                    {
                                        $cu=$price/$num;
                                        echo "<small>NT$</small>".round($cu,0);
                                    }
                               ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">收入</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
                               <script>
                                   const p1= {!! json_encode($p) !!};
                                   var ctx = document.getElementById('myChart').getContext('2d');
                                   var myChart = new Chart(ctx, {
                                    type: 'line', //圖表類型
                                    data: {
                                        //標題
                                        labels:['1','2','3','4','5','6','7','8','9','10','11','12'],
                                        datasets: [{
                                            label: '收入', //標籤
                                            data: p1, //資料
                                            //圖表背景色
                                            backgroundColor: [
                                                'rgba(106,76,156)'
                                            ],
                                            //圖表外框線色
                                            borderColor: [
                                                'rgba(106,76,156)'
                                            ],
                                            //外框線寬度
                                            borderWidth: 1,
                                            pointBackgroundColor:[
                                                'rgba(128,143,124)'
                                            ],
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: false,
                                                    responsive: true, //符合響應式
                                                    stepSize: 100,
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </canvas>

                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
