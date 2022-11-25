<?php
// Monitoring cumulative query time
/*
A common performance bottleneck of modern web applications is the amount of time they spend querying databases. Thankfully, Laravel can invoke a
closure or callback of your choice when it spends too much time querying the database during a single request. To get started, provide a query time 
threshold (in milliseconds) and closure to the whenQueryingForLongerThan method. You may invoke this method in the boot method of a service provider:
*/
 
namespace App\Providers;
 
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Events\QueryExecuted;
 
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
        DB::whenQueryingForLongerThan(500, function (Connection $connection, QueryExecuted $event) {
            // Notify development team...
        });
    }
}
