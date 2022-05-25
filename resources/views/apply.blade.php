@extends('layouts.master')

@section('title', '賣家申請單')

@section('content')

<div class="bg0 m-t-23 p-b-140">
    <table class="table table-hover" frame="void" cellpadding="10" cellspacing="10" style="text-align:center;">
        <thead>
        <tr>
            <th>
                <div style="text-align:center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>&nbsp;<font size="6"><b>賣家申請單</b></font>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border:none"><br>
                <h5>
                    會員名稱：{{ $users->name }}
                </h5>
            </td>
        </tr>

        <tr>
            <td style="border:none"><br>
                <h5>
                    Email：{{ $users->email }}
                </h5>
            </td>
        </tr>

        <tr>
            <td style="border:none"><br>
                <h5>
                    生日：{{ $users->birthday }}
                </h5>
            </td>
        </tr>

        <tr>
            <td style="border:none"><br>
                <h5>
                    電話：{{ $users->phone }}
                </h5>
            </td>
        </tr>

        <tr>
            <td style="border:none"><br>
                <h5>
                    地址：{{ $users->address }}
                </h5>
            </td>
        </tr>

        <?php
            $sellers=\App\Models\Seller::where('member_id','=',auth()->user()->id)->first();
        ?>

        @if(isset($sellers))
            <tr>
                <td style="border:none"><br>
                    <h5>
                        分行代碼：{{ $sellers->bank_branch }}
                    </h5>
                </td>
            </tr>

            <tr>
                <td style="border:none"><br>
                    <h5>
                        帳戶：{{ $sellers->account }}
                    </h5>
                </td>
            </tr>

            <tr>
                <td style="border:none"><br>
                    <button class="btn btn-light" name="update" disabled>申請中</button>
                    <br>
                </td>
            </tr>
        @else
            <form action="{{route('sellers.apply')}}">
                <tr>
                    <td style="border:none"><br>
                        <h5>分行代碼：
                            <input type="text" name="bank_branch" size="8" style="border:1px lightgray solid;display:inline">
                        </h5>
                    </td>
                </tr>

                <tr>
                    <td style="border:none"><br>
                        <h5>帳戶：
                            <input type="text" name="account" size="8" style="border:1px lightgray solid;display:inline">
                        </h5>
                    </td>
                </tr>

                <tr>
                    <td style="border:none"><br>
                            <button class="btn btn-light" name="apply">申請</button>
                        <br>
                    </td>
                </tr>
            </form>
        @endif
        </tbody>
    </table>
</div>
@endsection

