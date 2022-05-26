<?php
error_reporting(E_ALL);

define('BASEURL', (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . preg_replace('@/+$@', '', trim(dirname($_SERVER['SCRIPT_NAME']), '\\')));
