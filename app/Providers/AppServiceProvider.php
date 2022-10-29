<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::share('sku_colors', [
            'hitam' => '#000000',
            'putih' => '#FFFFFF',
            'biru muda' => '#8AECFF',
            'biru navy' => '#27445C',
            'merah' => '#A10000',
            'kuning' => '#FFF04D',
            'hijau' => '#007A39',
            'abu-abu' => '#8C8A84',
            'merah maroon' => '#862633',
            'coklat' => '#623412'
        ]);
    }
}
