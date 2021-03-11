<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exam';

    protected $fillable = [
        'title',
        'desc',
        'category',
        'subjects',
        'total_questions',
        'pos_mark',
        'neg_mark',
        'passing_mark',
        'total_mark',
        'total_attempt',
        'price',
        'status',
    ];
}
