<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "OFD";

$server= "remotemysql.com";
$username = "5OjmcHoZpi";
$password = "IW2is90WJb";
$database = "5OjmcHoZpi";


$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}

?>
