<!-- Nav and Logo
================================================== -->

<header class="cd-header">
    <div class="header-wrapper">
        <div class="logo-wrap">
            <a href="{{ route('website.home') }}" class="cursor-link animsition-link">
                <img src="{{ asset('img/logo.png') }}" style="height:40px" alt="">
            </a>
        </div>
        <div class="nav-container">
            <div class="language-switcher">
                <span class="current-language">{{ strtoupper(app()->getLocale()) }}</span>
                <div class="language-options">
                    @foreach (config('app.available_locales') as $locale)
                        @if ($locale !== app()->getLocale())
                            <a href="{{ route('set.language', $locale) }}">{{ strtoupper($locale) }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="nav-but-wrap">
                <div class="menu-icon cursor-link">
                    <span class="menu-icon__line menu-icon__line-left"></span>
                    <span class="menu-icon__line"></span>
                    <span class="menu-icon__line menu-icon__line-right"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .header-wrapper {
        display: flex;
        align-items: center;
        padding: 10px 20px;
    }

    .logo-wrap a {
        display: inline-block;
    }

    .nav-container {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-left: auto;
    }

    .language-switcher {
        position: relative;
        margin-top: 30px;
        margin-right: 20px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
    }

    .language-options {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 999;
    }

    .language-options a {
        display: block;
        padding: 5px 10px;
        text-decoration: none;
        color: #000;
        transition: background 0.3s ease;
    }

    .language-options a:hover {
        background: #f0f0f0;
    }

    .language-switcher:hover .language-options {
        display: block;
    }
</style>

<div class="nav">
    <div class="nav__content">
        <ul class="nav__list">
            <li class="nav__list-item">
                <a href="{{ route('website.home') }}"
                    class="cursor-link animsition-link {{ request()->routeIs('website.home') ? 'active' : '' }}">
                    {{ __('Home') }}
                </a>
            </li>
            <li class="nav__list-item">
                <a href="{{ route('website.about') }}"
                    class="cursor-link animsition-link {{ request()->routeIs('website.about') ? 'active' : '' }}">
                    {{ __('About us') }}
                </a>
            </li>
            <li class="nav__list-item">
                <a href="{{ route('website.contact') }}"
                    class="cursor-link animsition-link {{ request()->routeIs('website.contact') ? 'active' : '' }}">
                    {{ __('Contacts') }}
                </a>
            </li>
        </ul>
    </div>
</div>
