<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "travel_world";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Connection Failed");
}

?>