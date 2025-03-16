<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(User $user)
    {
        $user->isAdmin();
    }
    public function index()
    {
        $students = Student::with('user')->get();
        $totalStudents = $students->count();
        return view('admin.dashboard', compact('totalStudents'));
    }

    // STUDENTS
    public function students(Request $request)
    {
        $students = Student::with('user')->get();
        $studentToEdit = null;
    
        if ($request->has('edit')) {
            $studentToEdit = Student::with('user')->find($request->edit);
        }
    
        return view('admin.students', compact('students', 'studentToEdit'));
    }    

    public function storeOrUpdate(Request $request, $id = null)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
        ]);

        if ($id) {
            // Update student
            $user = User::findOrFail($id);
            $user->update([
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'] ?? null,
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
            ]);
            return redirect()->route('admin.students')->with('success', 'Student updated successfully!');
        } else {
            // Create student
            $user = User::create([
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'] ?? null,
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => 'student',
            ]);
            $student = Student::create([
                'user_id' => $user->id,
            ]);
            return redirect()->route('admin.students')->with('success', 'Student added successfully!');
        }
    }

    public function deleteStudent($id)
    {
        User::destroy($id);
        return redirect()->route('admin.students')->with('success', 'Student deleted successfully!');
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

