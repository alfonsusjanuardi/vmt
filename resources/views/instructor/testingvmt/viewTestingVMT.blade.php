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
                            <div class="card-header">
                                <h3 class="card-title">View Penilaian <strong>{{ $detailUser->username }}</strong></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="#" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @foreach($viewTestingVMT as $view)
                                        <div class="form-group">
                                            <label>Exercise</label>   
                                            <input class="form-control" type="text" name="action" id="action" placeholder="Input Exercise" value="{{ $view->project_name }}" disabled> 
                                        </div>                                   
                                        <div class="form-group">
                                            <label for="action">Action Name</label>
                                            <input class="form-control" type="text" name="action" id="action" placeholder="Input Project Name" value="{{ $view->action }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Scenario</label>
                                            <input class="form-control" type="text" name="scenario" id="scenario" value="{{ $view->scenario }}" disabled>
                                        </div>                              
                                        <hr>
                                    @endforeach
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