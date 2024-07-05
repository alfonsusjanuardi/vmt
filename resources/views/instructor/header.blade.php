<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('instructor.dashboard') }}" class="nav-link">Home</a>
    </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block mr-2">
        {{-- @if ($userID == 0)
            <a href="#" class="d-block">Instructor</a>
        @elseif($userID == 1)
            <a href="#" class="d-block">Trainee</a>
        @elseif($userID == 2)
            <a href="#" class="d-block">Admin</a>
        @endif --}}
            <a href="#" class="nav-link">Hi, {{ $name }}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="btn btn-danger" href="{{ route('instructor.logout') }}" class="nav-link">Logout</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->