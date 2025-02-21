<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sex = trim($_POST['sex']);

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (username, email, gender, password) VALUES ('$username', '$email', '$sex', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Sign-up successful!');
                window.location.href = 'home.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
