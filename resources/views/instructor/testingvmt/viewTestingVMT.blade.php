@extends('instructor.master')

@section('content')
    @include('instructor.header')

    @include('instructor.sidebar', ['userId' => $userID])
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Penilaian</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.testingvmt') }}">Penilaian</a></li>
                            <li class="breadcrumb-item active">View Penilaian</li>
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
                                <form action="#" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Trainee</label>
                                        <input class="form-control" type="text" value="{{ $detailUser->username }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Project</label>
                                        <input class="form-control" type="text" value="{{ $detailUser->exercise }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Scenario</label>
                                        <input class="form-control" type="text" name="scenario" id="scenario" value="{{ $detailUser->scenario }}" disabled>
                                    </div>  
                                    <div class="form-group">
                                        <label>Simulation Mode</label>
                                        <input class="form-control" type="text" value="{{ $detailUser->exercisemode }}" disabled>
                                    </div>  
                                    <div class="form-group">
                                        <label>Training Mode</label>
                                        <input class="form-control" type="text" value="{{ $detailUser->trainingmode }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Advancement</label>
                                        <input class="form-control" type="text" value="{{ $detailUser->progress }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input class="form-control" type="text" value="{{ $detailUser->duration }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Date / Time</label>
                                        <input class="form-control" type="text" value="{{ $detailUser->date }}" disabled>
                                    </div>
                                    <hr>
                                    
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($viewTestingVMT as $view)
                                            <tr>
                                                <td>{{ $view->action }}</td> 
                                                <td>{{ $view->time }}</td>     
                                                <td>Done</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                                <!-- Pagination Links -->
                                <div class="d-flex justify-content-center">
                                    {{ $viewTestingVMT->links('pagination::bootstrap-4') }}
                                </div>
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