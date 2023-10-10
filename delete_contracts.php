<?php
require('includes/connection.php');

// API endpoint for deleting contracts
if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    parse_str(file_get_contents("php://input"), $_DELETE);
}
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_DELETE['contract_id'])) {
    $contract_id = $_DELETE['contract_id'];

    $query = "DELETE FROM Contracts WHERE contract_id=$contract_id";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('message' => 'Contract deleted successfully'));
    } else {
        echo json_encode(array('error' => 'Contract deletion failed'));
    }
}
