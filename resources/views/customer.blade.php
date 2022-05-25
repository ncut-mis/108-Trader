@extends('layouts.master')

@section('title','買家資訊')

@section('content')

    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    </head>

    <div class="table-responsive" style="margin-bottom:5%;text-align: center;">
        <table class="table text-start align-middle table-hover mb-0" style="frame:void">
            <ol class="breadcrumb mar">
                <li class="breadcrumb-item" style="border: none; color: grey"><a>首頁</a></li>
                <li class="breadcrumb-item active" style="border: none; color: grey"><a style="color: grey" href="{{route('cart_items.index')}}">購物車</a></li>
                <li class="breadcrumb-item" style="border: none; color: grey"><a>購買清單</a></li>
                <li class="breadcrumb-item" style="border: none; color: grey"><a>買家資訊</a></li>
            </ol>
            <thead>
            <tr>
                <?php
                    $cart_total = 0;
                    $q_total = 0;
                ?>
                <td style="text-align: left;vertical-align: middle; border: none;">
                    @foreach($check2 as $checkout2)
                        <?php
                            $sum = $checkout2->price * $checkout2->quantity;
                            $cart_total = $cart_total + $sum;
                            $q_total = $q_total + $checkout2->quantity;
                        ?>
                    @endforeach
                    本次消費件數為：{{$q_total}}件<br><br>
                    本次消費金額為：$ {{$cart_total}}
                </td>
            </tr>
            </thead>
                <tfoot>
                <tbody>
                <?php
                $member = \App\Models\User::
                where('id',auth()->user()->id)
                    ->first();
                ?>
                <form action="{{route('cart_items.done',$checkout2->id)}}">
                    <tr style="background: #c0c0c0">
                        <td colspan="2" style="border: none;">
                            <div style="text-align: left">
                                <b>付款方式</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none;">
                            <div style="text-align: left">
                                <input type="radio" name="way" id="way1" value="0" style="display: inline" onclick="divClick();" checked>
                                <label for="way1" style="display: inline">信用卡</label>
                                <br><br><input type="radio" name="way" id="way2" value="1" style="display: inline" onclick="divClick();">
                                <label for="way2" style="display: inline">貨到付款</label>
                            </div>
                        </td>
                    </tr>
                    <tr style="background: #c0c0c0">
                        <td colspan="2" style="border: none;">
                            <div style="text-align: left">
                                <b>買家資訊</b>
                            </div>
                        </td>
                    </tr>

                    <tr><td colspan="7" style="border: none;"><div style="text-align: left"><b>姓名：</b>{{$member->name}}</div><br>
                            <div style="text-align: left; border: none;"><b>電話：</b>{{$member->phone}}</div><br>
                            <div style="text-align: left; border: none;"><b>地址：</b>{{$member->address}}</div><br>
                            <div id="card">
                                <div style="text-align: left; border: none;"><b>信用卡卡號：</b>
                                     <input type="text" name="card_num1" maxlength="4" size="5" style="border:1px lightgray solid; display: inline; height:30px;" onKeyUp="next(this,'card_num2')">
                                   - <input type="text" name="card_num2" maxlength="4" size="5" style="border:1px lightgray solid; display: inline; height:30px;" onKeyUp="next(this,'card_num3')">
                                   - <input type="text" name="card_num3" maxlength="4" size="5" style="border:1px lightgray solid; display: inline; height:30px;" onKeyUp="next(this,'card_num4')">
                                   - <input type="text" name="card_num4" maxlength="4" size="5" style="border:1px lightgray solid; display: inline; height:30px;" onKeyUp="next(this,'card_date1')">
                                </div><br>
                                <div style="text-align: left; border: none;"><b>信用卡到期日：</b>
                                    <input type="text" name="card_date1" maxlength="2" size="3" style="border:1px lightgray solid; display: inline; height:30px;" onKeyUp="next(this,'card_date2')"> /
                                    <input type="text" name="card_date2" maxlength="2" size="3" style="border:1px lightgray solid; display: inline; height:30px;" onKeyUp="next(this,'card_csv')">
                                </div><br>
                                <div style="text-align: left; border: none;"><b>信用卡安全碼：</b>
                                    <input type="text" name="card_csv" maxlength="3" size="5" style="border:1px lightgray solid; display: inline; height:30px;">
                                </div><br>
                            </div>
                   </td></tr>
                    <tr style="background: #c0c0c0">
                        <td colspan="13">
                            <div style="text-align: left;">
                                <b>收貨人</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: none;">
                            <input type="checkbox" name="same" value="same" style="display: inline" onclick="divCheck();">同上
                        </td>
                    </tr>
                    <tr>
                        <td colspan="15" style="border: none;">
                            <div id="same">
                                <div style="text-align: left">
                                    <b>姓名：</b>
                                    <input type="text" name="name" value="{{$member->name}}" style="border:1px lightgray solid; display: inline; height:30px;">
                                </div><br>
                                <div style="text-align: left">
                                    <b>電話：</b>
                                    <input type="text" name="phone" value="{{$member->phone}}" style="border:1px lightgray solid; display: inline; height:30px;">
                                </div><br>
                                <div style="text-align: left">
                                    <b>地址：</b>
                                    <input type="text" name="address" value="{{$member->address}}" style="width:300px;border:1px lightgray solid; display: inline; height:30px;">
                                </div><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="18">
                            <div style="text-align: center">
                                <button style="text-align:center" class="btn btn-sm btn-primary">下單</button>
                            </div>
                        </td>
                    </tr>
                </form>
                </tfoot>
                </tbody>
        </table>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    function divClick()
    {
        var show = "";
        var radiobtn = document.getElementsByName("way");
        for(var i=0; i<radiobtn.length; i++)
        {
            if(radiobtn[i].checked)
                show = radiobtn[i].value;
        }

        switch (show)
        {
            case "0":
                document.getElementById("card").style.display="block";
                break;

            case "1":
                document.getElementById("card").style.display="none";
                break;
        }
    }

    function divCheck()
    {
        // 獲取選中狀態
        var i = $('input[name="same"]').is(':checked');
        if (i == true) {
            // 隱藏
            document.getElementById("same").style.display="none";
        }else{
            // 顯示
            document.getElementById("same").style.display="block";
        }
    }

    function next(obj,next)
    {
        if (obj.value.length == obj.maxLength)  //注意此處maxLength的大小寫
            obj.form.elements[next].focus();
    }
</script>
