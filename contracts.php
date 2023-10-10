<?php
require('includes/connection.php');

// API endpoint for listing contracts
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM Contracts";
    $result = mysqli_query($conn, $query);
    $contracts = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $contracts[] = $row;
    }

    echo json_encode($contracts);
}
