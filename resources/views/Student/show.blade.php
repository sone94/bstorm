@extends('layouts.master')

@section('content')

<div class="container">
	        <div class="row">
            <h1>{{$student}}</h1>
            <h2>{{$student->avg}}</h2>
            </div>    
        </div>
	</div>
</div>
@stop