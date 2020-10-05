<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    public function students()
    {
        return $this->belongsToMany('App\Models\Student', 'grade_student' ,'grade_id', 'student_id');
    }
}
