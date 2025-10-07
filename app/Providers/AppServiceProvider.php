<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
      // 1. SOLUCIÓN: Establecer la longitud de string por defecto a 191
        // para evitar el error 42000 de MySQL con el juego de caracteres utf8mb4.
        Schema::defaultStringLength(191);
    }
}
