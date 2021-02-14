<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Exam_category;

class QuestionController extends Controller
{
    function index(){
        $categories = Exam_category::all();
        $subject = Subject::all();
        $questions = Question::all();
        return view("admin.questions",['subjects'=>$subject, 'categories'=>$categories, 'questions'=>$questions]);
    }

    function addquestion(Request $request){

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
            'categories' => implode(', ', $request->category),
            'level' => $request->level
        );

        Question::create($form_data);

        return redirect()->back()->with('success', 'Image store in database successfully');
    }
}
