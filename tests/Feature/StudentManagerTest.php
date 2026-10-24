<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentManagerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_student_list(): void
    {
        $this->get('/students')->assertRedirect('/login');
    }

    public function test_authenticated_user_can_create_student_owned_by_them(): void
    {
        $user = User::factory()->create();
        $course = Course::create(['name' => 'BS Information Technology']);

        $this->actingAs($user)->post('/students', [
            'name' => 'Sample Student',
            'email' => 'sample@example.com',
            'course_id' => $course->id,
        ])->assertRedirect('/students');

        $this->assertDatabaseHas('students', [
            'email' => 'sample@example.com',
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);
    }

    public function test_user_cannot_edit_another_users_student(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $course = Course::create(['name' => 'BS Information Technology']);
        $student = Student::create([
            'name' => 'Owned Student',
            'email' => 'owned@example.com',
            'course_id' => $course->id,
            'user_id' => $owner->id,
        ]);

        $this->actingAs($other)->get('/students/'.$student->id.'/edit')->assertForbidden();
    }
}
