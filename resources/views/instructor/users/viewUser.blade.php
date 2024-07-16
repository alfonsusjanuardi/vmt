@extends('instructor.master')

@section('content')
    @include('instructor.header')

    @include('instructor.sidebar', ['userId' => $userID, 'name' => $name, 'username' => $username])
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">View User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @foreach ($viewUser as $view)
                                <div class="card-header">
                                    @if ($view->id_user == 2)
                                        <h3 class="card-title">Hello, <strong>{{ $view->username }}!</strong></h3>
                                    @else
                                        <h3 class="card-title">Detail data <strong>{{ $view->username }}</strong></h3>
                                    @endif
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="#" method="GET">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                placeholder="Input Name" value="{{ $view->name }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            @if ($view->id_user == 0)
                                                <input class="form-control" type="text" name="role" id="role"
                                                    placeholder="Input Role" value="Instructor" disabled>
                                            @elseif($view->id_user == 1)
                                                <input class="form-control" type="text" name="role" id="role"
                                                    placeholder="Input Role" value="Trainee" disabled>
                                            @else
                                                <input class="form-control" type="text" name="role" id="role"
                                                    placeholder="Input Role" value="Admin" disabled>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="password" id="password"
                                                placeholder="Input Password" value="{{ $view->password }}" disabled>
                                            <input type="checkbox" id="togglePassword" onclick="togglePasswordVisibility()">
                                            Show Password
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            @endforeach
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-12">
                        <a href="{{ route('user.index') }}" class="btn btn-primary mr-3">
                            Back
                        </a>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
@endsection
