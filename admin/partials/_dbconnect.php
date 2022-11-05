<?php
$server = "remotemysql.com";
$username = "5OjmcHoZpi";
$password = "mW3wIutkab";
$database = "5OjmcHoZpi";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}

?>
