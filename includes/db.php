<?php

$db['db_host'] = 'localhost';
$db['db_admin'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'cms';

foreach($db as $key => $value){

    define(strtoupper($key),$value);

}


$connection = mysqli_connect(DB_HOST,DB_ADMIN,DB_PASS,DB_NAME);
















?>