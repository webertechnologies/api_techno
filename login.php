<?php
require('includes/connection.php');

// API endpoint for user login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            echo json_encode(array('message' => 'Login successful'));
        } else {
            echo json_encode(array('error' => 'Invalid password'));
        }
    } else {
        echo json_encode(array('error' => 'User not found'));
    }
}
