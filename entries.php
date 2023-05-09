<?php
include('connect.php');

// get the invoice value from the AJAX request
$invoice = $_POST['invoice'];

$sql = "SELECT * FROM customer_entries WHERE customer_invoice = :invoice";

$stmt = $conn->prepare($sql);
$stmt->bindparam(':invoice', $invoice);
$stmt->execute();
$fetch = $stmt->fetch(PDO::FETCH_ASSOC);


if($fetch['total_entries'] === 0 || $fetch['total_entries'] < 1)
{
    $customer_status_sql = "UPDATE `customer_status` SET `status`='Done' WHERE customer_invoice = :invoice";
    $customer_status_stmt = $conn->prepare($customer_status_sql);
    $customer_status_stmt->bindParam(':invoice', $invoice);
    $customer_status_stmt->execute();
}

$data = $fetch['total_entries'];

echo json_encode($data);







?>