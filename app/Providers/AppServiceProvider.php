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
        // Deteksi dari mana aplikasi sedang diakses
        if (request()->server('HTTP_HOST')) {
            $host = request()->server('HTTP_HOST');
            $scheme = request()->getScheme();
            $baseUrl = request()->getBaseUrl(); // Jika ada subfolder misal /suket/public

            // Buat Root URL menjadi Dinamis mengikuti IP yang sedang dipakai user
            \Illuminate\Support\Facades\URL::forceRootUrl($scheme . '://' . $host . $baseUrl);

            if ($scheme === 'https' || request()->server('HTTP_X_FORWARDED_PROTO') == 'https') {
                \Illuminate\Support\Facades\URL::forceScheme('https');
            }
        }
    }
}
