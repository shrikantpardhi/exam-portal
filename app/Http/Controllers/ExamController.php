<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Exam_category;
use App\Models\Exam;

class ExamController extends Controller
{
    function index(){
        $categories = Exam_category::all();
        $subject = Subject::all();
        $exams = Exam::all();
        return view("admin.viewexams",['subjects'=>$subject, 'categories'=>$categories, 'exams'=>$exams]);

    }

    function addE(Request $request){
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'subject' => 'required',
            'categories' => 'required',
            'total_que' => 'required',
            'total_attempt' => 'required',
            'neg_mark' => 'required',
            'pos_mark' => 'required',
            'passing_mark' => 'required',
            'total_mark' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $form_data = array(
            'title' => $request->title,
            'desc'=> $request->desc,
            'category'=> $request->categories,
            'subjects'=> $request->subject,
            'total_questions'=> $request->total_que,
            'pos_mark'=> $request->pos_mark,
            'neg_mark'=> $request->neg_mark,
            'passing_mark'=> $request->passing_mark,
            'total_mark'=> $request->total_mark,
            'total_attempt'=> $request->total_attempt,
            'question_list'=> "",
            'price'=> $request->price,
            'status'=> $request->status
        );
        Exam::create($form_data);

        return redirect()->back()->with('success', 'Image store in database successfully');
    }

    function getExam(Request $request, $id){
        $exam = Exam::where(['id' =>  $id])->first();
        return $exam;
    }

    function addQtoExam(Request $request){
        $exam = Exam::where(['id' =>  $request->examid])->first();
        // $questions = Question::all();
        $questions = Question::where('examid' , $request->examid)
                                ->get();
        return view('admin.exam-question', [ 'exam'=>$exam, 'questions'=>$questions ]);
        // return redirect()->route('exam-question', [ 'exam'=>$exam, 'questions'=>$questions ]);
    }


    function addQ(Request $request){

        $request->validate([
            'title'  => 'required',
            'que_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ans_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'op1'  => 'required',
            'op2'  => 'required',
            'op3'  => 'required',
            'op4'  => 'required',
            'answer'  => 'required',
            'subject'  => 'required',
            'category'  => 'required',
            'level'  => 'required',
           ]);

        $url1 = "";
        $url2 = "";

        if ($request->que_img){
            $extension1 = $request->que_img->extension();
            $request->que_img->storeAs('/images', time().".".$extension1);
            $url1 = Storage::url(time().".".$extension1);
        }
        if($request->ans_img){
            $extension2 = $request->ans_img->extension();
            $request->ans_img->storeAs('/images', time().".".$extension2);
            $url2 = Storage::url(time().".".$extension2);
        }

        $form_data = array(
            'examid' => $request->examid,
            'title'  => $request->title,
            'description'  => $request->que_desc,
            'image'  => $url1,
            'op1'  => $request->op1,
            'op2'  => $request->op2,
            'op3'  => $request->op3,
            'op4'  => $request->op4,
            'answer'  => $request->answer,
            'ans_description'  => $request->ans_desc,
            'ans_image'  => $url2,
            'subject'  => $request->subject,
            'categories' => $request->category,
            'level' => $request->level
        );

        Question::create($form_data);
        return  redirect()->back()->with('success', 'Profile updated!');
        // return view('admin.demo', [ 'test' => $form_data]);
    }
}
