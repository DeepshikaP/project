<?php 
$host = 'localhost'; 
$user = 'root'; // Default XAMPP MySQL user 
$password = ''; // Default XAMPP MySQL password 
$dbname = 'user_management'; 
$conn = new mysqli($host, $user, $password, $dbname); 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
?> 
