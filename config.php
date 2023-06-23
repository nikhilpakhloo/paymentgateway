<?php
$server = 'localhost';
$username = 'nikhilpakhloo';
$password = 'root';
$database ='shopping';
// Create connection
$conn = new mysqli($server, $username,$password, $database);
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
    }
    // echo "Connected successfully;
   




?>