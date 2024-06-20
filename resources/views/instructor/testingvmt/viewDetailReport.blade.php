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
                                            <th>Trainer</th>
                                            <th>Instructor</th>
                                            <th>Scenario</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($viewDetailReport as $view)
                                        <tr>
                                            <td>{{ $view->student_name }}</td> 
                                            <td>{{ $view->instructor_name }}</td>    
                                            <td>{{ $view->scenario }}</td> 
                                            <td>
                                                <a href="{{ url('instructor/testingvmt/viewTestingVMT', $view->id_action) }}" class="btn btn-warning btn-lg">
                                                    View
                                                </a>
                                                <a href="{{ url('instructor/testingvmt/deleteDetailReport', $view->id_action) }}"
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
        </section>
        <!-- /.content -->
    </div>
@endsection