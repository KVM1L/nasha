@extends('website.layouts.app')

@section('content')
    <div class="section padding-page-top padding-bottom over-hide background-dark-2">
        <div class="container">
            <div class="row">
                <div class="col-12 section-title-wrap text-center parallax-fade-top">
                    <p>{{ __('get in touch') }}</p>
                    <h1>{{ __('always ready to work') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-bottom-big over-hide background-dark-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 ajax-form">
                    <input class="cursor-link" name="name" type="text" placeholder="{{ __('Your Name: *') }}" autocomplete="off" />
                </div>
                <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                    <input class="cursor-link" name="email" type="text" placeholder="{{ __('E-Mail: *') }}" autocomplete="off" />
                </div>
                <div class="section clearfix"></div>
                <div class="col-md-8 mt-4 ajax-form">
                    <textarea class="cursor-link" name="message" placeholder="{{ __('Tell Us Everything') }}"></textarea>
                </div>
                <div class="section clearfix"></div>
                <div class="col-md-8 mt-4 ajax-checkbox">
                    <ul class="list">
                        <li class="list__item">
                            <label class="label--checkbox cursor-link">
                                <input type="checkbox" class="checkbox">
                                {{ __('collect my details') }}
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="section clearfix"></div>
                <div class="col-md-8 mt-4 ajax-form text-center">
                    <button class="send_message cursor-link" id="send" data-lang="en"><span>{{ __('submit') }}</span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom-big over-hide">
        <div class="parallax" style="background-image: url('{{ Storage::url($settings['map_image'] ?? '') }}')"></div>
        <div class="dark-over-pages"></div>

        <div class="section z-bigger">
            <div class="container z-bigger">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <h5>{{ $settings['address'] ?? '' }}</h5>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-7 mt-5 text-center" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <a href="{{ $settings['google_maps_url'] ?? '#' }}" class="contact-link cursor-link" target="_blank">
                            {{ __('find us on map') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom-big over-hide background-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <a href="mailto:{{ $settings['email'] ?? '' }}" class="cursor-link">
                        <div class="project-link-wrap on-contact">
                            <p>{{ $settings['email'] ?? '' }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('website.includes.footer')
@endsection
