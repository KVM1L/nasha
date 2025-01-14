@extends('website.layouts.app')

@section('pageTitle', 'Home')

@section('content')
    <div class="section full-height over-hide background-dark-2">
        {{-- <div class="case-study-name-title">case studies</div> --}}

        <ul class="case-study-wrapper">
            @foreach ($projects as $project)
                <li class="case-study-name">
                    <span style="max-width: 70%">{{ $project->getTranslation('title', app()->getLocale()) }}</span>
                    <a href="{{ route('website.project', $project->slug) }}"
                        class="cursor-link animsition-link">{{ __('explore') }}</a>
                </li>
            @endforeach
        </ul>

        <ul class="case-study-images">
            @foreach ($projects as $index => $project)
                <li>
                    <div class="img-hero-background" style="background-image: url('{{ Storage::url($project->cover) }}');">
                    </div>
                    <div class="dark-over-hero"></div>
                    <div class="hero-number-back">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="hero-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="hero-number-fixed">{{ str_pad($projects->count(), 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="case-study-title">
                        {{ $project->getTranslation('tags', app()->getLocale()) }}
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="social-wrap">
            {{ __('follow us') }}
            <ul>
                @foreach ($socialLinks as $platform => $url)
                    @if (!empty($url))
                        <li><a href="{{ $url }}" class="cursor-link" target="_blank">{{ $platform }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection
