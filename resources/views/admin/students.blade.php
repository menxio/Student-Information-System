@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <x-sidebar />

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Students</h1>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEditStudentModal">
                    Add Student
                </button>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->user->last_name }}</td>
                            <td>{{ $student->user->first_name }}</td>
                            <td>{{ $student->user->middle_name }}</td>
                            <td>{{ $student->user->email }}</td>
                            <td>
                                <button class="btn btn-primary edit-student-btn"
                                        data-id="{{ $student->id }}"
                                        data-first_name="{{ $student->user->first_name }}"
                                        data-middle_name="{{ $student->user->middle_name }}"
                                        data-last_name="{{ $student->user->last_name }}"
                                        data-email="{{ $student->user->email }}">
                                    Edit
                                </button>                                                                                                                                                       
                                <form action="{{ route('admin.students.delete', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Include the Add/Edit Student Modal -->
            <x-add-edit-student />
        </main>
    </div>
</div>

@endsection
