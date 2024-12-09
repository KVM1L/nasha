@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title mb-5">Projects list</h2>

                    <a href="{{ route('admin.projects.create') }}">
                        <button type="button" class="btn btn-secondary">Add new project</button>
                    </a>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%">ID</th>
                                <th scope="col" style="width: 55%">Name (EN)</th>
                                <th scope="col" style="width: 5%">Edit</th>
                                <th scope="col" style="width: 10%">Delete</th>
                                <th scope="col" style="width: 25%">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($projects->count())
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td>{{ $project->getTranslation('title', 'en') }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.edit', $project->id) }}">
                                                <button type="button" class="btn btn-secondary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.projects.destroy', $project->id) }}" class="delete">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                        <td>{{ $project->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No data available yet</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.delete-modal')

@endsection
