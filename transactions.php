## Database Transactions

/*
  You may use the transaction method provided by the DB facade to run a set of operations within a database transaction. If an exception is 
  thrown within the transaction closure, the transaction will automatically be rolled back and the exception is re-thrown. If the closure executes 
  successfully, the transaction will automatically be committed. You don't need to worry about manually rolling back or committing while 
  using the transaction method:
*/

use Illuminate\Support\Facades\DB;
 
DB::transaction(function () {
    DB::update('update users set votes = 1');
 
    DB::delete('delete from posts');
});
