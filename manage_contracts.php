<?php
require('includes/connection.php');

// API endpoint for editing contracts
if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    parse_str(file_get_contents("php://input"), $_PUT);
}
if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_PUT['contract_id']) && isset($_PUT['contract_text']) && isset($_PUT['number_of_workers_required'])) {
    $contract_id = $_PUT['contract_id'];
    $contract_text = $_PUT['contract_text'];
    $number_of_workers_required = $_PUT['number_of_workers_required'];

    $query = "UPDATE Contracts SET contract_text='$contract_text', number_of_workers_required=$number_of_workers_required WHERE contract_id=$contract_id";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('message' => 'Contract updated successfully'));
    } else {
        echo json_encode(array('error' => 'Contract update failed'));
    }
}else{
    echo json_encode(array('error' => 'Contract update failed - no data provided'));
}
