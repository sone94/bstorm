<?php

namespace App\Http\Classes;
use App\Http\Classes\SBoard;

class CSM implements SBoard {


    function CalculateIfStudentHasPassed($student)
    {  
        $sum = 0;
        $number_of_grade = 0;
        $data = array();
        $average = 0;
        //dd($grades);
 
        if(count($student[0]->grades)){
       foreach($student[0]->grades as $grade){

            $sum+=$grade->grade;

            $number_of_grade++;
       }

       $average =  $sum / $number_of_grade;

       $data['avg'] = $average;

        }
  
       if($average >= 7){

            $data['status'] = 'PASS';

        }
        else{
            $data['status'] = 'FAIL';
        }

        if(count($student[0]->grades) == 0)
            $data['status'] = 'Student does not have any grades';

        return $data;
    }

    
}