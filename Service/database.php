<?php
$database = "localhost";
$username = "root";
$password = "";
$database_name = "login_php";

$db = new mysqli($database, $username, $password, $database_name);

if($db->connect_error){
    die();
}
?>