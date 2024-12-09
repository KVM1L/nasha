<?php

namespace App\Providers;

use App\Helpers\SocialLinksHelper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $locale = session('locale', config('app.locale'));
        app()->setLocale($locale);

        View::share('socialLinks', SocialLinksHelper::getSocialLinks());
    }
}
