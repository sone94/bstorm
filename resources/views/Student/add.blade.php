@extends('layouts.master')

@section('content')
<h2>Add a new Student</h2>
<form method="post" action="{{ route('student.store') }}">
    @csrf
    <div class="form-group">
        <label for="txtFirstName">First Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="First Name" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message  }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtFirstName">Last Name</label>
        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
        @error('last_name')
            <div class="invalid-feedback">{{ $message  }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="ddlBoard">Board Type</label>
        <select class="form-control" name="board_id">
            @foreach($borads as $board)
        <option value="{{$board->id}}">{{$board->board_name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="container">
    
</div>

@stop    