<?php
// Include the database connection file
include("../connection.php");

$appoid = $_GET['appoid'];
$tech = $_GET['tech'];

// Check the payment status
$sql = "SELECT p.amount FROM payments p JOIN appointments a ON p.appoid = a.appoid AND a.technician = ? WHERE p.appoid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $tech, $appoid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row && $row['amount'] > 0) {
    echo 'paid';
} else {
    echo 'unpaid';
}

$stmt->close();
$conn->close();
?>