<?php

namespace App\Providers;

use App\Contracts\{ISaiSaiPayRepo, IWavePayRepo, IKpayRepo, PaymentOption};
use App\Repositories\{KbzPayRepository, SaiSaiPayRepository, WavePayRepository};
use Illuminate\Support\ServiceProvider;
use App\Services\PaymentOptions\{KbzPay, SaiSaiPay, WavePay};

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
        $this->app->bind(
            ISaiSaiPayRepo::class,
            SaiSaiPayRepository::class
        );
        $this->app->bind(PaymentOption::class, function ($app) {
            if (request()->input('payment_type') == 'kpay') {
                return $app->make(KbzPay::class);
            } elseif (request()->input('payment_type') == 'wavepay') {
                return $app->make(WavePay::class);
            } elseif (request()->input('payment_type') == 'saisaipay') {
                return $app->make(SaiSaiPay::class);
            } else {
                throw new \Exception('Invalid payment type.');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
