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
                            <div class="h5 mb-0 " style="color: black">{{$num}}筆</div>
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
                                @if($count>0)
                                {{$score}}({{$count}}個)
                                @elseif($count==0)
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
                                客單價
                                <span  data-bs-toggle="tooltip" title="銷售額除以顧客數">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16" style="margin-bottom: 6px;color: black" >
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                </span>
                            </div>
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

         <div class="col-xs-9 col-lg-9">
        <div class="card shadow mb-4">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">各商品銷售量</h6>
                </div>

                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
                               <script>
                                   <?php

                                   $name=\App\Models\Product::where('products.seller_id','=',auth()->user()->id)->
                                   join('order_details','products.id','=','order_details.product_id')->
                                   join('orders','orders.id','=','order_details.order_id')->
                                   join('users','users.id','=','orders.seller_id')->
                                   select('products.name','quantity')->groupby('products.name')->get();

                                   $data = [];

                                    foreach($name as $row) {
                                     $data['label'][] = $row->name;
                                      $data['data'][] = $row->quantity;
                                        }
                                    $data['chart_data'] = json_encode($data);


                                   ?>

                                   var ctx = document.getElementById('myChart');
                                   var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);

                                   var myChart = new Chart(ctx, {
                                       type: 'bar', //圖表類型
                                       data: {
                                           //標題
                                           labels:cData.label,
                                           datasets: [{
                                               label: '銷售數量', //標籤
                                               data:cData.data , //資料
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
                                           indexAxis: 'y',
                                           scales: {
                                               yAxes: [{
                                                   ticks: {
                                                       beginAtZero: true,
                                                       responsive: true, //符合響應式
                                                       stepSize:5
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

        <!--<div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">

                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>

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
                    </div>-->

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
