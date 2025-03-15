<!-- Sidebar -->
<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.students') }}">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.subjects') }}">Subjects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.enrollment') }}">Enrollment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.grades') }}">Grades</a>
            </li>
        </ul>
    </div>
</nav>