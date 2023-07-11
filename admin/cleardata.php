<?php
    include('../connect.php');

    $customer = "TRUNCATE table customer";
    $stmt_customer = $conn->prepare($customer);
    $stmt_customer->execute();

    $customer_entries = "TRUNCATE table customer_entries";
    $stmt_customer_entries = $conn->prepare($customer_entries);
    $stmt_customer_entries->execute();

    $customer_status = "TRUNCATE table customer_status";
    $stmt_status = $conn->prepare($customer_status);
    $stmt_status->execute();

    $lottery = "TRUNCATE table lottery";
    $stmt_lottery = $conn->prepare($lottery);
    $stmt_lottery->execute();


    header('location: home.php');

    
?>