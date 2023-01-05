<?php
$servername = "localhost";
$username = "osama";
$password = "0000";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn) {
   // echo "Connection successfully";
} else {
    die(mysqli_errno($conn));
}
