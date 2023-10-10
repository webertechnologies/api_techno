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
            // get name, email , id and role_id
            $name = $row['name'];
            $email = $row['email'];
            $id = $row['user_id'];
            $role_id = $row['role_id'];
            $city = $row['city'];
            $data = array('name' => $name, 'email' => $email, 'id' => $id, 'role_id' => $role_id, 'city' => $city);
            echo json_encode(array('message' => 'Login successful', 'data' => $data));
        } else {
            echo json_encode(array('error' => 'Invalid password'));
        }
    } else {
        echo json_encode(array('error' => 'User not found'));
    }
}
