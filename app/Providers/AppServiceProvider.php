<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
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
        Blueprint::macro('userstamps', function () {
            $this
                ->foreignId('admin_created_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            $this
                ->foreignId('admin_updated_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');
        });
    }
}
