<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Product;

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

        $pid=Exam::orderBy('product_id', 'ASC')->value('product_id');

        $name=Product::where('id','=',$pid)->value('name');

        $category_id=Product::where('id','=',$pid)->value('category_id');

        $category=Category::where('id','=',$category_id)->value('name');

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

        return view('seller.products.exams.create', compact('product','name','pid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        //
    }

    public function undone()
    {
        $product = Exam::where('date','>',strtotime(date('Y-m-d')))->get();

        $pid=Exam::orderBy('product_id', 'ASC')->value('product_id');

        $name=Product::where('id','=',$pid)->value('name');

        $category_id=Product::where('id','=',$pid)->value('category_id');

        $category=Category::where('id','=',$category_id)->value('name');

        return view('seller.products.exams.undone', compact('product','name','category'));
    }

    public function finish()
    {
        $product = Exam::where('date','<',strtotime(date('Y-m-d')))->get();

        $pid=Exam::orderBy('product_id', 'ASC')->value('product_id');

        $name=Product::where('id','=',$pid)->value('name');

        $category_id=Product::where('id','=',$pid)->value('category_id');

        $category=Category::where('id','=',$category_id)->value('name');

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
