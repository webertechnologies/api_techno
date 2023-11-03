<?php
require('includes/connection.php');

// API endpoint for user registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role_id']) && isset($_POST['city'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $role_id = $_POST['role_id'];
    $city = $_POST['city'];
    $domain = $_POST['domain'];

    $query = "INSERT INTO `Users` (user_id, name, email, password, role_id, city, domain) VALUES (NULL, '$name', '$email', '$password', $role_id, '$city', '$domain')";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('message' => 'User registered successfully'));
    } else {
        echo json_encode(array('error' => 'User registration failed'));
    }
}
