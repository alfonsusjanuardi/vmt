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
                        @foreach ($viewjoin as $item)
                        <h1>Lobby Room {{$item->name}}</h1>
                        @endforeach
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
                                        @foreach($join_user as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->username }}</td>
                                                @if ($item->id_exercise && $item->id_report == optional(\App\testingvmt::where('id_report', $item->id_report)->first())->id_report)
                                                <td>
                                                    <div class="btn btn-success">In Game</div>
                                                </td>
                                                @elseif($item->id_exercise != null && $item->id_report != optional(\App\testingvmt::where('id_report', $item->id_report)->first())->id_report)
                                                <td>
                                                    <div class="btn btn-warning">Assigned</div>
                                                </td>
                                                @else()
                                                <td>
                                                    <div class="btn btn-primary">On Lobby</div>
                                                </td>
                                                @endif
                                                {{-- <td>
                                                    <div class="btn btn-success">Online</div>
                                                </td> --}}
                                                @if ($item->id_user == 1 && $item->id_exercise && $item->id_report == optional(\App\testingvmt::where('id_report', $item->id_report)->first())->id_report)
                                                <td>
                                                    <a href="{{ url('instructor/lobby/status', $item->id_report) }}"
                                                        class="btn btn-sm btn-warning">
                                                        View
                                                    </a>
                                                </td>
                                                @else()
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