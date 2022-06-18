<header>
    <nav>
        <ul>
            <li><a href="{{ route('main.index') }}">Home</a></li>
            <li>
                <span>All List by Department</span>
                <ul>
                    @foreach(App\Models\Department::all() as $department)
                        <li><a href="{{ route('main.allListByDepartment', ['id' => $department->d_id]) }}">{{ $department->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
                <span>Department</span>
                <ul>
                    <li><a href="{{ route('department.create') }}">Registration</a></li>
                    <li><a href="{{ route('department.list') }}">List</a></li>
                </ul>
            </li>
            <li>
                <span>Student</span>
                <ul>
                    <li><a href="{{ route('student.create') }}">Registration</a></li>
                    <li><a href="{{ route('student.list') }}">List</a></li>
                </ul>
            </li>
            <li>
                <span>Course</span>
                <ul>
                    <li><a href="{{ route('course.create') }}">Registration</a></li>
                    <li><a href="{{ route('course.list') }}">List</a></li>
                </ul>
            </li>
            <li>
                <span>Teacher</span>
                <ul>
                    <li><a href="{{ route('teacher.create') }}">Registration</a></li>
                    <li><a href="{{ route('teacher.list') }}">List</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <h1>{{ $title }}</h1>
</header>
<hr>
