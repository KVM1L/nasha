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

                <style>
                    .video-container {
                        position: relative;
                        padding-top: 56.25%;
                        width: 100%;
                        overflow: hidden;
                    }

                    .video-container video {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }

                    .video-container-mobile {
                        position: relative;
                        padding-top: 177.78%;
                        width: 100%;
                        overflow: hidden;
                    }

                    .video-container-mobile video {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                </style>

                <!-- Весь контейнер для видео -->
                <div class="col-md-12" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                    <div class="video-section">
                        {{-- <div class="video-wrapper"> --}}

                        <figure class="@if ($project->video_mobile) d-none d-md-block @endif" id="figure-desktop"
                            style="text-align: center;">
                            <div class="video-container">
                                <video id="video-desktop" preload="metadata" controls>
                                    <source src="{{ Storage::url($project->video) }}" type="video/mp4" />
                                </video>
                            </div>
                        </figure>

                        @if ($project->video_mobile)
                            <figure class="d-block d-md-none" id="figure-mobile">
                                <div class="video-container-mobile">
                                    <video id="video-mobile" preload="metadata" controls playsinline>
                                        <source src="{{ Storage::url($project->video_mobile) }}" type="video/mp4">
                                    </video>
                                </div>
                            </figure>
                        @endif

                        {{-- </div> --}}
                    </div>
                </div>

                <!-- Текст -->
                @if ($project->getTranslation('text', app()->getLocale()))
                    <div class="col-md-8 padding-top-bottom"
                        data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <p class="mb-0 pb-0 lead">
                            {!! nl2br(e($project->getTranslation('text', app()->getLocale()))) !!}
                        </p>
                    </div>
                @endif

                <div class="section clearfix"></div>

                <!-- 2 фотографии -->
                <div class="col-md-6 mt-4" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                    @if ($project->photo_1 && $project->video_1)
                        <a href="javascript:;" class="cursor-link" data-fancybox="video"
                            data-src="{{ Storage::url($project->video_1) }}">
                            <div class="img-wrap">
                                <img src="{{ Storage::url($project->photo_1) }}" class="cursor-more" alt="photo_1">
                            </div>
                        </a>
                    @endif
                </div>

                <div class="col-md-6 mt-4" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                    @if ($project->photo_2 && $project->video_2)
                        <a href="javascript:;" class="cursor-link" data-fancybox="video"
                            data-src="{{ Storage::url($project->video_2) }}">
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
                        <div class="three-columns-text lead">
                            {!! nl2br(e($project->getTranslation('description', app()->getLocale()))) !!}
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

@section('js')
    <script>
        $(document).ready(function() {
            $("[data-fancybox='video']").fancybox({
                type: "iframe",
                iframe: {
                    preload: false
                }
            });
        });
    </script>
@endsection
