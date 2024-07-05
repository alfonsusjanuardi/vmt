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
                        <h1>Report List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.testingvmt') }}">Evaluation</a></li>
                            <li class="breadcrumb-item active">View Report List</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trainee</th>
                                            <th>Instructor</th>
                                            <th>Scenario</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Advancement</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($viewDetailReport as $view)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $view->student_name }}</td> 
                                            <td>{{ $view->instructor_name }}</td>    
                                            <td>{{ $view->scenario }}</td> 
                                            @php
                                                $timestamp = strtotime($view->date);
                                                $tanggal = date('Y-m-d', $timestamp);
                                                $waktu = date('H:i:s', $timestamp);
                                            @endphp
                                            <td>{{ $tanggal }}</td>
                                            <td>{{ $waktu }}</td> 
                                            <td>{{ $view->status }}</td>
                                            <td>{{ $view->progress }}</td>
                                            <td>
                                                @if($view->status == 'finished')
                                                    <a href="{{ url('instructor/testingvmt/viewTestingVMT', $view->id_action) }}" class="btn btn-warning">
                                                        View
                                                    </a>
                                                @endif
                                                <a href="{{ url('instructor/testingvmt/deleteDetailReport', $view->id_action) }}"
                                                    class="btn btn-danger"
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
        </section>
        <!-- /.content -->
    </div>
@endsection