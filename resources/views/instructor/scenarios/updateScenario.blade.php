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
                        <h1>Scenarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.scenarios') }}">Scenarios</a></li>
                            <li class="breadcrumb-item active">Update Scenario</li>
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
                                <h3 class="card-title">Update Scenario</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach($editScenario as $edit)
                                <form action="{{ route('scenarios.updateScenario') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_scenario" value="{{ $edit->id_scenario }}">
                                    <div class="form-group">
                                        <label for="scenario_name">Scenario Name</label>
                                        <input class="form-control" type="text" name="scenario_name" id="scenario_name" placeholder="Input Scenario Name" value="{{ $edit->scenario_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name">Project Name</label>
                                        <select class="select2" name="id_exercise" id="id_exercise" style="width: 100%">
                                            <option value="" disabled>-- Select project --</option>
                                            @foreach($exercise as $nb)
                                                <option value="{{ $edit->id_exercise }}" data-nama="{{ $nb->project_name }}">{{ $nb->project_name }}</option>
                                            @endforeach
                                        </select>
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