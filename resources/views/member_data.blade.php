@extends('layouts.master')

@section('title', $users->name.'的會員資料')

@section('content')

<div class="bg0 m-t-23 p-b-140">
    @if(isset($_GET['update']))
        <form action="{{route('users.renew', auth()->user()->id)}}" method="GET">
            <table class="table table-hover" frame="void" cellpadding="10" cellspacing="10" style="text-align:center;">
                    <thead>
                        <tr>
                            <div style="text-align:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>&nbsp;<font size="6"><b>會員個人資料</b></font>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border:none"><br>
                                <div class="form-group">
                                    <h5>會員名稱：
                                    <input type="text" name="name" value="{{ $users->name }}" size="8" style="border:1px lightgray solid;display:inline">
                                    </h5>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border:none"><br>
                                <div class="form-group">
                                    <h5>Email：
                                        <input type="text" name="email" value="{{ $users->email }}" style="border:1px lightgray solid;display:inline">
                                    </h5>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border:none"><br>
                                <div class="form-group">
                                    <h5>生日：
                                        <input type="date" name="birthday" value="{{ $users->birthday }}" style="border:1px lightgray solid;display:inline">
                                    </h5>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border:none"><br>
                                <div class="form-group">
                                    <h5>電話：
                                        <input type="text" name="phone" value="{{ $users->phone }}" size="8" style="border:1px lightgray solid;display:inline">
                                    </h5>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border:none"><br>
                                <div class="form-group">
                                    <h5>地址：
                                        <input type="text" name="address" value="{{ $users->address }}" style="width:300px;border:1px lightgray solid;display:inline">
                                    </h5>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border:none"><br>
                                <div class="form-group">
                                    <h5>密碼：
                                        <input type="password" name="password" size="8" style="border:1px lightgray solid;display:inline">
                                    </h5>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border:none"><br>
                                <button type="submit" class="btn btn-success">更新</button>
                            </td>
                        </tr>
                    </tbody>
            </table>
        </form>
    @else
        <table class="table table-hover" frame="void" cellpadding="10" cellspacing="10" style="text-align:center;">
            <thead>
            <tr>
                <th>
                    <div style="text-align:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>&nbsp;<font size="6"><b>會員個人資料</b></font>
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

            <tr>
                <td style="border:none"><br>
                    <form action="{{route('users.index')}}">
                        <button class="btn btn-light" name="update">修改會員資料</button>
                    </form>
                    <br></td>
            </tr>
            </tbody>
        </table>
    @endif
</div>
@endsection

