<?php 
$db_user = 'root';
$db_password = 'root';
$db_name = 'mrtv_db2022';
try{
	$db = new PDO("mysql:host=localhost;dbname=" . $db_name, $db_user, $db_password);
	$db->exec("set names utf8");
}
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
//set some db attribute
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);