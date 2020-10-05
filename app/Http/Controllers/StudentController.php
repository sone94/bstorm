<?php

namespace App\Http\Controllers;
use Response;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Classes\CSM;
use App\Http\Classes\CSMB;
use App\Models\SchoolBoard;
use App\Models\Grade;

class StudentController extends Controller
{
    public function index(){

        $students = Student::with('boards')->get();

        return view('Student.view')->with('students', $students);
    }

    public function show($id){

        $student = Student::where("id", $id)->with('boards','grades')->get();
        $data['status'] = $this->getStudentResult($id);

        $data['student'] = $student;

        if($student[0]->board_id == 1){
            return response()->json([
                'student' => $data
            ]);
        }
        else if($student[0]->board_id == 2){
            $data['student'] = $student->toArray();

        $result = ArrayToXml::convert($data);
        //dd($result);
        return Response::make($result, '200')->header('Content-Type', 'text/xml');
        }


    }

    public function create(){

        $boards = SchoolBoard::all();

        return view('Student.add')->with('borads', $boards);
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
         ]);


           //  Store data in database
           Student::create($request->all());

           return redirect('/')->with('success', 'You has successfully registrated student to board system.');
    }

    public function getStudentResult($id){
      
        $student = Student::where("id", $id)->with('boards','grades')->get();

        if($student[0]->board_id == 1){

           $cCSM = new CSM();
           $status= $cCSM->CalculateIfStudentHasPassed($student);
         

        }
        else if($student[0]->board_id == 2) {
            $cCSMB = new CSMB();
            $status= $cCSMB->CalculateIfStudentHasPassed($student);
        }

        return $status;
    }

    public function addGradeToStudent($id){

        $student = Student::where('id', $id)->with('grades')->get();
        $grades = Grade::all();
        $grades->student = $student[0]->name." ".$student[0]->last_name;
        $grades->student_id = $student[0]->id;
        return view('Grade.add')->with('grades', $grades);

    }

    public function storeStudentGrade(Request $request){

       $student =  Student::where("id", $request->student_id)->with('grades')->get();
        $number_of_grades = $student[0]->grades->count();

        if($number_of_grades < 4){
            $student[0]->grades()->attach($request->ddlGrades);
            return redirect('/')->with('success', 'Grade for student has been added successfully');
        }
        else {
           
            return back()->with('error','Student can not have more than 4 grades! .');

         
        }
    }

    public static function averageGrade($id){

        $student =  Student::where('id', $id)->with('grades')->get();
         
         $sum = 0;
         $number_of_grade = 0;
         //dd($student->first()->grades);
        foreach($student->first()->grades as $grade){

             $sum+=$grade->grade;
 
             $number_of_grade++;
        }

        return $sum / $number_of_grade;
     }
}
