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
                        <h1>Exercises</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instructor.scenarios') }}">Scenarios</a></li>
                            <li class="breadcrumb-item active">View Exercise</li>
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
                                <h3 class="card-title">View Exercise</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach($viewExercise as $view)
                                <form action="{{ route('exercises.updateExercise') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_exercise" value="{{ $view->id_exercise }}">
                                    <div class="form-group">
                                        <label for="project_name">Project Name</label>
                                        <input class="form-control" type="text" name="project_name" id="project_name" placeholder="Input Project Name" value="{{ $view->project_name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10">{{ $view->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="my-3" style="display: flex;">
                                            <div class="col-md-9">
                                                <a href="#modalPartName" class="open-modal btn btn-sm btn-primary px-3 rounded-2 me-2" id="partName" role="button" data-bs-toggle="modal" onclick="">Part Name</a>
                                            </div>
                                        </div>
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
        <div class="modal modal-lg fade" id="modalPartName" aria-hidden="true" aria-labelledby="modalPartNameLabel" tabindex="-1" style="left: 0; right: 0; top: 0; bottom: 0; margin: auto; position: absolute;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalRincianLabel">Part Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mt-2 fw-bold">
                            <div class="col-md-12">
                                <div class="tableContainer">
                                    <table id="example1" class="table table-striped table-hover">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th>Part Name</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyKomitment" style="max-height: 200px; overflow-y:auto">
                                            @foreach($listScenarioAction as $list)
                                                <tr>
                                                    <td>
                                                        <a href="scenario_action/viewScenarioAction/{{ $list->id }}" class="form-control">{{ $list->actions_name }}</a>
                                                    </td>
                                                    <td>
                                                        <select class="select2" id="type" style="width: 100%" aria-readonly="">
                                                            <option value="" disabled> Pilih tipe</option>
                                                            @if ($list->type == "Picture" || $list->type == "picture")
                                                                <option value="{{ $list->type }}" selected>{{ $list->type }}</option>
                                                                <option>Video</option>
                                                                <option>Youtube</option>
                                                            @elseif ($list->type == "Video" || $list->type == "video")
                                                                <option>Picture</option>
                                                                <option value="{{ $list->type }}" selected>{{ $list->type }}</option>
                                                                <option>Youtube</option>
                                                            @elseif ($list->type == "Youtube" || $list->type == "youtube")
                                                                <option>Picture</option>
                                                                <option>Video</option>
                                                                <option value="{{ $list->type }}" selected>{{ $list->type }}</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection