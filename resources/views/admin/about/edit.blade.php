@extends('admin.layouts.app')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">

            <div class="card mb-3">
                <div class="card-body">

                    <h4 class="card-title mb-0">Edit "About Us" Information</h4>

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

                    <form action="{{ route('admin.settings.update') }}" method="post" class="mt-3"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Видео -->
                        <div class="col-md-12">
                            <label for="about_video" class="form-label">About Us Video</label>
                            @if (!empty($settings['about_video']))
                                <div class="mb-3">
                                    <video width="320" height="240" controls>
                                        <source src="{{ Storage::url($settings['about_video']) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                            <div class="input-group mb-3">
                                <input type="file" name="about_video" id="about_video" class="form-control"
                                    accept="video/*">
                            </div>
                        </div>

                        <!-- Табы для перевода -->
                        <nav>
                            <div class="nav nav-tabs" id="about-tabs" role="tablist">
                                @foreach (config('app.available_locales') as $locale)
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $locale }}"
                                        data-coreui-toggle="tab" data-coreui-target="#tab-content-{{ $locale }}"
                                        type="button" role="tab" aria-controls="tab-content-{{ $locale }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ strtoupper($locale) }}
                                    </button>
                                @endforeach
                            </div>
                        </nav>

                        <div class="tab-content" id="about-tab-content">
                            @foreach (config('app.available_locales') as $locale)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                    id="tab-content-{{ $locale }}" role="tabpanel"
                                    aria-labelledby="tab-{{ $locale }}">
                                    <!-- Описание -->
                                    <div class="col-md-12 mt-3">
                                        <label for="about_description_{{ $locale }}" class="form-label">Description
                                            ({{ strtoupper($locale) }})
                                        </label>
                                        <textarea name="about_description[{{ $locale }}]" id="about_description_{{ $locale }}" rows="3"
                                            class="form-control">{{ old('about_description.' . $locale, $settings['about_description'][$locale] ?? '') }}</textarea>
                                    </div>

                                    <div class="row">
                                        @for ($i = 1; $i <= 4; $i++)
                                            <div class="col-md-6 mt-3">
                                                <label for="block_{{ $i }}_title_{{ $locale }}"
                                                    class="form-label">Block {{ $i }} Title
                                                    ({{ strtoupper($locale) }})</label>
                                                <input type="text"
                                                    name="blocks[{{ $i }}][title][{{ $locale }}]"
                                                    id="block_{{ $i }}_title_{{ $locale }}"
                                                    class="form-control"
                                                    value="{{ old('blocks.' . $i . '.title.' . $locale, $settings['blocks'][$i]['title'][$locale] ?? '') }}">

                                                <label for="block_{{ $i }}_text_{{ $locale }}"
                                                    class="form-label mt-2">Block {{ $i }} Text
                                                    ({{ strtoupper($locale) }})</label>
                                                <textarea name="blocks[{{ $i }}][text][{{ $locale }}]"
                                                    id="block_{{ $i }}_text_{{ $locale }}" rows="2" class="form-control">{{ old('blocks.' . $i . '.text.' . $locale, $settings['blocks'][$i]['text'][$locale] ?? '') }}</textarea>
                                            </div>
                                        @endfor
                                    </div>

                                    <!-- Цитата -->
                                    <div class="col-md-12 mt-3">
                                        <label for="quote_{{ $locale }}" class="form-label">Quote
                                            ({{ strtoupper($locale) }})</label>
                                        <textarea name="quote[{{ $locale }}]" id="quote_{{ $locale }}" rows="3" class="form-control">{{ old('quote.' . $locale, $settings['quote'][$locale] ?? '') }}</textarea>
                                    </div>

                                    <!-- Имя автора цитаты -->
                                    <div class="col-md-12 mt-3">
                                        <label for="quote_author_{{ $locale }}" class="form-label">Quote Author
                                            ({{ strtoupper($locale) }})</label>
                                        <input type="text" name="quote_author[{{ $locale }}]"
                                            id="quote_author_{{ $locale }}" class="form-control"
                                            value="{{ old('quote_author.' . $locale, $settings['quote_author'][$locale] ?? '') }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Две фотографии -->
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <label for="about_photo_1" class="form-label">Photo 1</label>
                                @if (!empty($settings['about_photo_1']))
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($settings['about_photo_1']) }}" alt="Photo 1"
                                            class="img-thumbnail" style="max-width:200px;">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="about_photo_1" id="about_photo_1" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <label for="about_photo_2" class="form-label">Photo 2</label>
                                @if (!empty($settings['about_photo_2']))
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($settings['about_photo_2']) }}" alt="Photo 2"
                                            class="img-thumbnail" style="max-width:200px;">
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <input type="file" name="about_photo_2" id="about_photo_2" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-dark btn-lg mt-3 mb-3">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
