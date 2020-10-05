<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBoard extends Model
{
    use HasFactory;

    protected $table = "school_board";
    protected $fillable = ['board_name'];

    public function students(){

        return $this->hasMany('App\Model\Student');

    }
}
