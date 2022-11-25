<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 
class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users where active = ?', [1]);
 
        return view('user.index', ['users' => $users]);
    }
}

/*
The first argument passed to the select method is the SQL query, while the second argument is any parameter bindings 
that need to be bound to the query. 
Typically, these are the values of the where clause constraints. Parameter binding provides protection against SQL injection.

The select method will always return an array of results. Each result within the array will be a PHP stdClass object
representing a record from the database:


*/
//loop through users array
$users = DB::select('select * from users');

foreach ($users as $user) {
    echo $user->name;
}

//scalar method

/*
Sometimes your database query may result in a single, scalar value. Instead of being required to retrieve 
the query's scalar result from a record object, Laravel allows you to retrieve this value directly using the scalar method:

*/



$burgers = DB::scalar(
    "select count(case when food = 'burger' then 1 end) as burgers from menu"
);

// named binding

/*

Instead of using ? to represent your parameter bindings, you may execute a query using named bindings:

*/

$results = DB::select('select * from users where id = :id', ['id' => 1]);

//Running an insert

/*

To execute an insert statement, you may use the insert method on the DB facade. Like select, this method accepts the SQL query as its first argument 
and bindings as its second argument:
*/

DB::insert('insert into users (id, name) values (?, ?)', [1, 'Marc']);
