@extends('seller.layouts.master')

@section('title','平台公告')


@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97"><a href="{{route('seller.post')}}">平台公告</a></li>
@endsection

@section('content')


    @if(isset($posts))
        <thead>
            <tr>
                <th>日期</th>
                <th>標題</th>
                <th> </th>
            </tr>
        </thead>
        <tfoot>
        <tbody>
        @foreach($posts as $p)
            <tr>
                <td><div>{{$p->date}}</div></td>
                <td><div>{{$p->title}}</div></td>
                <td><div>
                        <form action="{{route('posts.show',$p->id)}}">
                            <input type="hidden" name="id" value="{{$p->id}}">
                            <button style="text-align:center; color: black" class="btn btn-sm btn-link">詳細內容</button>
                        </form>
                </div></td>
            </tr>
        @endforeach
    @endif
    @if(isset($post1))
        <table>
            <tr><td><div>
                <h2 style="white-space: pre-line">{{$post1->title}}</h2>
            </div></td></tr>
            <tr><td><div>
                <p style="white-space: pre-line; font-size: 20px;">{{$post1->content}}</p>
            @if($post1->id == 4)
                <?php
                $check = \App\Models\Category::where('categories.status','=','1')->get();?>
                @foreach($check as $cc)
                    <tr><td><div>
                                <form action="{{route('posts.show_item',$cc->id)}}">
                                    <input type="hidden" name="category_id" value="{{$cc->id}}">
                                    <button style="text-align:center; vertical-align:center; color: black; font-size: 18px;" class="btn btn-sm btn-link">{{$cc->name}}</button>
                                </form>
                            </div></td></tr>
                @endforeach
                @if(isset($quality))
                    <tr>
                        <th>Quality_item</th>
                        <th>Extra_item</th>
                    </tr>
                    @foreach($quality as $qq)
                        <div style="font-size: 16px;">
                            <tr>
                                <td>
                                    {{$qq->content}}
                                </td>
                                @if($qq->extra == 1)
                                    <td style="text-align: center">是</td>
                                @else
                                    <td style="text-align: center">  </td>
                                @endif
                            </tr>
                        </div>
                    @endforeach
                @endif
            @endif
            </div></td></tr>
        </table>
    @endif
    </tbody>


@endsection
