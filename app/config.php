<?php
// Valid PHP Version?
$minPHPVersion = '8.1';
if (phpversion() < $minPHPVersion) {
  die("<p>Your PHP version must be {$minPHPVersion} or higher to run this app.</p>Current version: " . phpversion());
}
unset($minPHPVersion);


error_reporting(E_ALL);

const DB_HOST = 'localhost';        // server
const DB_USER = 'root';             // user
const DB_PASS = 'my-secret-pw';     //'my-secret-pw';     // password
const DB_NAME = 'scriptbrasil';     // database name

define('BASEURL', (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . preg_replace('@/+$@', '', trim(dirname($_SERVER['SCRIPT_NAME']), '\\')));

$Layout = 'default';
