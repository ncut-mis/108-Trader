@extends('seller.layouts.master')

@section('title','品質鑑定申請')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">申請品質鑑定</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="row g-3">
                <div class="col-md-7 mb-3">
                    <label for="inputname" class="form-label">商品名稱</label>
                    <input type="text" class="form-control"  aria-label="name" value="{{$name}}" disabled>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="inputname" class="form-label">類別</label>
                    <input type="text" class="form-control"  aria-label="name" value={{$category}} disabled>
                </div>


                <div class="col-md-12" style="margin-top: 20px">
                    <form name="form1" action="{{route('exams.se')}}" role="form" method="GET">

                        <label class="form-label">日期</label>
                        <?php
                        $week[]='';
                        date_default_timezone_set('Asia/Taipei');//時區調整

                        for($i=0;$i<7;$i++)
                        {
                            $week[$i]=date('m-d',strtotime('+'.$i.'day'));
                            $d=explode("-",'2022-'.$week[$i]);
                            $f=date("w",mktime(0,0,0,$d[1],$d[2],$d[0]));
                            if($f==0)
                                $wk='日';
                            else if ($f==1)
                                $wk='一';
                            else if ($f==2)
                                $wk='二';
                            else if ($f==3)
                                $wk='三';
                            else if ($f==4)
                                $wk='四';
                            else if ($f==5)
                                $wk='五';
                            else if ($f==6)
                                $wk='六';

                            echo "<div class='form-check form-check-inline'>
                                  <input type='radio' name='mydate' value=$week[$i] class='form-check-input'>
                                  <label class='form-check-label'>$week[$i]($wk)</label>
                                  </div>";

                        }


                        ?><hr>
                        <input type='submit' class='btn btn-sm btn-outline-secondary shadow-sm' value='查詢'>
                    </form>
                    <label class="form-label"></label>
                    <form name="form2" action="{{route('exams.se')}}" role="form" method="GET">
                        <?php
                        if (isset($_SESSION['goodstart']))
                        {
                            foreach ($_SESSION['goodstart'] as $tt)

                            {
                                if($tt=='')
                                    echo '';
                                else
                                    echo "<div class='form-check form-check-inline' style='margin-top: 20px'>
                                          <input type='radio' name='tt' value=$tt class='form-check-input'>
                                          <label class='form-check-label'>$tt</label>
                                          </div>";

                            }

                        }


                        ?>
                        <hr class="sidebar-divider d-none d-md-block">
                        <input type='submit' class='btn btn-sm btn-outline-secondary shadow-sm' value='查詢詳細時段'>
                    </form>
                    <form name="form3" action="{{route('exams.se')}}" role="form" method="GET">
                        <?php
                        if (isset($_SESSION['goodsection']))
                        {
                            foreach ($_SESSION['goodsection'] as $cc)
                            {
                                echo "<div class='form-check form-check-inline' style='margin-top: 20px'>
                                      <input type='radio' name='cc' value=$cc class='form-check-input'>
                                      <label class='form-check-label'>$cc</label>
                                      </div>";

                            }

                        }


                        ?>

                        <hr class="sidebar-divider d-none d-md-block">
                        <input type='submit' class='btn btn-sm btn-outline-secondary shadow-sm' value='確認'>
                    </form>
                    <?php
                    if(isset($_SESSION['detail']))
                    {
                        echo  "<div style='margin-top: 20px'>您選擇的時段為".$_SESSION['detail']."</div>";

                    }

                    ?>

                    <form name="form4" action="{{route('exams.add')}}" role="form" method="GET">
                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="card" style="color: #577C8A;margin-top: 20px">
                            <div class="card-body">
                                <h5 class="card-title">付款資料</h5><hr>
                                <div class="row g-3">

                                    <label for="csv" class="form-label" style="margin-left: 12px">信用卡/金融卡號</label>
                                    <div class="row g-3" id="a">

                                        <div class="col-md-2 mb-auto" style="margin-left: 12px">
                                            <input type="text" class="form-control" id="one" maxlength="4" pattern="[4-9]{4}" required>
                                        </div>
                                        ─
                                        <div class="col-md-2 mb-auto" >
                                            <input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" required>
                                        </div>
                                        ─
                                        <div class="col-md-2 mb-auto" >
                                            <input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" required>
                                        </div>
                                        ─
                                        <div class="col-md-2 mb-auto" >
                                            <input type="text" class="form-control" maxlength="4" pattern="[0-9]{4}" required>
                                        </div>

                                    </div>

                                    <script >
                                        var demo=document.getElementById('a');
                                        input=demo.getElementsByTagName('input');
                                        var iNow=0;
                                        type   = !-[1,] ? 'onpropertychange' : 'oninput',
                                            limit  = 4; //滿足自動切換焦點的字元數
                                        for(var i=0;i<input.length-1;i++){
                                            input[i].index=i;
                                            input[i][type]=function () {
                                                iNow=this.index;
                                                var that=this;
                                                setTimeout(function () {
                                                    that.value.length>limit-1&&input[iNow+1].focus();
                                                },0)
                                            }
                                        }

                                    </script>

                                    <div class="col-md-4 mb-auto" style="margin-top: 20px">
                                        <label for="csv" class="form-label">信用卡到期日</label>
                                        <input type="month" class="form-control" aria-label="date">
                                    </div>

                                    <div class="col-md-3 mb-auto" style="margin-top: 20px">
                                        <label for="csv" class="form-label">信用卡安全碼</label>
                                        <input type="text" class="form-control" aria-label="csv"  maxlength="3" pattern="[0-9]">
                                    </div>

                                </div>
                                <hr class="sidebar-divider" style="margin-top: 20px">
                                <div class="col-12" style="text-align: right">
                                    <h5 style="color: black">總付款金額 &nbsp;NT$100</h5>
                                </div>
                            </div>
                        </div>


                        <div class="col-12" style="margin-top:20px ">
                            {{--                    <button class="btn btn-facebook " type="submit">確認</button>--}}
                        </div>
                        <input type='submit' class='btn btn-sm btn-secondary' value='確認'>
                    </form>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
    </div>

    </div>

    <!-- /.row -->
@endsection

