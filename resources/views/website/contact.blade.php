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
            @if ($errors->any())
                <div class="alert alert-danger mb-5">
                    @foreach ($errors->all() as $error)
                        - {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            @if (session('success'))
                <div class="text-center mb-5">
                    <h5>{{ session('success') }}</h5>
                </div>
            @endif
            <form action="{{ route('website.contact.post') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-4 ajax-form">
                        <input class="cursor-link" name="name" type="text" placeholder="{{ __('Your Name: *') }}"
                            autocomplete="off" />
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                        <input class="cursor-link" name="email" type="text" placeholder="{{ __('E-Mail: *') }}"
                            autocomplete="off" />
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-4 ajax-form">
                        <textarea class="cursor-link" name="message" placeholder="{{ __('Tell Us Everything') }}"></textarea>
                    </div>
                    <div class="section clearfix mb-3"></div>
                    {!! NoCaptcha::display() !!}
                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-4 ajax-form text-center">
                        <button class="send_message cursor-link" id="send"
                            data-lang="en"><span>{{ __('submit') }}</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="section padding-top-bottom-big over-hide">
        <div class="parallax" style="background-image: url('{{ Storage::url($contactsSettings['map_image'] ?? '') }}')">
        </div>
        <div class="dark-over-pages"></div>

        <div class="section z-bigger">
            <div class="container z-bigger">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <h5>{{ $contactsSettings['address'] ?? '' }}</h5>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-7 mt-5 text-center" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.2s">
                        <a href="{{ $contactsSettings['google_maps_url'] ?? '#' }}" class="contact-link cursor-link"
                            target="_blank">
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
                    <a href="mailto:{{ $contactsSettings['email'] ?? '' }}" class="cursor-link">
                        <div class="project-link-wrap on-contact">
                            <p>{{ $contactsSettings['email'] ?? '' }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('website.includes.footer')
@endsection
