<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Fetch the user from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo "<script>
                    alert('Sign-in successful!');
                    window.location.href = 'home.html';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid password.');
                    window.location.href = 'error.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('User not found.');
                window.location.href = 'error.html';
              </script>";
    }
}
?>
