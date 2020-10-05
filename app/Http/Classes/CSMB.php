<?php

namespace App\Http\Classes;
use App\Http\Classes\SBoard;

class CSMB implements SBoard {


    function CalculateIfStudentHasPassed($student)
    {  
        $status = 0;

        if(count($student[0]->grades) > 2){

            foreach($student[0]->grades as $grade){

                if($grade->grade > 8)
                    $status = 1;

            }

            if($status == 1){
                return $data['status'] = 'PASS';
            }
            else
                return $data['status'] = 'FAIL';

        }
        else {
            return $data['status'] = 'Not enough grades for calculate result';
        }
       
    }
    
}