<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "student";

    protected $guarded = [];

    public function grades()
    {
        return $this->belongsToMany('App\Models\Grade', 'grade_student' ,'student_id', 'grade_id');
    }

    public function boards(){
        return $this->belongsTo('App\Models\SchoolBoard', 'board_id', 'id');
    }


}
