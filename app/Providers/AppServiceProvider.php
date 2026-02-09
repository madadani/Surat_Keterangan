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
        // Force URL root di server agar link & redirect tidak lari ke localhost
        $appUrl = config('app.url');
        if ($appUrl && $appUrl !== 'http://localhost') {
            \Illuminate\Support\Facades\URL::forceRootUrl($appUrl);

            if (str_starts_with($appUrl, 'https')) {
                \Illuminate\Support\Facades\URL::forceScheme('https');
            }

            // Fix Livewire update route for subdirectories on server
            \Livewire\Livewire::setUpdateRoute(function ($handle) {
                return \Illuminate\Support\Facades\Route::post('/livewire/message/{name}', $handle);
            });
        }
    }
}
