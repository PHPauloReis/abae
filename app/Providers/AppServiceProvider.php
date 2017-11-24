<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('greater_than', function($attribute, $value, $params, $validator){
            $other = Request::get($params[0]);
            return intval($value) > intval($other);
        });

        Validator::extend('greater_or_equals_than', function($attribute, $value, $params, $validator){
            $other = Request::get($params[0]);
            return intval($value) >= intval($other);
        });

        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('pt_BR');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
