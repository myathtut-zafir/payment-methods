<?php

namespace App\Providers;

use App\Contracts\IKpayRepo;
use App\Contracts\IWavePayRepo;
use App\Repositories\KbzPayRepository;
use App\Repositories\WavePayRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IWavePayRepo::class,
            WavePayRepository::class
        );
        $this->app->bind(
            IKpayRepo::class,
            KbzPayRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
