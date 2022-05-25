@extends('seller.layouts.master')

@section('title','營運資料')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
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
                    <h6 class="m-0 font-weight-bold text-primary">商品排行</h6>

                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart">

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
                               <script>
                                   const name= {!! json_encode($name) !!};
                                   const q= {!! json_encode($quantity) !!};
                                   var ctx = document.getElementById('myChart').getContext('2d');
                                   var myChart = new Chart(ctx, {
                                    type: 'bar', //圖表類型
                                    data: {
                                        //標題
                                        labels:name,
                                        datasets: [{
                                            label: '數量', //標籤
                                            data: q, //資料
                                            //圖表背景色
                                            backgroundColor: [
                                                'rgba(86,108,115)'
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
                                        indexAxis: 'y',
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: false,
                                                    responsive: true, //符合響應式
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
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="PieChart">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
                            <script>
                                var ctx = document.getElementById('PieChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'pie', //圖表類型
                                    data: {
                                        //標題
                                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                        datasets: [{
                                            label: '# test', //標籤
                                            data: [12, 19, 3, 5, 2, 3], //資料
                                            //圖表背景色
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            //圖表外框線色
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            //外框線寬度
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true,
                                                    responsive: true //符合響應式
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>

                        </canvas>

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
