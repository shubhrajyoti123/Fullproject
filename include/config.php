<?php
$server_name = 'localhost';
$database_name = 'college';
$user_name = 'root';
$password = '';

$pdo =  new PDO("mysql:host=$server_name;dbname=$database_name", $user_name, $password, array(
    	PDO::ATTR_PERSISTENT => false
));
?>