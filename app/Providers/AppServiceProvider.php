<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    public function register() {

    } // end register

    

    // --------------------------------------


    public function boot() {
        
        view()->composer('*',function($view) {
            $view->with('rowCount', 15);
        });

    } // end function

} // end controller
