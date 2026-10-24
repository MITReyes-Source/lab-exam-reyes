@extends('layouts.app')
@section('title', 'Student Details')
@section('content')
<h1>Student Details</h1>
<dl>
    <dt>Name</dt><dd>{{ $student->name }}</dd>
    <dt>Email</dt><dd>{{ $student->email }}</dd>
    <dt>Course</dt><dd>{{ $student->course->name }}</dd>
    <dt>Created by user ID</dt><dd>{{ $student->user_id }}</dd>
</dl>
<p><a class="btn" href="{{ route('students.index') }}">Back to students</a>
@can('update', $student)<a class="btn" href="{{ route('students.edit', $student) }}">Edit</a>@endcan</p>
@endsection
