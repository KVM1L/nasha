@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title mb-5">Sponsors</h2>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h5>Add new</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                                - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.sponsors.store') }}" method="POST" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name (optional)</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="url" class="form-label">URL (optional)</label>
                                <input type="text" name="url" id="url" class="form-control"
                                    value="{{ old('url') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control" accept="image/*"
                                    required>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                        </div>
                    </form>

                    <hr class="my-4">

                    <h5>Existing Sponsor Logos</h5>
                    @if ($sponsors->count())
                        <div class="row">
                            @foreach ($sponsors as $sponsor)
                                <div class="col-md-3 mt-3 position-relative">
                                    <div class="border p-2 text-center position-relative">
                                        {{-- Отображаем логотип --}}
                                        <img src="{{ Storage::url($sponsor->logo) }}" alt="Sponsor Logo"
                                            style="max-width: 100%; max-height: 150px; object-fit: contain;">
                                        <p class="mt-2 mb-0">
                                            <strong>{{ $sponsor->name }}</strong>
                                        </p>
                                        <p class="mb-2">
                                            {{ $sponsor->url }}
                                        </p>

                                        <div class="position-absolute top-0 end-0 mt-1 me-1">
                                            <a href="{{ route('admin.sponsors.edit', $sponsor->id) }}">
                                                <button type="button" class="btn btn-secondary">Edit</button>
                                            </a>
                                            <a href="{{ route('admin.sponsors.destroy', $sponsor->id) }}" class="delete">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No sponsor logos added yet.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.delete-modal')

@endsection
