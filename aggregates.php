use Illuminate\Support\Facades\DB;
 
$users = DB::table('users')->count();
 
$price = DB::table('orders')->max('price');
