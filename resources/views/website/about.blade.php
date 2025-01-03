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

    <div class="section padding-bottom over-hide background-dark-2">
        <div class="container">
            <div class="row justify-content-center">

                <!-- Весь контейнер для видео -->
                <div class="col-md-12" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s"
                    style="margin-top:150px">
                    @if (!empty($aboutSettings['about_video']))
                        <div class="video-section">
                            <figure style="text-align: center;">
                                <div class="video-container">
                                    <video controls preload="metadata" controls autoplay muted>
                                        <source src="{{ Storage::url($aboutSettings['about_video']) }}" type="video/mp4" />
                                    </video>
                                </div>
                            </figure>
                        </div>
                    @endif
                </div>

                <div class="col-md-8 text-center mt-5">
                    <p class="mb-0 pb-0 lead">{!! $aboutSettings['about_description'][app()->getLocale()] ?? '' !!}</p>
                </div>

                <div class="section clearfix"></div>

                <div class="col-md-6 padding-top-bottom">
                    @if (!empty($aboutSettings['about_photo_1']))
                        <div class="img-wrap">
                            <img src="{{ Storage::url($aboutSettings['about_photo_1']) }}" alt="Photo 1">
                        </div>
                    @endif
                </div>
                <div class="col-md-6 padding-top-bottom">
                    @if (!empty($aboutSettings['about_photo_2']))
                        <div class="img-wrap">
                            <img src="{{ Storage::url($aboutSettings['about_photo_2']) }}" alt="Photo 2">
                        </div>
                    @endif
                </div>

                <!-- 4 блока -->
                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-md-4 text-center mt-5" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <h5 class="mb-3">{{ $aboutSettings['blocks'][$i]['title'][app()->getLocale()] ?? '' }}</h5>
                        <p class="mb-0 pb-0">{{ $aboutSettings['blocks'][$i]['text'][app()->getLocale()] ?? '' }}</p>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    @if ($sponsors->count())
        <div class="section">
            <div class="container">
                <h5 class="text-center my-5">{{ __('Special thanks') }}</h5>
                <div class="owl-carousel owl-theme pb-5">
                    @foreach ($sponsors as $sponsor)
                        <div class="item">
                            <a href="{{ $sponsor->url ?? '#' }}" target="_blank" rel="noopener">
                                <img src="{{ Storage::url($sponsor->logo) }}" alt="{{ $sponsor->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($clients->count())
        <div class="section">
            <div class="container">
                <h5 class="text-center my-5">{{ __('They trust us') }}</h5>
                <div class="owl-carousel owl-theme mb-5">
                    @foreach ($clients as $client)
                        <div class="item">
                            <a href="{{ $client->url ?? '#' }}" target="_blank" rel="noopener">
                                <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="section padding-top-bottom over-hide background-dark-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                    <p class="mb-0 pb-0 lead-q"><em>"{{ $aboutSettings['quote'][app()->getLocale()] ?? '' }}"</em></p>
                    <h6 class="mt-5">{{ $aboutSettings['quote_author'][app()->getLocale()] ?? '' }}</h6>
                </div>
            </div>
        </div>
    </div>

    @if ($employees->count())
        <div class="section">
            <div class="container">
                <h5 class="text-center my-5">{{ __('Our Members') }}</h5>
                <div class="row g-4">
                    @foreach ($employees as $employee)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card gallery-item mb-5">
                                <img src="{{ Storage::url($employee->image) }}" class="card-img-top m-3"
                                    style="width: initial" alt="{{ $employee->name }}">
                                <div class="card-body text-center">
                                    <h6 style="color: #000">{{ $employee->name }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 2
                    },
                    768: {
                        items: 4
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        });
    </script>
@endsection
