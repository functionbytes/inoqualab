<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Configuration;
use App\Models\Service;
use App\Models\Section;
use App\Models\System;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer("*",function($view){
            $view->with("settings", $this->configuration());
        }); 
        
        view()->composer("*",function($view){
            $view->with("allservices", $this->allservices());
        });

        view()->composer("*",function($view){
            $view->with("allsections", $this->allsections());
        });
        view()->composer("*",function($view){
            $view->with("allsystems", $this->allsystems());
        });


    }

    public function allservices()
    {
        return Service::available()->get();
    }


    public function configuration()
    {
        return Configuration::first();
    }

    public function allsystems()
    {
        return System::get();
    }

    public function allsections()
    {
        return Section::get();
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


}
