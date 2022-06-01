<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Exam_item_score;
use App\Models\Per_week_schedule;
use App\Models\Product;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Exam::orderBy('date', 'ASC')->get();

        $name=Product::orderBy('id', 'ASC')->get();

        $category=Category::orderBy('id', 'ASC')->get();

        return view('seller.products.exams.index', compact('product','name','category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        session_start();

        $pid = Product::where('id', '=', $id)->value('id');

        $name = Product::where('id', '=', $id)->value('name');

        $category_id = Product::where('id', '=', $id)->value('category_id');

        $category = Category::where('id', '=', $category_id)->value('name');

        $c2= Category::where('id', '=', $category_id)->get();

        foreach ($c2 as $c)
        {
            $cname=$c->name;
        }
        $_SESSION['cname'] = $cname;
        $_SESSION['pid'] = $id;

        return view('seller.products.exams.create2',compact('name','pid','category'));

    }

    public  function  search()
    {
        session_start();

        if(isset($_GET['mydate']))
        {

            $month = date("n");
            $mydate=$_GET['mydate'];
            $_SESSION['mydate']=$mydate;
            $d=explode("-",'2022-'.$mydate);
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
            $sections = Per_week_schedule::orderby('start','ASC')->where('week',$wk)->where('month',$month)->get();
            $goodstart[]='';
            foreach ($sections as $ss)

            {
                $sid=$ss->staff_id;
                $staff = Staff::where('id',$sid)->get();
                foreach ($staff as $dd)
                {
                    if ($dd->job==$_SESSION['cname'])
                    {
                        $goodstart[]=$ss;
                        $_SESSION['sid']=$dd->id;
                    }

                }

            }

            if(isEmpty($goodstart))
            {
                echo "<script>history.go(-1)</script>";
            }
            else
            {
                echo '';
            }
            $_SESSION['goodstart']=$goodstart;

            echo "<script>history.go(-1)</script>";

        }

        if(isset($_GET['tt']))
        {
            $detail = DB::table('exams')->get();
            $start=$_GET['tt'];
            $end=$_GET['tt'];
            $_SESSION['start']=$start;
            $_SESSION['end']=$end;
            for($i=1;$i<=8;$i++)
            {
                $temp=date("H:i:s", strtotime($start."+15 minute"));
                foreach ($detail as $details)
                {
                    if($start==$details->start)//判斷資料庫是否有這筆資料
                    {
                        $_SESSION['tt']=1;
                        break;
                    }
                    else
                    {
                        $_SESSION['tt']=0;
                    }
                }
                if($_SESSION['tt']==0) {
                    $goodsection[] = $start;

                }

                $start=$temp;
            }
            $_SESSION['goodsection']=$goodsection;
            echo "<script>history.go(-1)</script>";
        }
        if(isset($_GET['cc']))
        {
            $_SESSION['detail']=$_GET['cc'];
            echo "<script>history.go(-1)</script>";
        }
        else
        {
            echo '';
        }

    }

    public  function  add()
    {
        session_start();
        $id = Exam::orderBy('date', 'ASC')->get();
        $pid = Product::where('id', '=', $id)->value('id');
        $end=date("H:i:s", strtotime($_SESSION['detail']."+15 minute"));
        if($_SESSION['cname']=='名牌服飾')
            $url='https://meet.google.com/qvh-hqum-dvc';
        else if($_SESSION['cname']=='專輯')
            $url='https://meet.google.com/zmy-tzzm-bxs';
        else  if($_SESSION['cname']=='鋼筆')
            $url='https://meet.google.com/kbn-dqif-mku';
        else   if($_SESSION['cname']=='書籍')
            $url='https://meet.google.com/hof-hvzr-ykt';

        DB::table('exams')->insert(
            [
                'product_id'=> $_SESSION['pid'],
                'staff_id'=>$_SESSION['sid'],
                'pass'=>0,
                'perfect'=>0,
                'url'=>$url,
                'start'=>$_SESSION['detail'],
                'end'=>$end,
                'date'=>'2022-'.$_SESSION['mydate'],


            ]
        );
        session_destroy();
//        return redirect()->route('product.exams.index');
        return redirect()->route('seller.dashboard');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request,$id)
    {

    }

    public function undone()
    {
//        $product=DB::table('exams')->orderBy('date','ASC')->
//        where('date','>',date('Y-m-d'))
//            ->orWhere(function($query) {
//                $query->where('date','=',date('Y-m-d'))
//                    ->where('start','>',date('H-i-s-30minutes'));
//            }) ->get();
        //因為可以用url是否為1來判斷該檢測是否完成
        $product=DB::table('exams')->orderBy('date','ASC')->where('url','!=','1')->get();

        $name=Product::orderBy('id', 'ASC')->get();

        $category=Category::orderBy('id', 'ASC')->get();

        return view('seller.products.exams.undone', compact('product','name','category'));
    }

    public function finish()
    {
//        $product=DB::table('exams')->orderBy('date','ASC')->
//        where('date','<',date('Y-m-d'))
//            ->orWhere(function($query) {
//                $query->where('date','=',date('Y-m-d'))
//                    ->where('start','<',date('H-i-s'));
//            }) ->get();
        //因為可以用url是否為1來判斷該檢測是否完成
        $product=DB::table('exams')->orderBy('date','ASC')->where('url','=','1')->get();

        $name=Product::orderBy('id', 'ASC')->get();

        $category=Category::orderBy('id', 'ASC')->get();

        return view('seller.products.exams.finish', compact('product','name','category'));

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::destroy($id);

        return redirect()->route('products.exams.index');
    }
}
