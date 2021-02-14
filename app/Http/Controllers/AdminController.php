<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\Exam_category;

class AdminController extends Controller
{
    function addsubject(Request $req){
        $status = DB::insert('INSERT INTO `subject`(`id`, `title`, `categories`, `created_at`) 
            values ( ?, ?, ?, ?)', [null, $req->title, $req->categories,  Carbon::now()->toDateTimeString()]);
        if($status == 1)
            return redirect('/subject');
        else
            return redirect('/subject');
    }

    function addcategory(Request $req){
        $status = DB::insert('INSERT INTO `exam_category`(`id`, `title`, `created_at`) 
            values ( ?, ?, ?)', [null, $req->title, Carbon::now()->toDateTimeString()]);
        if($status == 1)
            return redirect('/subject');
        else
            return redirect('/subject');
    }
    
}
