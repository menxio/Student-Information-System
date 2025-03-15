<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct(User $user)
    {
        $user->isAdmin();
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    public function students()
    {
        $students = User::where('role', 'Student')->get();
        return view('admin.students', compact('students'));
    }
    public function subjects()
    {
        return view('admin.subjects');
    }
    public function enrollment()
    {
        return view('admin.enrollment');
    }
    public function grades()
    {
        return view('admin.grades');
    }
}

