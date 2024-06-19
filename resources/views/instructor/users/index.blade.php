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
                            <li class="breadcrumb-item active">Users</li>
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
                            <div class="card-header">
                                <h3 class="card-title">User List</h3>
                                <a class="btn btn-primary float-right mt-2" href="{{ route('user.create') }}"
                                    role="button">Add User</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('flash-message')
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>
                                                    @if ($item->userId == 0)
                                                        <a href="#" class="d-block">Instructor</a>
                                                    @elseif($item->userId == 1)
                                                        <a href="#" class="d-block">Trainer</a>
                                                    @elseif($item->userId == 2)
                                                        <a href="#" class="d-block">Admin</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="users/viewUser/{{ $item->username }}"
                                                        class="btn btn-warning btn-lg">
                                                        View
                                                    </a>
                                                    <a href="users/updateUser/{{ $item->username }}"
                                                        class="btn btn-info btn-lg">
                                                        Update
                                                    </a>
                                                    <a href="users/deleteUser/{{ $item->username }}"
                                                        class="btn btn-danger btn-lg"
                                                        onclick="return confirm('Are you sure?')">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
