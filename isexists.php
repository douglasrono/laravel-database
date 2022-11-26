if (DB::table('orders')->where('finalized', 1)->exists()) {
    // ...
}
 
if (DB::table('orders')->where('finalized', 1)->doesntExist()) {
    // ...
}
