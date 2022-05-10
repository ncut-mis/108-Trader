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
        $product = Exam::orderBy('id', 'ASC')->get();

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

        $pid = Product::where('id','=', $id)->value('id');

        $name=Product::where('id','=',$id)->value('name');

        $category_id=Product::where('id','=',$id)->value('category_id');

        $category=Category::where('id','=',$category_id)->value('name');

        $staff=Staff::where('job','=',$category)->get();

        $exam=Exam::where('date','=',date('Y-m-d'))->get();

        $work=Per_week_schedule::where('week','=',date('w'))->where('month','=',date('n'))->get();

        return view('seller.products.exams.create', compact('product','name','pid','category','work','exam','staff'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request,$id)
    {
        $staff=\App\Models\Per_week_schedule::orderby('id','ASC')->value('staff_id');

        $url=\App\Models\Staff::where('id','=',$staff)->value('url');

        Exam::create(['product_id'=>$id,'seller_id'=>auth()->user()->id,
            'staff_id'=>$_POST['name'],'start'=>$_POST['time'],'end'=>date("H:i:s",strtotime($_POST['time']."+15min")),
            'date'=>date('Y-m-d'),'url'=>$url]);

        return redirect()->route('products.exams.index');
    }

    public function undone()
    {
        $product=DB::table('exams')->where('date','>',date('Y-m-d'))
            ->orWhere(function($query) {
                $query->where('date','=',date('Y-m-d'))
                    ->where('start','>',date('H-i-s-30minutes'));
            }) ->get();

        $name=Product::orderBy('id', 'ASC')->get();

        $category=Category::orderBy('id', 'ASC')->get();

        return view('seller.products.exams.undone', compact('product','name','category'));
    }

    public function finish()
    {
        $product=DB::table('exams')->where('date','<',date('Y-m-d'))
            ->orWhere(function($query) {
                $query->where('date','=',date('Y-m-d'))
                    ->where('start','<',date('H-i-s'));
            }) ->get();

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
