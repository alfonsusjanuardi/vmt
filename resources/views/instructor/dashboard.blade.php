@extends('instructor.master')

@section('content')
    @include('instructor.header')

    @include('instructor.sidebar', ['userId' => $userID, 'name' => $name, 'username' => $username])
    <style>
        .card-rounded{
            border-radius: 20px !important;
        }
    </style>
    <div class="content-wrapper" style="background-image: url('images/halaman_menu.jpg'); background-size: 100% 100%">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- ./col -->
                    @if($userID == 2)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success card-rounded">
                                <div class="inner">
                                <h3>{{ $countScenario }}</h3>
                
                                <p>Scenario</p>
                                </div>
                                <a href="{{ route('instructor.scenarios') }}" class="small-box-footer" style="border-radius: 0px 0px 20px 20px !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary card-rounded">
                                <div class="inner">
                                <h3>{{ $countUser }}</h3>
                
                                <p>Users</p>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer" style="border-radius: 0px 0px 20px 20px !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info card-rounded">
                            <div class="inner">
                            <h3>{{ $countPenilaian }}</h3>
            
                            <p>Evaluation</p>
                            </div>
                            <a href="{{ route('instructor.testingvmt') }}" class="small-box-footer" style="border-radius: 0px 0px 20px 20px !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning card-rounded">
                            <div class="inner">
                                <h3>{{ $countJoinUser }}</h3>
            
                            <p>Online Users</p>
                            </div>
                            <a href="{{ route('lobby.index') }}" class="small-box-footer" style="border-radius: 0px 0px 20px 20px !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    {{-- <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success card-rounded">
                            <div class="inner">
                            <h3>{{ $countExercise }}</h3>
            
                            <p>Exercise</p>
                            </div>
                            <a href="{{ route('instructor.exercises') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}
                    {{-- <!-- ./col -->
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning card-rounded">
                        <div class="inner">
                        <h3>{{ $countConsole }}</h3>
        
                        <p>Consoles</p>
                        </div>
                        <a href="{{ route('instructor.consoles') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger card-rounded">
                            <div class="inner">
                            <h3>{{ $countReport }}</h3>
            
                            <p>Practice Mode Reports</p>
                            </div>
                            <a href="{{ route('instructor.practice_mode_reports') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col --> --}}
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
            <div class="login-logo position-fixed" style="bottom: 5%; right: -14%; z-index: 10;">
                <img src="{{ asset('images/Tulisan.png') }}" alt="Logo" style="max-width: 50%;">
            </div>
    </div>
	<!-- /.content-wrapper -->
@endsection