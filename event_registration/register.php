<?php
// Database connection
$servername = "localhost";
$username = "root";       // Replace with your MySQL username
$password = "";           // Replace with your MySQL password
$dbname = "event_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $event = $_POST["event"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO registrations (name, email, phone, event) VALUES ('$name', '$email', '$phone', '$event')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
