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
