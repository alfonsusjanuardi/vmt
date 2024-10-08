@extends('instructor.master')

@section('content')
    @include('instructor.header')

    @include('instructor.sidebar', ['userId' => $userID, 'name' => $name, 'username' => $username])
    {{-- <meta http-equiv="refresh" content="30"> --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lobby</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Lobby</li>
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
                                <h3 class="card-title">Online User List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('flash-message')
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($join_user as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>
                                                    <div class="btn btn-primary">On Lobby</div>
                                                </td>
                                                {{-- <td>
                                                    <div class="btn btn-success">Online</div>
                                                </td> --}}
                                                @php
                                                    $roomCount = $item->where('room_id', $item->room_id)->count();
                                                @endphp
                                                @if ($item->id_user == 0 && $roomCount > 1)
                                                    <td>
                                                        <a href="{{ url('instructor/lobby/room/status', $item->room_id) }}"
                                                            class="btn btn-sm btn-warning">
                                                            View
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="hidden">
                                                    </td>
                                                @endif

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
