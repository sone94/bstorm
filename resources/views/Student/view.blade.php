@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Board</th>
            <th scope="col">Grades</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
            <th scope="row">{{$student->id}}</th>
            <td>{{$student->name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->boards()->first()->board_name}}</td>
            <td>
                @foreach($student->grades as $grade)
                    {{$grade->grade.","}}
                @endforeach    
            <td>
            <td>
                <a href="{{ route('student.show', ['id' => $student->id]) }}"><button type="button" class="btn btn-info">View</button></a>
                <a href="{{ route('student.grade.add', ['id' => $student->id]) }}"><button type="button" class="btn btn-success">Add Grade</button></a>
            </td>
            </tr>
           
            @endforeach
            <tr>
                <td><a href="{{route('student.create')}}"<button type="button" class="btn btn-success">Add New Student</button></td>
            </tr>
        </tbody>
    </table>
@stop