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
                            <li class="breadcrumb-item active">Penilaian</li>
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
                                <h3 class="card-title">Penilaian Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('flash-message')
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testingvmt as $item)
                                            <tr>
                                                <td>{{ $item->username }}</td>
                                                <td>
                                                    <a href="testingvmt/viewTestingVMT/{{ $item->username }}" class="btn btn-info btn-lg">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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