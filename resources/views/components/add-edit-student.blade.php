<div class="modal fade @if(isset($studentToEdit)) show @endif" 
     id="addEditStudentModal" 
     tabindex="-1" 
     aria-labelledby="addEditStudentLabel" 
     aria-hidden="{{ isset($studentToEdit) ? 'false' : 'true' }}"
     @if(isset($studentToEdit)) style="display: block; opacity: 1;" @endif>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEditStudentLabel">
                    {{ isset($studentToEdit) ? 'Edit Student' : 'Add Student' }}
                </h5>
                <a href="{{ route('admin.students') }}" class="btn-close"></a>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ isset($studentToEdit) ? route('admin.students.update', $studentToEdit->user->id) : route('admin.students.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" 
                               value="{{ old('first_name', $studentToEdit->first_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" 
                               value="{{ old('middle_name', $studentToEdit->middle_name ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" 
                               value="{{ old('last_name', $studentToEdit->last_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email', $studentToEdit->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" 
                               {{ isset($studentToEdit) ? '' : 'required' }}>
                        @if(isset($studentToEdit))
                            <small class="text-muted">Leave blank to keep the current password</small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ isset($studentToEdit) ? 'Update Student' : 'Add Student' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
