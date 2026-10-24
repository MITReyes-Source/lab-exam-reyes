@extends('layouts.app')
@section('title', 'Students')
@section('content')
<h1>Students</h1>
<p><a class="btn" href="{{ route('students.create') }}">Add Student</a></p>
@if($students->isEmpty())
    <p>No students found. Add your first student.</p>
@else
<table>
    <thead><tr><th>Name</th><th>Email</th><th>Course</th><th>Created by</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td><td>{{ $student->email }}</td>
            <td>{{ $student->course->name }}</td><td>{{ $student->user_id }}</td>
            <td class="actions">
                <a href="{{ route('students.show', $student) }}">View</a>
                @can('update', $student)<a href="{{ route('students.edit', $student) }}">Edit</a>@endcan
                @can('delete', $student)
                    <form class="inline" method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Delete this student?')">
                        @csrf @method('DELETE')<button type="submit">Delete</button>
                    </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
@endsection
