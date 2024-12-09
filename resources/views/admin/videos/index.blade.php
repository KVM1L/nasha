@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title mb-5">Videos</h2>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <h5>Add new</h5>

                    <form action="{{ route('admin.videos.store') }}" method="post" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="video" class="form-label">Video Embed URL</label>
                                <div class="input-group mb-2">
                                    <input type="url" name="video" id="video" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Cover Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" name="image" id="image" class="form-control"
                                        accept="images/*" required multiple>
                                </div>
                            </div>
                            <div class="col-md-1 mt-0">
                                <button type="submit" class="btn btn-dark mt-3 mb-3">Save</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-12 mb-3 mt-3">
                        <label class="form-label">
                            <h5>Existing Videos</h5>
                        </label>
                        <div class="row">
                            @if ($videos->count())
                                @foreach ($videos as $video)
                                    <div class="col-md-4 mt-2 position-relative">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="height: 300px;">
                                            <img src="{{ $video->getFirstMediaUrl('images') }}" alt="" style="width: 100%; height: 100%">
                                            <div class="position-absolute top-50 start-50 translate-middle">
                                                <a href="{{ route('admin.videos.destroy', $video->id) }}" class="delete">
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <span>No video files added yet.</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.delete-modal')

@endsection
