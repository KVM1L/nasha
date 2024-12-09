@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">

            <a href="{{ route('admin.projects.index') }}">
                <button type="button" class="btn btn-secondary mt-3 mb-3">
                    < Back to Projects</button>
            </a>

            <div class="card mb-3">
                <div class="card-body">

                    <h4 class="card-title mb-0">Edit project</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $error)
                                - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.projects.update', $project->id) }}" method="post" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach (config('app.available_locales') as $label)
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            id="nav-{{ $label }}-tab" data-coreui-toggle="tab"
                                            data-coreui-target="#nav-{{ $label }}" type="button" role="tab"
                                            aria-controls="nav-{{ $label }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ strtoupper($label) }}</button>
                                    @endforeach
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                @foreach (config('app.available_locales') as $label)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                        id="nav-{{ $label }}" role="tabpanel"
                                        aria-labelledby="nav-{{ $label }}-tab" tabindex="0">
                                        <div class="col-md-12 mt-3">
                                            <label for="title_{{ $label }}" class="form-label">Title
                                                ({{ strtoupper($label) }})*</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="title[{{ $label }}]"
                                                    id="title_{{ $label }}" class="form-control"
                                                    value="{{ old('title.' . $label, $project->getTranslation('title', $label)) }}"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="tags_{{ $label }}" class="form-label">Tags
                                                ({{ strtoupper($label) }})</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="tags[{{ $label }}]"
                                                    id="tags_{{ $label }}" class="form-control"
                                                    value="{{ old('tags.' . $label, $project->getTranslation('tags', $label)) }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="text_{{ $label }}" class="form-label">Text
                                                ({{ strtoupper($label) }})</label>
                                            <div class="input-group mb-3">
                                                <textarea name="text[{{ $label }}]" id="text_{{ $label }}" rows="3" class="form-control">{{ old('text.' . $label, $project->getTranslation('text', $label)) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="description_{{ $label }}" class="form-label">Description
                                                ({{ strtoupper($label) }})*</label>
                                            <div class="input-group mb-3">
                                                <textarea name="description[{{ $label }}]" id="description_{{ $label }}" rows="3"
                                                    class="form-control" required>{{ old('description.' . $label, $project->getTranslation('description', $label)) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-12">
                                <label for="slug" class="form-label">Slug*</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="slug" id="slug"
                                        class="form-control"
                                        value="{{ old('slug', $project->slug) }}" required>
                                </div>
                            </div>

                            {{-- Cover --}}
                            <div class="col-md-12">
                                <label for="cover" class="form-label">Cover Image</label>
                                @if ($project->cover)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($project->cover) }}" alt="Cover" class="img-thumbnail"
                                            style="max-width:200px;">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="cover" id="cover" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>

                            {{-- Video --}}
                            <div class="col-md-12">
                                <label for="video" class="form-label">Video File</label>
                                @if ($project->video)
                                    <div class="mb-3">
                                        <video width="320" height="240" controls>
                                            <source src="{{ Storage::url($project->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="video" id="video" class="form-control"
                                        accept="video/mp4,video/mov,video/avi,video/mkv">
                                </div>
                            </div>

                            {{-- Photo 1 --}}
                            <div class="col-md-6">
                                <label for="photo_1" class="form-label">Photo 1</label>
                                @if ($project->photo_1)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($project->photo_1) }}" alt="Photo 1"
                                            class="img-thumbnail" style="max-width:200px;">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="photo_1" id="photo_1" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>

                            {{-- Photo 2 --}}
                            <div class="col-md-6">
                                <label for="photo_2" class="form-label">Photo 2</label>
                                @if ($project->photo_2)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($project->photo_2) }}" alt="Photo 2"
                                            class="img-thumbnail" style="max-width:200px;">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="photo_2" id="photo_2" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>

                            {{-- Footer Photo --}}
                            <div class="col-md-12">
                                <label for="footer_photo" class="form-label">Footer Photo</label>
                                @if ($project->footer_photo)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($project->footer_photo) }}" alt="Footer Photo"
                                            class="img-thumbnail" style="max-width:200px;">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="footer_photo" id="footer_photo" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-dark btn-lg mt-3 mb-3">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
