<?php
$host="localhost";
$user="root";
$pass="root";
$database="school";
$conn= new mysqli($host,$user,$pass,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    // echo "Connected successfully";

// echo __DIR__.__FILE__;

?>