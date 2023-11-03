<?php
require('includes/connection.php');

// API endpoint for listing contracts
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $query = "SELECT * FROM Contracts WHERE user_id=$user_id";
    }elseif(isset($_GET['contract_id'])){
        $contract_id = $_GET['contract_id'];
        $query = "SELECT * FROM Contracts WHERE contract_id=$contract_id";
    }else {
        $query = "SELECT * FROM Contracts";
    }
    $result = mysqli_query($conn, $query);
    $contracts = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $contracts[] = $row;
    }

    echo json_encode($contracts);
}
