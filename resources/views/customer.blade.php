@extends('layouts.master')

@section('title','買家資訊')

@section('content')

    <div class="table-responsive" style="margin-bottom:5%;text-align: center;">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <ol class="breadcrumb mar">
                <li class="breadcrumb-item" style="color: grey"><a>首頁</a></li>
                <li class="breadcrumb-item active" style="color: grey"><a style="color: grey" href="{{route('cart_items.index')}}">購物車</a></li>
                <li class="breadcrumb-item" style="color: grey"><a>購買清單</a></li>
                <li class="breadcrumb-item" style="color: grey"><a>買家資訊</a></li>
            </ol>
            <thead>
            <tr>
                <?php
                    $cart_total = 0;
                    $q_total = 0;
                ?>
                <td style="text-align: left;vertical-align: middle">
                    @foreach($check2 as $checkout2)
                        <?php
                            $sum = $checkout2->price * $checkout2->quantity;
                            $cart_total = $cart_total + $sum;
                            $q_total = $q_total + $checkout2->quantity;
                        ?>
                    @endforeach
                    本次消費件數為：{{$q_total}}<br>
                    本次消費金額為：${{$cart_total}}
                </td>
            </tr>
            </thead>
                <tfoot>
                <tbody>
                </tr>
                <?php
                $member = \App\Models\User::
                where('id',auth()->user()->id)
                    ->first();
                ?>
                <form action="{{route('cart_items.done',$checkout2->id)}}">
                    <tr>
                        <td colspan="2">
                            <div style="text-align: center">
                                <b>付款方式</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="text-align: left">
                                <input type="radio" name="way" value="0">信用卡
                                <input type="radio" name="way" value="1">貨到付款
                                {{--<label class="radio-inline" for="t1"><input type="radio" name="way" id="0" value="0">信用卡</label>
                                <label class="radio-inline" for="t2"><input type="radio" name="way" id="1" value="1">貨到付款</label>--}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="text-align: center">
                                <b>買家資訊</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div style="text-align: left">
                                <b>姓名：</b>{{$member->name}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <div style="text-align: left">
                                <b>電話：</b>{{$member->phone}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9">
                            <div style="text-align: left">
                                <b>地址：</b>{{$member->address}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            <div style="text-align: left">
                                <b>信用卡/簽帳金融卡號</b>(Visa/Mastercard/JCB)：
                                <input type="text" name="card_number">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="11">
                            <div style="text-align: left">
                                <b>信用卡到期日：</b>
                                <input type="text" name="card_date">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <div style="text-align: left">
                                <b>信用卡安全碼</b>(CSV)：
                                <input type="text" name="card_csv">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="13">
                            <div style="text-align: center">
                                <b>收貨人(可更改)</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="15">
                            <div style="text-align: left">
                                <b>姓名：</b>
                                <input type="text" name="name" value="{{$member->name}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="16">
                            <div style="text-align: left">
                                <b>電話：</b>
                                <input type="text" name="phone" value="{{$member->phone}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="17">
                            <div style="text-align: left">
                                <b>地址：</b>
                                <input type="text" style="width:300px;" name="address" value="{{$member->address}}">
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

