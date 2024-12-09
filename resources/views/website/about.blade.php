@extends('website.layouts.app')

@section('content')
    {{-- <div class="section padding-page-top padding-bottom over-hide background-dark-2">
        <div class="container">
            <div class="row">
                <div class="col-12 section-title-wrap text-center parallax-fade-top">
                    <p>{{ __('design studio') }}</p>
                    <h1>{{ __('we build great brands') }}</h1>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="section padding-bottom over-hide background-dark-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-5">
                    <!-- Видео о нас -->
                    <div class="video-section">
                        @if (!empty($settings['about_video']))
                            <div class="video-wrapper">
                                <figure class="vimeo">
                                    <video width="100%" height="500" controls>
                                        <source src="{{ Storage::url($settings['about_video']) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </figure>
                            </div>
                        @else
                            <p class="text-center text-white">{{ __('Video is not available.') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-8 text-center">
                    <p class="mb-0 pb-0 lead">{{ $settings['about_description'][app()->getLocale()] ?? '' }}</p>
                </div>

                <div class="section clearfix"></div>

                <div class="col-md-6 padding-top-bottom">
                    @if (!empty($settings['about_photo_1']))
                        <div class="img-wrap">
                            <img src="{{ Storage::url($settings['about_photo_1']) }}" alt="Photo 1">
                        </div>
                    @endif
                </div>
                <div class="col-md-6 padding-top-bottom">
                    @if (!empty($settings['about_photo_2']))
                        <div class="img-wrap">
                            <img src="{{ Storage::url($settings['about_photo_2']) }}" alt="Photo 2">
                        </div>
                    @endif
                </div>

                <!-- 4 блока -->
                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-md-4 text-center mt-5" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <h5 class="mb-3">{{ $settings['blocks'][$i]['title'][app()->getLocale()] ?? '' }}</h5>
                        <p class="mb-0 pb-0">{{ $settings['blocks'][$i]['text'][app()->getLocale()] ?? '' }}</p>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom over-hide background-dark-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                    <p class="mb-0 pb-0 lead-q"><em>"{{ $settings['quote'][app()->getLocale()] ?? '' }}"</em></p>
                    <h6 class="mt-5">{{ $settings['quote_author'][app()->getLocale()] ?? '' }}</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom-big over-hide background-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <a href="{{ route('website.contact') }}" class="cursor-link animsition-link">
                        <div class="project-link-wrap">
                            <p>{{ __('let\'s talk') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-to-top cursor-link"></div>

    @include('website.includes.footer')
@endsection
