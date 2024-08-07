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
                            <li class="breadcrumb-item active">Update User</li>
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
                            @foreach($editUser as $edit)
                            <div class="card-header">
                                <h3 class="card-title">Update data <strong>{{ $edit->username }}!</strong></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('user.updateUser') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="username" value="{{ $edit->username }}">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" name="name" id="name" placeholder="Input Name" value="{{ $edit->name }}">
                                    </div>
                                    @if($edit->id_user == 0 || $edit->id_user == 1)
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="select2" name="role" id="role" style="width: 100%">
                                                <option value="" disabled>-- Select Role --</option>
                                                @if($edit->id_user == 0)
                                                    <option value="0" selected>Instructor</option>
                                                    <option value="1">Trainee</option>
                                                @else
                                                    <option value="0">Instructor</option>
                                                    <option value="1" selected>Trainee</option>
                                                @endif
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Input Password" value="{{ $edit->password }}">
                                        <input type="checkbox" id="togglePassword" onclick="togglePasswordVisibility()"> Show Password
                                    </div>
                                    <div class="form-group float-right">
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                            @endforeach
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-12">
                        <a href="{{ route('user.index') }}"
                        class="btn btn-primary mr-3">
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