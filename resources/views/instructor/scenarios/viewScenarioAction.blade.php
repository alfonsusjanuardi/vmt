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
                        <h1>Scenario Action</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.scenarios') }}">Scenarios</a></li>
                            <li class="breadcrumb-item active">View Scenario Action</li>
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
                            @foreach($viewScenarioAction as $view)
                            <div class="card-header">
                                <h3 class="card-title">View Scenario Action</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('scenario_action.updateScenarioAction') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="actions_name">Actions Name</label>
                                        <input class="form-control" type="text" name="actions_name" id="actions_name" placeholder="Input Scenario Name" value="{{ $view->actions_name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="scenario_name">Scenario Name</label>
                                        <input class="form-control" type="text" name="scenario_name" id="scenario_name" placeholder="Input Scenario Name" value="{{ $view->scenario_name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name">Project Name</label>
                                        <input class="form-control" type="text" name="project_name" id="project_name" placeholder="Input Project Name" value="{{ $view->project_name }}" disabled>
                                    </div>
                                </form>
                            </div>
                            @endforeach
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