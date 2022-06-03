<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Overview</a></li>
        <li class="{{ Request::is('university') ? 'active' : '' }}"><a href="{{ route("university.index") }}">Universities</a>
        </li>
        <li class="{{ Request::is('faculty') ? 'active' : '' }}"><a href="{{ route("faculty.index") }}">Faculties</a>
        </li>
        <li class="{{ Request::is('branch') ? 'active' : '' }}"><a href="{{ route("branch.index") }}">Branches</a></li>
        <li class="{{ Request::is('student') ? 'active' : '' }}"><a href="{{ route("student.index") }}">Students</a></li>
    </ul>
</div>