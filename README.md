# laravel-database

## Introduction

<p>

Laravel makes interacting with databases extremely simple across a variety of supported databases using raw SQL,
a fluent query builder, and the Eloquent ORM. Currently, Laravel provides first-party support for five databases:

</p>

## configuration

<p>
The configuration for Laravel's database services is located in your application's <code> config/database.php </code> configuration file.

</p>
<p>
In this file, you may define all of your database connections, as well as specify which connection should be used by default. Most of the configuration options within this file are driven by the values of your application's environment variables. Examples for most of Laravel's supported database systems are provided in this file.

By default, Laravel's sample environment configuration is ready to use with Laravel Sail, which is a Docker configuration for developing Laravel applications on your local machine. However, you are free to modify your database configuration as needed for your local database.
</p>

## configuration of urls

<p>

Typically, database connections are configured using multiple configuration values such as host, database, username, password, etc. Each of these configuration values has its own corresponding environment variable. This means that when configuring your database connection information on a production server, you need to manage several environment variables.

Some managed database providers such as AWS and Heroku provide a single database "URL" that contains all of the connection information for the database in a single string. An example database URL may look something like the following:

</p>

<code> mysql://root:password@127.0.0.1/forge?charset=UTF-8 </code>

<h5>These URLs typically follow a standard schema convention:</h5>

<code> driver://username:password@host:port/database?options </code>

<p>
For convenience, Laravel supports these URLs as an alternative to configuring your database with multiple configuration options. If the url (or corresponding DATABASE_URL environment variable) configuration option is present, it will be used to extract the database connection and credential information.

</p>

## Read and Write connections
<p>
Sometimes you may wish to use one database connection for SELECT statements, and another for INSERT, UPDATE, and DELETE statements. Laravel makes this a breeze, and the proper connections will always be used whether you are using raw queries, the query builder, or the Eloquent ORM.

To see how read / write connections should be configured, let's look at this example:
</p>
<code>
<pre>

'mysql' => [
    'read' => [
        'host' => [
            '192.168.1.1',
            '196.168.1.2',
        ],
    ],
    'write' => [
        'host' => [
            '196.168.1.3',
        ],
    ],
    'sticky' => true,
    'driver' => 'mysql',
    'database' => 'database',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
],


</pre>
</code>

<p>

Note that three keys have been added to the configuration array: read, write and sticky. The read and write keys have array values containing a single key: host. The rest of the database options for the read and write connections will be merged from the main mysql configuration array.


</p>

<p>
You only need to place items in the read and write arrays if you wish to override the values from the main mysql array. So, in this case, 192.168.1.1 will be used as the host for the "read" connection, while 192.168.1.3 will be used for the "write" connection. The database credentials, prefix, character set, and all other options in the main mysql array will be shared across both connections. When multiple values exist in the host configuration array, a database host will be randomly chosen for each request.

</p>

## The sticky option

<p>

The sticky option is an optional value that can be used to allow the immediate reading of records that have been written to the database during the current request cycle. If the sticky option is enabled and a "write" operation has been performed against the database during the current request cycle, any further "read" operations will use the "write" connection. This ensures that any data written during the request cycle can be immediately read back from the database during that same request. It is up to you to decide if this is the desired behavior for your application.

</p>
