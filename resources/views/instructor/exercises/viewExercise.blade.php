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
                        <h1>Update Scenario</h1>
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

        <section class="content">
            <div class="container-fluid">
                <div class="row" style="height: 100vh; overflow: hidden;">
                    <div class="col-12">
                        @include('flash-message')
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Set Environment</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('exercises.updateExerciseEnv') }}">
                                    @csrf
                                    <div class="form-row align-items-center">
                                        <div class="col-10 my-1">
                                            <label class="mr-sm-2 sr-only" for="pilihenv">Select Location :</label>
                                            <select class="form-select" name="selected_id_env">
                                                @foreach ($viewEnv as $viewenv)
                                                    <option value="{{ $viewenv->id_environtment }}"
                                                        {{ $viewenv->id_environtment == $viewenv->selected_id_env ? 'selected' : '' }}>
                                                        {{ $viewenv->nama_environtment }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="id_exercise" value="{{ $id_exercise }}">
                                        </div>
                                        <div class="col-2 my-1">
                                            <button class="btn btn-primary btn-block" type="submit">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-6" style="height: calc(100vh - 180px); overflow-y: auto;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Details Description</h3>
                            </div>
                            <div class="card-body">
                                @foreach ($viewExercise as $view)
                                    <form action="{{ route('exercises.updateExercise') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_exercise" value="{{ $view->id_exercise }}">
                                        <div class="form-group">
                                            <label for="project_name">Project Name</label>
                                            <input class="form-control" type="text" name="project_name" id="project_name"
                                                placeholder="Input Project Name" value="{{ $view->project_name }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input class="form-control" type="text" name="product_name" id="product_name"
                                                placeholder="Input Project Name" value="{{ $view->product_name }}"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="serial_number">PN/SN</label>
                                            <input class="form-control" type="text" name="serial_number" id="serial_number"
                                                placeholder="Input Project Name" value="{{ $view->serial_number }}"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="lisence_key">License Key</label>
                                            <input class="form-control" type="text" name="lisence_key" id="lisence_key"
                                                placeholder="Input Project Name" value="{{ $view->license_key }}"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10">{{ $view->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="sejarah_pemakaian">Sejarah Pemakaian</label>
                                            <textarea class="form-control" id="sejarah_pemakaian" name="sejarah_pemakaian" rows="10">{{ $view->sejarah_pemakaian }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="sejarah_produksi">Sejarah Produksi</label>
                                            <textarea class="form-control" id="sejarah_produksi" name="sejarah_produksi" rows="10">{{ $view->sejarah_produksi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="spesifikasi">Spesifikasi</label>
                                            <textarea class="form-control" id="spesifikasi" name="spesifikasi" rows="10">{{ $view->spesifikasi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="kinerja">Kinerja</label>
                                            <textarea class="form-control" id="kinerja" name="kinerja" rows="10">{{ $view->kinerja }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="persenjataan">Persenjataan</label>
                                            <textarea class="form-control" id="persenjataan" name="persenjataan" rows="10">{{ $view->persenjataan }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="media_type">media_type</label>
                                            <select class="form-control select2" name="media_type" style="width: 100%"
                                                onchange="updateMediaInput(this)">
                                                <option value="" disabled> Pilih tipe</option>
                                                <option value="Picture" @if ($view->media_type == 'Picture') selected @endif>
                                                    Picture</option>
                                                <option value="Video" @if ($view->media_type == 'Video') selected @endif>
                                                    Video</option>
                                                {{-- <option value="Youtube" @if ($view->media_type == 'Youtube') selected @endif>Youtube</option> --}}
                                            </select>
                                        </div>
                                        <div class="form-group media-upload-group" style="display: none;">
                                            <label for="media_upload">Media Upload</label>
                                            <input type="file" class="form-control" name="media_upload">
                                        </div>
                                        <div class="form-group media-link-group" style="display: none;">
                                            <label for="media_link">Media Link</label>
                                            <input type="text" class="form-control" name="media_link"
                                                value="{{ $view->media_type == 'Youtube' ? $view->media_name : '' }}">
                                        </div>
                                        <div class="media">
                                            @if ($view->media_name)
                                                <div class="media-body">
                                                    <label for="media_preview">Media Preview</label>
                                                    <br>
                                                    @if ($view->media_type == 'Video')
                                                        <video class="img-fluid" style="max-height: 210px;" controls>
                                                            <source
                                                                src="{{ url(config('app.file_directory'). $view->media_name) }}"
                                                                type="video/mp4">
                                                            Browser tidak support video
                                                        </video>
                                                    @elseif ($view->media_type == 'Youtube')
                                                        <br><a href="{{ $view->media_name }}" target="_blank"
                                                            class="img-fluid">{{ $view->media_name }}</a>
                                                    @elseif ($view->media_type == 'Picture')
                                                        <img class="img-fluid"
                                                            src="{{ url(config('app.file_directory'). $view->media_name) }}"
                                                            alt="Media Preview" style="max-height: 210px;">
                                                    @endif
                                                </div>
                                            @else
                                                <div class="media-body">
                                                    <label for="media_preview">Media Preview</label>
                                                    <br>
                                                    @if ($view->media_type == 'Video')
                                                        <video width="320" height="210" controls>
                                                            <source
                                                                src="{{ Storage::url('media_upload/default_image.jpg') }}"
                                                                type="video/mp4">
                                                            Browser tidak support video
                                                        </video>
                                                    @elseif ($view->media_type == 'Youtube')
                                                        <br><a href="{{ $view->media_name }}"
                                                            target="_blank">{{ $view->media_name }}</a>
                                                    @elseif ($view->media_type == 'Picture')
                                                        <img src="{{ Storage::url('media_upload/default_image.jpg') }}"
                                                            alt="Media Preview" width="320" height="210">
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        <hr>
                                        <div class="form-group float-right">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-6" style="height: calc(100vh - 180px); overflow-y: auto;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Parts Name</h3>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('exercises.updateactionExercise') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_exercise"
                                        value="{{ $listScenarioAction->first()->id_exercise }}">
                                    @foreach ($listScenarioAction as $list)
                                        <div class="row">
                                            @if ($list->media_name)
                                                <div class="col-sm-6">
                                                    <label for="media_preview">Media Preview</label>
                                                    @if ($list->type == 'Video')
                                                        <video style="max-height: 210px;" controls>
                                                            <source
                                                                src="{{ url(config('app.file_directory') . $list->media_name) }}"
                                                                type="video/mp4">
                                                            Browser tidak support video
                                                        </video>
                                                    @elseif ($list->type == 'Youtube')
                                                        <br><a href="{{ $list->media_name }}"
                                                            target="_blank">{{ $list->media_name }}</a>
                                                    @elseif ($list->type == 'Picture')
                                                        <img class="img-fluid"
                                                            src="{{ url(config('app.file_directory') . $list->media_name) }}"
                                                            alt="Media Preview" style="max-height: 210px;">
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-sm-6">
                                                    <label for="media_preview">Media Preview</label>
                                                    @if ($list->type == 'Video')
                                                        <video width="320" height="210" controls>
                                                            <source
                                                                src="{{ Storage::url('media_upload/default_image.jpg') }}"
                                                                type="video/mp4">
                                                            Browser tidak support video
                                                        </video>
                                                    @elseif ($list->type == 'Youtube')
                                                        <br><a href="{{ $list->media_name }}"
                                                            target="_blank">{{ $list->media_name }}</a>
                                                    @elseif ($list->type == 'Picture')
                                                        <img class="img-fluid"
                                                            src="{{ Storage::url('media_upload/default_image.jpg') }}"
                                                            alt="Media Preview" style="max-height: 210px;">
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="actions_name">Action Name</label>
                                                    <input type="text" class="form-control"
                                                        name="actions[{{ $loop->index }}][actions_name]"
                                                        value="{{ $list->actions_name }}" disabled>
                                                    <input type="hidden" name="actions[{{ $loop->index }}][id]"
                                                        value="{{ $list->id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <select class="form-control select2"
                                                        name="actions[{{ $loop->index }}][type]" style="width: 100%"
                                                        onchange="updateMediaInput(this, {{ $loop->index }})">
                                                        <option value="" disabled> Pilih tipe</option>
                                                        <option value="Picture"
                                                            @if ($list->type == 'Picture') selected @endif>Picture
                                                        </option>
                                                        <option value="Video"
                                                            @if ($list->type == 'Video') selected @endif>Video
                                                        </option>
                                                        {{-- <option value="Youtube" @if ($list->type == 'Youtube') selected @endif>Youtube</option> --}}
                                                    </select>
                                                </div>
                                                <div class="form-group media-upload-group-{{ $loop->index }}"
                                                    style="display: none;">
                                                    <label for="media_upload">Media Upload</label>
                                                    <input type="file" class="form-control"
                                                        name="actions[{{ $loop->index }}][media_upload]">
                                                </div>
                                                <div class="form-group media-link-group-{{ $loop->index }}"
                                                    style="display: none;">
                                                    <label for="media_link">Media Link</label>
                                                    <input type="text" class="form-control"
                                                        name="actions[{{ $loop->index }}][media_link]"
                                                        value="{{ $list->type == 'Youtube' ? $list->media_name : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                    <div class="form-group float-right">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function updateMediaInput(selectElement, index = null) {
            var type = selectElement.value;
            var mediaUploadGroup = index !== null ? document.querySelector('.media-upload-group-' + index) : document
                .querySelector('.media-upload-group');
            var mediaLinkGroup = index !== null ? document.querySelector('.media-link-group-' + index) : document
                .querySelector('.media-link-group');

            if (type === 'Picture' || type === 'Video') {
                mediaUploadGroup.style.display = 'block';
                mediaLinkGroup.style.display = 'none';
            } else if (type === 'Youtube') {
                mediaUploadGroup.style.display = 'none';
                mediaLinkGroup.style.display = 'block';
            } else {
                mediaUploadGroup.style.display = 'none';
                mediaLinkGroup.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var selectElements = document.querySelectorAll('.select2');
            selectElements.forEach(function(selectElement, index) {
                selectElement.addEventListener('change', function() {
                    updateMediaInput(this, index);
                });
                updateMediaInput(selectElement, index);
            });
        });
    </script>
@endsection
