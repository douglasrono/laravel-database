// Handling Deadlock
/*
The transaction method accepts an optional second argument which defines the number of times a
transaction should be retried when a deadlock occurs. 
Once these attempts have been exhausted, an exception will be thrown:
use Illuminate\Support\Facades\DB;
 */
DB::transaction(function () {
    DB::update('update users set votes = 1');
 
    DB::delete('delete from posts');
});
