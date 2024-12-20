@extends('website.layouts.app')

@section('pageTitle', $project->getTranslation('title', app()->getLocale()))

@section('content')
    <div class="section big-55-height over-hide">
        <div class="parallax parallax-top" style="background-image: url('{{ Storage::url($project->cover) }}')"></div>
        <div class="dark-over-pages"></div>
        <div class="hero-center-section">
            <div class="container z-bigger">
                <div class="row">
                    <div class="col-12 section-title-wrap text-center parallax-fade-top-pages">
                        <p>{{ $project->getTranslation('tags', app()->getLocale()) }}</p>
                        <h1>{{ $project->getTranslation('title', app()->getLocale()) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom-big over-hide background-dark-2">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Видео проекта со звуком, кликабельное -->
                <div class="col-md-12" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s"
                    data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                    <div class="video-section">
                        @if ($project->video)
                            <div class="video-wrapper">
                                <figure class="vimeo">
                                    <iframe src="{{ Storage::url($project->video) }}" width="500" height="281" frameborder="0"
                                        allow="autoplay; fullscreen; picture-in-picture" allowfullscreen>
                                    </iframe>
                                </figure>
                            </div>
                        @else
                            <p class="text-center text-white">Video not available.</p>
                        @endif
                    </div>
                </div>

                <!-- Текст -->
                @if ($project->getTranslation('text', app()->getLocale()))
                    <div class="col-md-8 padding-top-bottom text-center"
                        data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <p class="mb-0 pb-0 lead">
                            {!! $project->getTranslation('text', app()->getLocale()) !!}
                        </p>
                    </div>
                @endif

                <div class="section clearfix"></div>

                <!-- 2 фотографии -->
                <div class="col-md-6 mt-4" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                    @if ($project->photo_1)
                        <a href="{{ Storage::url($project->photo_1) }}" class="cursor-link" data-fancybox="gallery">
                            <div class="img-wrap">
                                <img src="{{ Storage::url($project->photo_1) }}" class="cursor-more" alt="photo_1">
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6 mt-4" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                    @if ($project->photo_2)
                        <a href="{{ Storage::url($project->photo_2) }}" class="cursor-link" data-fancybox="gallery">
                            <div class="img-wrap">
                                <img src="{{ Storage::url($project->photo_2) }}" class="cursor-more" alt="photo_2">
                            </div>
                        </a>
                    @endif
                </div>

                <div class="section clearfix padding-top"></div>

                <!-- 3 колонки текста (description) -->
                @if ($project->getTranslation('description', app()->getLocale()))
                    <div class="col-md-12" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <div class="three-columns-text text-white text-center lead">
                            {!! $project->getTranslation('description', app()->getLocale()) !!}
                        </div>
                    </div>
                @endif

                <div class="section clearfix padding-bottom"></div>
            </div>
        </div>

        <!-- широкое фото (footer_photo) -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                @if ($project->footer_photo)
                    <div class="col-md-12" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <div class="img-wrap">
                            <img src="{{ Storage::url($project->footer_photo) }}" alt="footer_photo">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('website.includes.footer')
@endsection
