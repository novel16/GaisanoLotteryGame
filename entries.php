<?php
include('connect.php');

// get the invoice value from the AJAX request
$invoice = $_POST['invoice'];

$sql = "SELECT * FROM customer_entries WHERE customer_invoice = :invoice";

$stmt = $conn->prepare($sql);
$stmt->bindparam(':invoice', $invoice);
$stmt->execute();
$fetch = $stmt->fetch(PDO::FETCH_ASSOC);

$data = $fetch['total_entries'];

echo json_encode($data);







?>