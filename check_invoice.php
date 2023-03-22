<?php
session_start();
include('connect.php');

if(isset($_POST['invoice']))
{
    $invoice = $_POST['invoice'];
    $invoice = filter_var($invoice, FILTER_SANITIZE_STRING);


    $verify_sql = "SELECT invoice FROM customer WHERE invoice = :invoice";
    $verify_stmt = $conn->prepare($verify_sql);
    $verify_stmt->bindparam(':invoice', $invoice);
    $verify_stmt->execute();
    $fetch = $verify_stmt->fetch(PDO::FETCH_ASSOC);

    if($fetch && $fetch['invoice']== $invoice)
    {
        // $_SESSION['error'] = "Invoice # is already exist";
       // $error = "Invoice # is already exist";
       echo 'Invoice # is already exist';
        
    }
    else
    {
        if(isset($_POST['save']))
        {
        $invoice = $_POST['invoice'];
        $invoice = filter_var($invoice, FILTER_SANITIZE_STRING);
        $amount = $_POST['amount'];
        $amount = filter_var($amount, FILTER_SANITIZE_NUMBER_INT);
        $fullname = $_POST['fullname'];
        $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone = $_POST['phone'];
        $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);


        $verify_sql = "SELECT invoice FROM customer WHERE invoice = :invoice";
        $verify_stmt = $conn->prepare($verify_sql);
        $verify_stmt->bindparam(':invoice', $invoice);
        $verify_stmt->execute();
        $fetch = $verify_stmt->fetch(PDO::FETCH_ASSOC);

        if($fetch['invoice'] != $invoice)
        {
            $sql = "INSERT INTO `customer`(`invoice`, `amount`, `fullname`, `email`, `phone`) VALUES (:invoice, :amount, :fullname, :email, :phone)";

            $stmt = $conn->prepare($sql);
            $stmt->bindparam(':invoice', $invoice);
            $stmt->bindparam(':amount', $amount);
            $stmt->bindparam(':fullname', $fullname);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':phone', $phone);
            $stmt->execute();
            $session_invoice = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt)
            {
                $_SESSION['success'] = 'Customer successfully added!';
                $_SESSION['invoice'] = $invoice;
                header('location: customer_input.php');
                
            }
            else
            {
                echo '<script>
                alert("Failed to insert data");
                window.location = "customer_input.php";
                </script>';
            }
        }
        else
        {
            $_SESSION['error'] = "Invoice # is already exist";
        }
        }
        else
        {

        }
    }
    $conn =null;
}

?>