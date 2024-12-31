@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Edit sponsor info</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                                - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.sponsors.update', $sponsor->id) }}" method="POST" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($sponsor->logo)
                            <div class="mb-3">
                                <img src="{{ Storage::url($sponsor->logo) }}" alt="Cover" class="img-thumbnail"
                                    style="max-width:200px;">
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name (optional)</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $sponsor->name) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="url" class="form-label">URL (optional)</label>
                                <input type="text" name="url" id="url" class="form-control"
                                    value="{{ old('url', $sponsor->url) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.delete-modal')

@endsection
