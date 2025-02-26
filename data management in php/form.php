<?php
// Database Configuration
$server_name = "localhost";
$database_name = "user_management";
$username = "root";
$password = "";

// Establish connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle CRUD actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create' || $action === 'update') {
        // Data from form for Create/Update
        $username = $_POST['username'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $password =$_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $locality = $_POST['locality'];

        if ($action === 'create') {
            // CREATE Operation
            $query = "INSERT INTO users (Username, DOB, Gender, password, Phone, Email, Locality)
                      VALUES ('$username', '$dob', '$gender', '$password', '$phone', '$email', '$locality')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('User created successfully');</script>";
            } else {
                echo "<script>alert('Error creating user: " . mysqli_error($conn) . "');</script>";
            }
        } elseif ($action === 'update') {
            // UPDATE Operation
            $query = "UPDATE users 
                      SET DOB='$dob', Gender='$gender', Password='$password', Phone='$phone', Email='$email', Locality='$locality' 
                      WHERE Username='$username'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('User updated successfully');</script>";
            } else {
                echo "<script>alert('Error updating user: " . mysqli_error($conn) . "');</script>";
            }
        }
    } elseif ($action === 'delete') {
        // DELETE Operation
        $username = $_POST['username'];

        $query = "DELETE FROM users WHERE Username='$username'";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('User deleted successfully');</script>";
        } else {
            echo "<script>alert('Error deleting user: " . mysqli_error($conn) . "');</script>";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';

    if ($action === 'read') {
        // READ Operation
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                echo "Username: " . $row['Username'] . "<br>";
                echo "DOB: " . $row['DOB'] . "<br>";
                echo "Gender: " . $row['Gender'] . "<br>";
                echo "Email: " . $row['Email'] . "<br>";
                echo "Locality: " . $row['Locality'] . "<br><hr>";
            }
        } else {
            echo "Error reading data: " . mysqli_error($conn);
        }
    }
}

// Close connection
mysqli_close($conn);
?>