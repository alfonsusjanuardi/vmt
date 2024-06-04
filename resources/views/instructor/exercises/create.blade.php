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
                            <li class="breadcrumb-item active">Create</li>
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
                                <h3 class="card-title">Add Exercise</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('exercises.storeExercise') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="project_name">Project Name</label>
                                        <input class="form-control" type="text" name="project_name" id="project_name" placeholder="Input Project Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Description</label>
                                        <input class="form-control" type="text" name="deskripsi" id="deskripsi" placeholder="Input Description">
                                    </div>
                                    <div class="form-group">
                                        <label for="sejarah_pemakaian">Usage History</label>
                                        <input class="form-control" type="text" name="sejarah_pemakaian" id="sejarah_pemakaian" placeholder="Input Usage History">
                                    </div>
                                    <div class="form-group">
                                        <label for="sejarah_produksi">Usage Production</label>
                                        <input class="form-control" type="text" name="sejarah_produksi" id="sejarah_produksi" placeholder="Input Usage Production">
                                    </div>
                                    <div class="form-group">
                                        <label for="spesifikasi">Spesification</label>
                                        <input class="form-control" type="text" name="spesifikasi" id="spesifikasi" placeholder="Input Spesification">
                                    </div>
                                    <div class="form-group">
                                        <label for="kinerja">Performance</label>
                                        <input class="form-control" type="text" name="kinerja" id="kinerja" placeholder="Input Performance">
                                    </div>
                                    <div class="form-group">
                                        <label for="persenjataan">Weaponry</label>
                                        <input class="form-control" type="text" name="persenjataan" id="persenjataan" placeholder="Input Weaponry">
                                    </div>
                                    
                                    <div class="form-group float-right">
                                        <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
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