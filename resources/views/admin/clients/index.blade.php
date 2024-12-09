@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title mb-5">Clients</h2>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h5>Add new</h5>

                    <form action="{{ route('admin.clients.store') }}" method="post" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="logos" class="form-label">Logos</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="logos[]" id="logos" class="form-control"
                                        accept="image/*" required multiple>
                                </div>
                            </div>
                            <div class="col-md-1 mt-0">
                                <button type="submit" class="btn btn-dark mt-3 mb-3">Save</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-12 mb-3 mt-3">
                        <label class="form-label">
                            <h5>Existing Client Logos</h5>
                        </label>
                        <div class="row">
                            @if ($clients->count())
                                @foreach ($clients as $client)
                                    <div class="col-md-3 mt-2 position-relative">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ Storage::url($client->logo) }}" alt=""
                                                style="max-width: 100%;">
                                            <div class="position-absolute top-50 start-50 translate-middle">
                                                <a href="{{ route('admin.clients.destroy', $client->id) }}" class="delete">
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <span>No client logo files added yet.</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.delete-modal')

@endsection
