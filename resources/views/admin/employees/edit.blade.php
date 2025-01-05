@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Edit employee info</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                                - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($employee->image)
                            <div class="mb-3">
                                <img src="{{ Storage::url($employee->image) }}" alt="Cover" class="img-thumbnail"
                                    style="max-width:200px;">
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name (and position after comma, optional)</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $employee->name) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
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
