<?php 
require_once 'vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load('.env');

$database = new PDO("mysql:host=$_ENV[DB_HOST];dbname=$_ENV[DB_NAME]", "$_ENV[DB_USER]", "$_ENV[DB_PASS]");