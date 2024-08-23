<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
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
        // View::composer('*', function ($view) {
        //     $view->with('translations', $this->loadTranslations());
        // });

        Inertia::share([
            'translations' => fn() => $this->loadTranslations(),
        ]);
    }

    protected function loadTranslations()
    {
        $locale = App::getLocale();
        $langPath = resource_path("lang/{$locale}");

        $translations = [];

        foreach (File::allFiles($langPath) as $file) {
            $filename = pathinfo($file)['filename'];
            $translations[$filename] = require $file;
        }
        return $translations;
    }
}
