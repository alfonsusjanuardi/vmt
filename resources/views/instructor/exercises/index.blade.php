@extends('instructor.master')

@section('content')
    @include('instructor.header')

    @include('instructor.sidebar')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exercises</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Exercises</li>
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
                                <h3 class="card-title">Exercise Table</h3>
                                <a class="btn btn-primary float-right mt-2" href="{{route('exercises.create')}}" role="button">Add Exercise</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('flash-message')
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exercise as $item)
                                            <tr>
                                                <td>{{ $item->project_name }}</td>
                                                <td>
                                                    <a href="exercises/viewExercise/{{ $item->id_exercise }}" class="btn btn-info btn-lg">
                                                        View
                                                    </a>
                                                    <a href="exercises/updateExercise/{{ $item->id_exercise }}" class="btn btn-info btn-lg">
                                                        Update 
                                                    </a>
                                                    <a href="exercises/deleteExercise/{{ $item->id_exercise }}" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure?')">
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