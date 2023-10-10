<?php
require('includes/connection.php');

// API endpoint for accepting contracts
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contract_id']) && isset($_POST['worker_id'])) {
    $contract_id = $_POST['contract_id'];
    $worker_id = $_POST['worker_id'];

    $query = "INSERT INTO AcceptedContracts (contract_id, worker_id) VALUES ($contract_id, $worker_id)";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('message' => 'Contract accepted successfully'));
    } else {
        echo json_encode(array('error' => 'Contract acceptance failed'));
    }
}
if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    parse_str(file_get_contents("php://input"), $_DELETE);
}
// API endpoint for unaccepting contracts
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_DELETE['acceptance_id'])) {
    $acceptance_id = $_DELETE['acceptance_id'];

    $query = "DELETE FROM AcceptedContracts WHERE acceptance_id=$acceptance_id";

    if (mysqli_query($conn, $query)) {
        echo json_encode(array('message' => 'Contract unaccepted successfully'));
    } else {
        echo json_encode(array('error' => 'Contract unacceptance failed'));
    }
}
