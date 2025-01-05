@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title mb-5">Employees</h2>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h5>Add new</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                            resources/views/admin/employees/edit.blade.php resources/views/admin/employees/index.blade.php    - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.employees.store') }}" method="POST" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name (and position after comma, optional)</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                    required>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                        </div>
                    </form>

                    <hr class="my-4">

                    <h5>Existing Employees</h5>
                    @if ($employees->count())
                        <div class="row">
                            @foreach ($employees as $employee)
                                <div class="col-md-3 mt-3 position-relative">
                                    <div class="border p-2 text-center position-relative">
                                        {{-- Отображаем логотип --}}
                                        <img src="{{ Storage::url($employee->image) }}" alt="Employee Image"
                                            style="max-width: 100%; max-height: 150px; object-fit: contain;">
                                        <p class="mt-2 mb-0">
                                            <strong>{{ $employee->name }}</strong>
                                        </p>
                                        <p class="mb-2">
                                            {{ $employee->url }}
                                        </p>

                                        <div class="position-absolute top-0 end-0 mt-1 me-1">
                                            <a href="{{ route('admin.employees.edit', $employee->id) }}">
                                                <button type="button" class="btn btn-secondary">Edit</button>
                                            </a>
                                            <a href="{{ route('admin.employees.destroy', $employee->id) }}" class="delete">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No employee images added yet.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.delete-modal')

@endsection
