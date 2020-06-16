<?php

namespace App\Providers;

use App\Condition;
use App\Configuration;
use App\Contact;
use App\Hotel;
use App\Pool;
use App\User;
use App\Observers\HotelObserver;
use App\Observers\ConditionObserver;
use App\Observers\ContactObserver;
use App\Observers\ConfigurationObserver;
use App\Observers\PoolObserver;
use App\Observers\RegimeObserver;
use App\Observers\RestaurantObserver;
use App\Observers\UserObserver;
use App\Regime;
use App\Restaurant;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        Hotel::observe(HotelObserver::class);
        Condition::observe(ConditionObserver::class);
        Configuration::observe(ConfigurationObserver::class);
        Contact::observe(ContactObserver::class);
        Pool::observe(PoolObserver::class);
        Restaurant::observe(RestaurantObserver::class);
        Regime::observe(RegimeObserver::class);
        User::observe(UserObserver::class);
        //JsonResource::withoutWrapping();
    }
}
