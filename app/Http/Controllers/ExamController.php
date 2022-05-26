<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Per_week_schedule;
use App\Models\Product;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

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
        $product = Exam::where('product_id', $id)->get();

        $pid = Product::where('id', '=', $id)->value('id');

        $name = Product::where('id', '=', $id)->value('name');

        $category_id = Product::where('id', '=', $id)->value('category_id');

        $category = Category::where('id', '=', $category_id)->value('name');

        $staff = Staff::where('job', '=', $category)->get();

        foreach ($staff as $s)
            $ss[] = $s->id;

        for ($i = 9; $i <= 10; $i++) {
            for ($j = 0; $j <= 45; $j += 15) {
                $one[] = str_pad($i, 2, '0', STR_PAD_LEFT) . ':' . str_pad($j, 2, '0', STR_PAD_LEFT) . ':' . '00';

            }
        }

        for ($i = 15; $i <= 16; $i++) {
            for ($j = 0; $j <= 45; $j += 15) {
                $two[] = str_pad($i, 2, '0', STR_PAD_LEFT) . ':' . str_pad($j, 2, '0', STR_PAD_LEFT) . ':' . '00';
            }
        }

        for ($i = 18; $i <= 20; $i++) {
            for ($j = 0; $j <= 45; $j += 15) {
                $three[] = str_pad($i, 2, '0', STR_PAD_LEFT) . ':' . str_pad($j, 2, '0', STR_PAD_LEFT) . ':' . '00';
            }
        }


        $mon=Per_week_schedule::where('month','=',date('n'))->where('week','=','一')->whereIn('staff_id',$ss)->get();

        $tue=Per_week_schedule::where('month','=',date('n'))->where('week','=','二')->whereIn('staff_id',$ss)->get();

        $wed=Per_week_schedule::where('month','=',date('n'))->where('week','=','三')->whereIn('staff_id',$ss)->get();

        $tur=Per_week_schedule::where('month','=',date('n'))->where('week','=','四')->whereIn('staff_id',$ss)->get();

        $fri=Per_week_schedule::where('month','=',date('n'))->where('week','=','五')->whereIn('staff_id',$ss)->get();

        $sat=Per_week_schedule::where('month','=',date('n'))->where('week','=','六')->whereIn('staff_id',$ss)->get();

        $sun=Per_week_schedule::where('month','=',date('n'))->where('week','=','日')->whereIn('staff_id',$ss)->get();

        return view('seller.products.exams.create', compact('product','name','pid','category','mon','tue','wed','tur','fri','sat','sun','one','two','three'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request,$id)
    {

        $category_id=Product::where('id','=',$id)->value('category_id');

        $category=Category::where('id','=',$category_id)->value('name');

        $staff=Staff::where('job','=',$category)->get();

        foreach ($staff as $s)
            $ss=$s->id;

        if($s->job=='名牌服飾')
        {
            Exam::create(['product_id'=>$id, 'staff_id'=>$ss,'start'=>$_POST['time1'],'end'=>date("H:i:s",strtotime($_POST['time1']."+15min")),
                'date'=>$_POST['date'],'url'=>'https://meet.google.com/qvh-hqum-dvc']);
        }

        elseif($s->job=='書籍')
        {
            Exam::create(['product_id'=>$id, 'staff_id'=>$ss,'start'=>$_POST['time1'],'end'=>date("H:i:s",strtotime($_POST['time1']."+15min")),
                'date'=>$_POST['date'],'url'=>'https://meet.google.com/hof-hvzr-ykt']);
        }

        elseif($s->job=='鋼筆')
        {
            Exam::create(['product_id'=>$id, 'staff_id'=>$ss,'start'=>$_POST['time1'],'end'=>date("H:i:s",strtotime($_POST['time1']."+15min")),
                'date'=>$_POST['date'],'url'=>'https://meet.google.com/kbn-dqif-mku']);
        }
        elseif($s->job=='專輯')
        {
            Exam::create(['product_id'=>$id, 'staff_id'=>$ss,'start'=>$_POST['time1'],'end'=>date("H:i:s",strtotime($_POST['time1']."+15min")),
                'date'=>$_POST['date'],'url'=>'https://meet.google.com/zmy-tzzm-bxs']);
        }

        return redirect()->route('products.exams.index');
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
