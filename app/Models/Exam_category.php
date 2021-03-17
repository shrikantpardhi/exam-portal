<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_category extends Model
{
    use HasFactory;
    protected $table = 'exam_categories';

    protected $fillable = [
        'title',
    ];

}
