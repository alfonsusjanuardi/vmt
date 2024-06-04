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
                            <li class="breadcrumb-item"><a href="{{ route('instructor.exercises') }}">Exercises</a></li>
                            <li class="breadcrumb-item active">Update Exercise</li>
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
                                <h3 class="card-title">Update Exercise</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach($editExercise as $edit)
                                <form action="{{ route('exercises.updateExercise') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_exercise" value="{{ $edit->id_exercise }}">
                                    <div class="form-group">
                                        <label for="project_name">Project Name</label>
                                        <input class="form-control" type="text" name="project_name" id="project_name" placeholder="Input Project Name" value="{{ $edit->project_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10">{{ $edit->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group float-right">
                                        <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                                @endforeach
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