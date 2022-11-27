use Illuminate\Support\Facades\DB;
 
DB::transaction(function () {
    DB::update('update users set votes = 1');
 
    DB::delete('delete from posts');
});
