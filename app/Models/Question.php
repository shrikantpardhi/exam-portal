<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'examid',
        'title',
        'description',
        'image',
        'op1',
        'op2',
        'op3',
        'op4',
        'answer',
        'ans_description',
        'ans_image',
        'subject',
        'categories',
        'level',
    ];


}
