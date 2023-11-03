<?php
require('includes/connection.php');

// API endpoint for creating contracts
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_POST['contract_text']) && isset($_POST['number_of_workers_required'])) {
    $user_id = $_POST['user_id'];
    $contract_text = $_POST['contract_text'];
    $number_of_workers_required = $_POST['number_of_workers_required'];
    $domain = $_POST['domain'];

    $query = "INSERT INTO Contracts (user_id, contract_text, number_of_workers_required, domain) VALUES ('$user_id', '$contract_text', '$number_of_workers_required', '$domain' )";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('message' => 'Contract created successfully'));
    } else {
        echo json_encode(array('error' => 'Contract creation failed'));
    }
}
