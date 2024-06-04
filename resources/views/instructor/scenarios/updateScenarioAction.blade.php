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
                        <h1>Scenario Action</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.scenario_action') }}">Scenario Action</a></li>
                            <li class="breadcrumb-item active">Update Scenario Action</li>
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
                                <h3 class="card-title">Update Scenario Action</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach($editScenarioAction as $edit)
                                <form action="{{ route('scenario_action.updateScenarioAction') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $edit->id }}">
                                    <div class="form-group">
                                        <label for="actions_name">Actions Name</label>
                                        <input class="form-control" type="text" name="actions_name" id="actions_name" placeholder="Input Actions Name" value="{{ $edit->actions_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="scenario_name">Scenario Name</label>
                                        <select class="select2" name="id_scenario" id="id_scenario" style="width: 100%">
                                            <option value="" disabled>-- Select scenario --</option>
                                            @foreach($scenario as $nb)
                                                <option value="{{ $edit->id_scenario }}" data-nama="{{ $nb->scenario_name }}">{{ $nb->scenario_name }}</option>
                                            @endforeach
                                        </select>
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