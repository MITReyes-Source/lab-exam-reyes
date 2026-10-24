<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentApiController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Student::with('course')->orderBy('id')->get()
        );
    }
}
