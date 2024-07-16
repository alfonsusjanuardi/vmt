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
                        <h1>Detail Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.testingvmt') }}">Evaluation</a></li>
                            <li class="breadcrumb-item active"><a
                                    href="{{ url('instructor/testingvmt/viewDetailReport', $detailUser->username) }}">Report
                                    List</a></li>
                            <li class="breadcrumb-item active">View Detail Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="height: 85vh; overflow: hidden;">
                    <div class="col-6" style="height: 100%; overflow-y: auto;">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Trainee</label>
                                    <input class="form-control" type="text" value="{{ $detailUser->name }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Project</label>
                                    <input class="form-control" type="text" value="{{ $detailUser->exercise }}" disabled>
                                </div>
                                {{-- <div class="form-group">
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
                                </div>   --}}
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
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('instructor/testingvmt/viewDetailReport', $detailUser->username) }}"
                                    class="btn btn-primary mr-3">
                                    Back
                                </a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-6" style="height: 100%; overflow-y: hidden;">
                        <div class="card">
                            <div class="card-body">
                                <form action="#" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($viewTestingVMT as $view)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $view->action }}</td>
                                                    <td>{{ $view->time }}</td>
                                                    <td>{{ $view->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
