@extends('seller.layouts.master')

@section('title','品質鑑定申請')

@section('breadcrumb')
    <li class="breadcrumb-item" style="color: #4E4F97"><a href="{{route('seller.dashboard')}}">首頁</a></li>
    <li class="breadcrumb-item active" style="color: #4E4F97">申請品質鑑定</li>
@endsection

@section('content')
    <style>
        .mar
        {
            margin-bottom: 20px;
        }
    </style>

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
            <form action="/products/{{$pid}}/exams" method="POST" role="form" class="row g-3">
                @method('POST')
                @csrf

                <div class="row g-3">
                    <div class="col-md-7 mb-3">
                        <label for="inputname" class="form-label">商品名稱</label>
                        <input type="text" class="form-control"  aria-label="name" value="{{$name}}" disabled>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="inputname" class="form-label">類別</label>
                        <input type="text" class="form-control"  aria-label="name" value="{{$category}}" disabled>
                    </div>

                    <?php
                    $exam1_m=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Monday")))->whereIn('start',$one)->whereIn('end',$one)->get();
                    $exam1_a=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Monday")))->whereIn('start',$two)->whereIn('end',$two)->get();
                    $exam1_n=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Monday")))->whereIn('start',$three)->whereIn('end',$three)->get();

                    $exam2_m=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Tuesday")))->whereIn('start',$one)->whereIn('end',$one)->get();
                    $exam2_a=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Tuesday")))->whereIn('start',$two)->whereIn('end',$two)->get();
                    $exam2_n=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Tuesday")))->whereIn('start',$three)->whereIn('end',$three)->get();

                    $exam3_m=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Wednesday")))->whereIn('start',$one)->whereIn('end',$one)->get();
                    $exam3_a=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Wednesday")))->whereIn('start',$two)->whereIn('end',$two)->get();
                    $exam3_n=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Wednesday")))->whereIn('start',$three)->whereIn('end',$three)->get();

                    $exam4_m=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Thursday")))->whereIn('start',$one)->whereIn('end',$one)->get();
                    $exam4_a=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Thursday")))->whereIn('start',$two)->whereIn('end',$two)->get();
                    $exam4_n=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Thursday")))->whereIn('start',$three)->whereIn('end',$three)->get();

                    $exam5_m=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Friday")))->whereIn('start',$one)->whereIn('end',$one)->get();
                    $exam5_a=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Friday")))->whereIn('start',$two)->whereIn('end',$two)->get();
                    $exam5_n=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Friday")))->whereIn('start',$three)->whereIn('end',$three)->get();

                    $exam6_m=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Saturday")))->whereIn('start',$one)->whereIn('end',$one)->get();
                    $exam6_a=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Saturday")))->whereIn('start',$two)->whereIn('end',$two)->get();
                    $exam6_n=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Saturday")))->whereIn('start',$three)->whereIn('end',$three)->get();

                    $exam7_m=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Sunday")))->whereIn('start',$one)->whereIn('end',$one)->get();
                    $exam7_a=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Sunday")))->whereIn('start',$two)->whereIn('end',$two)->get();
                    $exam7_n=App\Models\Exam::where('date','=',date('Y-m-d',strtotime("this Sunday")))->whereIn('start',$three)->whereIn('end',$three)->get();
                    ?>

                    <div class="col-md-12" style="margin-top: 20px">
                        <label class="form-label">日期</label>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="mon" name="date" value="<?php echo date('Y-m-d',strtotime("this Monday"));?> " >
                            <label class="form-check-label" for="mon"><?php echo date('m/d',strtotime("this Monday"));?> 一</label>
                            <div class="row g-3">
                                @foreach($exam1_m as $em)
                                    @foreach($exam1_a as $ea)
                                        @foreach($exam1_n as $en)
                                            <?php
                                            //早上
                                            $w1[]=$em->start;
                                            $w2[]=$em->end;
                                            $em1=array_diff($one,$w1,$w2);

                                            //下午
                                            $w11[]=$ea->start;
                                            $w22[]=$ea->end;
                                            $ea1=array_diff($two,$w11,$w22);

                                            //晚上
                                            $w111[]=$en->start;
                                            $w222[]=$en->end;
                                            $en1=array_diff($three,$w111,$w222);

                                            ?>

                                            @foreach($mon as $m)

                                                @if($m->start=='09:00:00')
                                                    <div class="col-md-3 mb-3">
                                                        <label for="inputname" class="form-label">早上時段</label>
                                                        <select class="form-control" name="time1" id="time1" >

                                                            @if(!$em)
                                                                @foreach($em as $em1)
                                                                <option >{{$em1}}</option>
                                                                @endforeach
                                                            @else
                                                             @foreach($one as $o)
                                                             <option >{{$o}}</option>
                                                             @endforeach
                                                            @endif

                                                        </select>
                                                    </div>

                                                @elseif($m->start=='15:00:00')
                                                    <div class="col-md-3 mb-3">
                                                        <label for="inputname" class="form-label">下午時段</label>
                                                        <select class="form-control" name="time1" id="time2">

                                                            @if(!$ea)
                                                                @foreach($ea as $ea1)
                                                                <option>{{$ea1}}</option>
                                                                @endforeach
                                                            @else
                                                                @foreach($two as $tw)
                                                                    <option >{{$tw}}</option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>

                                                @elseif($m->start=='18:00:00')

                                                    <div class="col-md-3 mb-3">
                                                        <label for="inputname" class="form-label">晚上時段</label>
                                                        <select class="form-control" name="time1" id="time1" >

                                                            @if(!$en)
                                                                @foreach($en as $en1)
                                                                    <option>{{$en1}}</option>
                                                                @endforeach
                                                            @else
                                                                @foreach($three as $th)
                                                                    <option >{{$th}}</option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>

                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="tue" name="date" value="<?php echo date('Y-m-d',strtotime("this Tuesday"));?>" >
                            <label class="form-check-label" for="tue"><?php echo date('m/d',strtotime("this Tuesday"));?> 二</label>
                        </div>
                        <div class="row g-3">
                            @foreach($exam2_m as $em2)

                                @foreach($exam2_a as $ea2)

                                    @foreach($exam2_n as $en2)

                                        <?php
                                        $a1[]=$em2->start;
                                        $a2[]=$em2->end;
                                        $em_2=array_diff($one,$a1,$a2);

                                        $a11[]=$ea2->start;
                                        $a22[]=$ea2->end;
                                        $ea_2=array_diff($two,$a11,$a22);

                                        $a111[]=$en2->start;
                                        $a222[]=$en2->end;
                                        $en_2=array_diff($three,$a111,$a222);

                                        ?>

                                        @foreach($tue as $t)
                                            @if($t->start=='09:00:00')

                                                <div class="col-md-3 mb-3">
                                                    <label for="inputname" class="form-label">早上時段</label>
                                                    <select class="form-control" name="time1" id="time2_1">

                                                        @if(!$em2)
                                                            @foreach($em2 as $em_2)
                                                                <option>{{$em_2}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($one as $o)
                                                                <option >{{$o}}</option>
                                                            @endforeach
                                                        @endif


                                                    </select>
                                                </div>

                                            @elseif($t->start=='15:00:00')

                                                <div class="col-md-3 mb-3">
                                                    <label for="inputname" class="form-label">下午時段</label>
                                                    <select class="form-control" name="time1" id="time2_2" >

                                                        @if(!$ea2)
                                                            @foreach($ea2 as $ea_2)
                                                                <option>{{$ea_2}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($two as $tw)
                                                                <option >{{$tw}}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>

                                            @elseif($t->start=='18:00:00')

                                                <div class="col-md-3 mb-3">
                                                    <label for="inputname" class="form-label">晚上時段</label>
                                                    <select class="form-control" name="time1" id="time2_3" >

                                                        @if(!$en2)
                                                            @foreach($en2 as $en_2)
                                                                <option>{{$en_2}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($three as $th)
                                                                <option >{{$th}}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            @endif

                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>

                        <div class="form-check">
                        <input type="radio"  class="form-check-input" id="wed" name="date" value="<?php echo date('Y-m-d',strtotime("this Wednesday"));?>" >
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo date('m/d',strtotime("this Wednesday"));?> 三</label>
                        </div>
                        <div class="row g-3">
                            @foreach($exam3_m as $em3)

                                @foreach($exam3_a as $ea3)

                                    @foreach($exam3_n as $en3)

                                        <?php
                                        $b1[]=$em3->start;
                                        $b2[]=$em3->end;
                                        $em_3=array_diff($one,$b1,$b2);

                                        $b11[]=$ea3->start;
                                        $b22[]=$ea3->end;
                                        $ea_3=array_diff($two,$b11,$b22);

                                        $b111[]=$en3->start;
                                        $b222[]=$en3->end;
                                        $en_3=array_diff($three,$b111,$b222);

                                        ?>

                                        @foreach($wed as $w)
                                            @if($w->start=='09:00:00')

                                               <div class="col-md-3 mb-3">
                                               <label for="inputname" class="form-label">早上時段</label>
                                                <select class="form-control" name="time1" id="time3_1" >


                                                    @if(!$ea3)
                                                        @foreach($ea3 as $ea_3)
                                                            <option>{{$ea_3}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($three as $th)
                                                            <option >{{$th}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                               </div>

                                            @elseif($w->start=='15:00:00')
                                               <div class="col-md-3 mb-3">
                                               <label for="inputname" class="form-label">下午時段</label>
                                               <select class="form-control" name="time1" id="time3_2" >

                                                   @if(!$ea3)
                                                       @foreach($ea3 as $ea_3)
                                                           <option>{{$ea_3}}</option>
                                                       @endforeach
                                                   @else
                                                       @foreach($two as $tw)
                                                           <option >{{$tw}}</option>
                                                       @endforeach
                                                   @endif

                                               </select>
                                               </div>

                                            @elseif($w->start=='18:00:00')

                                             <div class="col-md-3 mb-3">
                                             <label for="inputname" class="form-label">晚上時段</label>
                                             <select class="form-control" name="time1" id="time3_3" >

                                                 @if(!$en3)
                                                     @foreach($en3 as $en_3)
                                                         <option>{{$en_3}}</option>
                                                     @endforeach
                                                 @else
                                                     @foreach($three as $th)
                                                         <option >{{$th}}</option>
                                                     @endforeach
                                                 @endif

                                             </select>
                                             </div>

                                            @endif

                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="thu" name="date" value="<?php echo date('Y-m-d',strtotime("this Thursday"));?>" >
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo date('m/d',strtotime("this Thursday"));?> 四</label>
                        </div>
                        <div class="row g-3">
                            @foreach($exam4_m as $em4)

                                @foreach($exam4_a as $ea4)

                                    @foreach($exam4_n as $en4)

                                        <?php
                                        $c1[]=$em4->start;
                                        $c2[]=$em4->end;
                                        $em_4=array_diff($one,$c1,$c2);

                                        $c11[]=$ea4->start;
                                        $c22[]=$ea4->end;
                                        $ea_4=array_diff($two,$c11,$c22);

                                        $c111[]=$en4->start;
                                        $c222[]=$en4->end;
                                        $en_4=array_diff($three,$c111,$c222);
                                        ?>

                                        @foreach($tur as $tt)

                                            @if($tt->start=='09:00:00')

                                              <div class="col-md-3 mb-3">
                                              <label for="inputname" class="form-label">下午時段</label>
                                              <select class="form-control" name="time1" id="time4_1" >

                                                  @if(!$em4)
                                                      @foreach($em4 as $em_4)
                                                          <option>{{$em_4}}</option>
                                                      @endforeach
                                                  @else
                                                      @foreach($one as $o)
                                                          <option >{{$o}}</option>
                                                      @endforeach
                                                  @endif

                                               </select>
                                               </div>

                                            @elseif($tt->start=='15:00:00')

                                            <div class="col-md-3 mb-3">
                                            <label for="inputname" class="form-label">下午時段</label>
                                            <select class="form-control" name="time1" id="time4_2" >

                                                @if(!$ea4)
                                                    @foreach($ea4 as $ea_4)
                                                        <option>{{$ea_4}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach($two as $tw)
                                                        <option >{{$tw}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                            </div>

                                            @elseif($tt->start=='18:00:00')

                                            <div class="col-md-3 mb-3">
                                            <label for="inputname" class="form-label">晚上時段</label>
                                            <select class="form-control" name="time1" id="time4_3" >

                                                @if(!$en4)
                                                    @foreach($en4 as $en_4)
                                                        <option>{{$en_4}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach($three as $th)
                                                        <option >{{$th}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                            </div>

                                            @endif

                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>

                        <div class="form-check ">
                        <input type="radio" class="form-check-input" id="fri" name="date" value="<?php echo date('Y-m-d',strtotime("this Friday"));?>" >
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo date('m/d',strtotime("this Friday"));?> 五</label>
                        </div>
                        <div class="row g-3">
                            @foreach($exam5_m as $em5)

                                @foreach($exam5_a as $ea5)

                                    @foreach($exam5_n as $en5)

                                        <?php
                                        $d1[]=$em5->start;
                                        $d2[]=$em5->end;
                                        $em_5=array_diff($one,$d1,$d2);

                                        $d11[]=$ea5->start;
                                        $d22[]=$ea5->end;
                                        $ea_5=array_diff($two,$d11,$d22);

                                        $d111[]=$en5->start;
                                        $d222[]=$en5->end;
                                        $en_5=array_diff($three,$d111,$d222);

                                        ?>

                                        @foreach($fri as $f)

                                            @if($f->start=='09:00:00')

                                            <div class="col-md-3 mb-3">
                                            <label for="inputname" class="form-label">早上時段</label>
                                            <select class="form-control" name="time1" id="time5_1" >

                                                @if(!$em5)
                                                    @foreach($em5 as $em_5)
                                                        <option>{{$em_5}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach($one as $o)
                                                        <option >{{$o}}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                            </div>

                                            @elseif($f->start=='15:00:00')
                                              <div class="col-md-3 mb-3">
                                              <label for="inputname" class="form-label">下午時段</label>
                                               <select class="form-control" name="time1" id="time5_2" >

                                                   @if(!$ea5)
                                                       @foreach($ea5 as $ea_5)
                                                           <option>{{$ea_5}}</option>
                                                       @endforeach
                                                   @else
                                                       @foreach($two as $tw)
                                                           <option >{{$tw}}</option>
                                                       @endforeach
                                                   @endif

                                               </select>
                                              </div>

                                            @elseif($f->start=='18:00:00')

                                              <div class="col-md-3 mb-3">
                                              <label for="inputname" class="form-label">晚上時段</label>
                                              <select class="form-control" name="time1" id="time5_3" >

                                                  @if(!$en5)
                                                      @foreach($en5 as $en_5)
                                                          <option>{{$en_5}}</option>
                                                      @endforeach
                                                  @else
                                                      @foreach($three as $th)
                                                          <option >{{$th}}</option>
                                                      @endforeach
                                                  @endif

                                              </select>
                                              </div>

                                          @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="sat" name="date" value="<?php echo date('Y-m-d',strtotime("this Saturday"));?>" >
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo date('m/d',strtotime("this Saturday"));?> 六</label>
                        </div>
                        <div clas="row g-3">
                            @foreach($exam6_m as $em6)

                                @foreach($exam6_a as $ea6)

                                    @foreach($exam6_n as $en6)

                                        <?php
                                        $f1[]=$em6->start;
                                        $f2[]=$em6->end;
                                        $em_5=array_diff($one,$f1,$f2);

                                        $f11[]=$ea6->start;
                                        $f22[]=$ea6->end;
                                        $ea_6=array_diff($two,$f11,$f22);

                                        $f111[]=$en6->start;
                                        $f222[]=$en6->end;
                                        $en_6=array_diff($three,$f111,$f222);

                                        ?>

                                        @foreach($sat as $s)

                                            @if($s->start=='09:00:00')
                                              <div class="col-md-3 mb-3">
                                              <label for="inputname" class="form-label">早上時段</label>
                                               <select class="form-control" name="time1" id="time6_1" >

                                                   @if(!$em6)
                                                       @foreach($em6 as $em_6)
                                                           <option>{{$em_6}}</option>
                                                       @endforeach
                                                   @else
                                                       @foreach($one as $o)
                                                           <option >{{$o}}</option>
                                                       @endforeach
                                                   @endif
                                               </select>
                                              </div>

                                            @elseif($s->start=='15:00:00')

                                             <div class="col-md-3 mb-3">
                                             <label for="inputname" class="form-label">下午時段</label>
                                             <select class="form-control" name="time1" id="time6_2" >

                                                 @if(!$ea6)
                                                     @foreach($ea6 as $ea_6)
                                                         <option>{{$ea_6}}</option>
                                                     @endforeach
                                                 @else
                                                     @foreach($two as $tw)
                                                         <option >{{$tw}}</option>
                                                     @endforeach
                                                 @endif

                                             </select>
                                             </div>

                                            @elseif($s->start=='18:00:00')

                                               <div class="col-md-3 mb-3">
                                               <label for="inputname" class="form-label">晚上時段</label>
                                                <select class="form-control" name="time1" id="time6_3">

                                                    @if(!$en6)
                                                        @foreach($en6 as $en_6)
                                                            <option>{{$en_6}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($three as $th)
                                                            <option >{{$th}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                               </div>
                                            @endif

                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>

                        <div class="form-check">
                        <input type="radio" class="form-check-input" id="sun" name="date" value="<?php echo date('Y-m-d',strtotime("this Sunday"));?>" >
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo date('m/d',strtotime("this Sunday"));?> 日</label>
                        </div>
                        <div class="row g-3">

                            @foreach($exam7_m as $em7)

                                @foreach($exam7_a as $ea7)

                                    @foreach($exam7_n as $en7)

                                        <?php
                                        $g1[]=$em7->start;
                                        $g2[]=$em7->end;
                                        $em_7=array_diff($one,$g1,$g2);

                                        $g11[]=$ea7->start;
                                        $g22[]=$ea7->end;
                                        $ea_7=array_diff($two,$g11,$g22);

                                        $g111[]=$en7->start;
                                        $g222[]=$en7->end;
                                        $en_7=array_diff($three,$g111,$g222);

                                        ?>

                                        @foreach($sun as $su)
                                            @if($su->start=='09:00:00')

                                               <div class="col-md-3 mb-3">
                                               <label for="inputname" class="form-label">早上時段</label>
                                               <select class="form-control" name="time1" id="time7_1">

                                                   @if(!$em7)
                                                       @foreach($em7 as $em_7)
                                                           <option>{{$em_7}}</option>
                                                       @endforeach
                                                   @else
                                                       @foreach($one as $o)
                                                           <option >{{$o}}</option>
                                                       @endforeach
                                                   @endif

                                               </select>
                                               </div>

                                            @elseif($su->start=='15:00:00')

                                               <div class="col-md-3 mb-3">
                                               <label for="inputname" class="form-label">下午時段</label>
                                                <select class="form-control" name="time1" id="time7_2">

                                                    @if(!$ea7)
                                                        @foreach($ea7 as $ea_7)
                                                            <option>{{$ea_7}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($two as $tw)
                                                            <option >{{$tw}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                               </div>

                                            @elseif($su->start=='18:00:00')

                                               <div class="col-md-3 mb-3">
                                               <label for="inputname" class="form-label">晚上時段</label>
                                                <select class="form-control" name="time1" id="time7_3">

                                                    @if(!$en7)
                                                        @foreach($en7 as $en_7)
                                                            <option>{{$en_7}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($three as $th)
                                                            <option >{{$th}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                               </div>

                                            @endif

                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    </div>

                    <div class="card" style="color: #577C8A;margin-top: 20px">
                    <div class="card-body">
                        <h5 class="card-title">付款資料</h5><hr>
                        <div class="row g-3">

                            <label for="csv" class="form-label" style="margin-left: 12px">信用卡/金融卡號</label>
                            <div class="row g-3" id="a">

                            <div class="col-md-2 mb-auto" style="margin-left: 12px">
                            <input type="text" class="form-control" id="one" maxlength="4" >
                            </div>
                                ─
                            <div class="col-md-2 mb-auto" >
                                <input type="text" class="form-control" maxlength="4" >
                            </div>
                                ─
                            <div class="col-md-2 mb-auto" >
                                <input type="text" class="form-control" maxlength="4" >
                            </div>
                                ─
                            <div class="col-md-2 mb-auto" >
                                <input type="text" class="form-control" maxlength="4" >
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
                                <input type="text" class="form-control" aria-label="csv"  pattern="[0-9]{3}">
                            </div>

                        </div>
                        <hr class="sidebar-divider" style="margin-top: 20px">
                        <div class="col-12" style="text-align: right">
                            <h5 style="color: black">總付款金額 &nbsp;NT$100</h5>
                        </div>
                    </div>
                </div>


                <div class="col-12" style="margin-top:20px ">
                    <button class="btn btn-facebook " type="submit">確認</button>
                </div>

            </form>
        </div>
        </div>
       </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
        </div>
    </div>

    <!-- /.row -->
@endsection
