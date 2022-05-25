<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('id', auth()->user()->id)->first();
        $data=['users' => $users];
        return view('member_data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    public function renew($user)
    {
        $user=User::find($user);

        if($_GET['password'] == '')
        {
            echo "<script>alert('請輸入新密碼'); location.href ='/users?update=';</script>";
        }
        else if(strlen($_GET['password'])<8)
        {
            echo "<script>alert('密碼長度不足'); location.href ='/users?update=';</script>";
        }
        else
        {
            $user->update(['name'=>$_GET['name'], 'email'=>$_GET['email'],'birthday'=>$_GET['birthday'],'phone'=>$_GET['phone'],'address'=>$_GET['address'],'password'=>Hash::make($_GET['password'])]);
            echo "<script>alert('修改成功'); location.href ='/users';</script>";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
