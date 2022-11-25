<?php
 // Listening for query events
/*
If you would like to specify a closure that is invoked for each SQL query executed by your application, you may use the DB facade's listen method. 
This method can be useful for logging queries or debugging. You may register your query listener closure in the boot method of a service provider:
*/
namespace App\Providers;
 
use Illuminate\Support\Facades\DB;
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
        DB::listen(function ($query) {
            // $query->sql;
            // $query->bindings;
            // $query->time;
        });
    }
}

