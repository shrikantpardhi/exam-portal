<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use App\Models\Subject;
use App\Models\Exam_category;

class SubjectController extends Controller
{

    function index()
    {

        $categories = Exam_category::all();
        $subject = Subject::all();
        return view('admin.subject', ['subjects' => $subject, 'categories' => $categories]);
        // return view('admin.subject');
    }

    function addsubject(Request $req)
    {
        $req->validate(
            [
                'title' => 'required',
                'categories' => 'required',
            ],
            [
                'title.required' => 'Title is required',
                'categories.required' => 'Category is required'
            ]
        );

        $status = DB::insert('INSERT INTO `subject`(`id`, `title`, `categories`, `created_at`)
            values ( ?, ?, ?, ?)', [null, $req->title, implode(' ', $req->categories),  Carbon::now()->toDateTimeString()]);
        if ($status == 1)
            return redirect('/subject');
        else
            return redirect('/subject');
    }

    function addcategory(Request $req)
    {
        $this->validate($req, [
            'title' => 'required'
            ],
            [
                'title.required' => 'Exam Title is required'
            ]
        );

        $status = DB::insert('INSERT INTO `exam_categories`(`id`, `title`, `created_at`)
            values ( ?, ?, ?)', [null, $req->title, Carbon::now()->toDateTimeString()]);
        if ($status == 1)
            return redirect('/subject')->with('status', 'Profile updated!');
        else
            return redirect('/subject')->with('status', 'Failed!');
    }

    function deleteSubject($id)
    {
        $status = DB::delete('DELETE FROM `subject` WHERE `subject`.`id` = ?', [$id]);
        if ($status == 1)
            return redirect('/subject');
        else
            return redirect('/subject');
    }

    function deleteCategory($id)
    {
        $status = DB::delete('DELETE FROM `exam_categories` WHERE `exam_categories`.`id` = ?', [$id]);
        if ($status == 1)
            return redirect('/subject');
        else
            return redirect('/subject');
    }
}
