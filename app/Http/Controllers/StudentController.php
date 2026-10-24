<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::with('course')->latest()->get();

        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        $courses = Course::orderBy('name')->get();

        return view('students.create', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        $validated['user_id'] = Auth::id();
        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student): View
    {
        $student->load('course', 'user');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $this->authorize('update', $student);
        $courses = Course::orderBy('name')->get();

        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $this->authorize('update', $student);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $this->authorize('delete', $student);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
