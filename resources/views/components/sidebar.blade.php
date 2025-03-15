<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.students') ? 'active' : '' }}" href="{{ route('admin.students') }}">
                    Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.subjects') ? 'active' : '' }}" href="{{ route('admin.subjects') }}">
                    Subjects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.enrollment') ? 'active' : '' }}" href="{{ route('admin.enrollment') }}">
                    Enrollment
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.grades') ? 'active' : '' }}" href="{{ route('admin.grades') }}">
                    Grades
                </a>
            </li>
        </ul>
    </div>
</nav>
