<?php

namespace Laravel\LinkShortener;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\LinkShortener\Services\LinkShortenerService;

class LinkShortenerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(LinkShortenerService::class, function ($app) {
            return new LinkShortenerService();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom($this->basePath('routes/web.php'));
        $this->loadMigrationsFrom($this->basePath('database/migrations'));
        $this->publishAssets();
        $this->loadViewsFrom($this->basePath('resources/views'), 'link-shortener');

        Paginator::defaultView('link-shortener::pagination');

    }

    protected function basePath($path = ""): string
    {
        return __DIR__ . "/../" . $path;
    }
    public function publishAssets()
    {
        $this->publishes([
            $this->basePath('public/js/link-shortener.js') => public_path('vendor/link-shortener/js/link-shortener.js'),
            $this->basePath('public/css/link-shortener.css') => public_path('vendor/link-shortener/css/link-shortener.css'),
            $this->basePath('public/css/link-shortener-analysis.css') => public_path('vendor/link-shortener/css/link-shortener-analysis.css'),
        ], 'laravel/link-shortener');
    }
}
