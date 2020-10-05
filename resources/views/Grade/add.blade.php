@extends('layouts.master')

@section('content')
<h2>Add grade to student {{$grades->student}}</h2>
<div class="container">
	        <div class="row">
                <form method="post" action="{{ route('student.grade.store') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif
                    

                    <div class="form-group">
                        <label for="ddlGrades">Board Type</label>
                        <select class="form-control" name="ddlGrades">
                            @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->grade}}</option>
                            @endforeach
                        </select>
                    </div>
                <input type="hidden" name="student_id" value="{{$grades->student_id}}"/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>    
        </div>
	</div>
</div>
@stop