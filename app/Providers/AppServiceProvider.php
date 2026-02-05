<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force URL root hanya di server (domain asli), jangan ganggu localhost
        $appUrl = config('app.url');
        if ($appUrl && !app()->environment('local')) {
            \Illuminate\Support\Facades\URL::forceRootUrl($appUrl);

            // Paksa scheme HTTPS jika APP_URL menggunakan https
            if (str_starts_with($appUrl, 'https')) {
                \Illuminate\Support\Facades\URL::forceScheme('https');
            }
        }
    }
}
