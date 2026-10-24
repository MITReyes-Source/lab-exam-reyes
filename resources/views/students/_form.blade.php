@csrf
<label for="name">Student name</label>
<input id="name" name="name" value="{{ old('name', $student->name ?? '') }}" required maxlength="255">
@error('name')<p class="error">{{ $message }}</p>@enderror

<label for="email">Email</label>
<input id="email" type="email" name="email" value="{{ old('email', $student->email ?? '') }}" required>
@error('email')<p class="error">{{ $message }}</p>@enderror

<label for="course_id">Course</label>
<select id="course_id" name="course_id" required>
    <option value="">-- Select course --</option>
    @foreach($courses as $course)
        <option value="{{ $course->id }}" @selected((string) old('course_id', $student->course_id ?? '') === (string) $course->id)>{{ $course->name }}</option>
    @endforeach
</select>
@error('course_id')<p class="error">{{ $message }}</p>@enderror
<p><button type="submit">Save Student</button> <a class="btn" href="{{ route('students.index') }}">Cancel</a></p>
