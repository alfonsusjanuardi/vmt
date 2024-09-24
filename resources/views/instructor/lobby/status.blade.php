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
                        <h1>Live Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('lobby.index') }}">lobby</a></li>
                            <li class="breadcrumb-item active">View Lobby status</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6" style="height: 100%; overflow-y: auto;">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Instructor</label>
                                    <input class="form-control" type="text" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Trainee</label>
                                    <input class="form-control" type="text" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Scenario</label>
                                    <input class="form-control" type="text" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Progression</label>
                                    <input class="form-control" type="text" value="" disabled>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('instructor/lobby') }}" class="btn btn-primary mr-3">
                                    Back
                                </a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-6">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        setInterval(function() {
            $.ajax({
                url: "{{ route('lobby.getStatus', $id_report) }}",
                type: "GET",
                success: function(data) {
                    var tableBody = '';
                    data.forEach(function(view, index) {
                        tableBody += '<tr>';
                        tableBody += '<th>' + (index + 1) + '</th>';
                        tableBody += '<td>' + view.action + '</td>';
                        tableBody += '<td>' + view.time + '</td>';
                        tableBody += '<td>' + view.status + '</td>';
                        tableBody += '</tr>';
                    });
                    $('#table-body').html(tableBody);
                },
                error: function() {
                    console.log('Error fetching data');
                }
            });
        }, 5000); 
    </script>
@endsection

