<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "knjizara";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn){
    echo "Connection failed!";
    exit();
}

