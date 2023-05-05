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


    if($verify_stmt->rowCount() > 0) {
       
       echo 'Invoice # is already exist';
        
    }
    else
    {
        if(isset($_POST['save']))
        {
        
                // $invoice = $_POST['invoice'];
                // $invoice = filter_var($invoice, FILTER_SANITIZE_STRING);
                $amount = floatval($_POST['amount']);
                // $amount = filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT);
                $fullname = $_POST['fullname'];
                $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
                $email = $_POST['email'];
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $phone = $_POST['phone'];
                $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

                
                if($amount >= 1000)
                {
                    $amount_per_entry = 1000;
                    $total_entry = 0;
                    
                    $total_entry = floor($amount / $amount_per_entry);

                    $sql_entry = "INSERT INTO `customer_entries`(`customer_invoice`, `num_of_entries`, `total_entries`) VALUES (:customer_invoice, :num_of_entries, :total_entries)";

                    $entry_stmt = $conn->prepare($sql_entry);
                    $entry_stmt->bindParam(':customer_invoice',$invoice);
                    $entry_stmt->bindParam(':num_of_entries',$total_entry);
                    $entry_stmt->bindParam(':total_entries',$total_entry);
                    $entry_stmt->execute();


                    $sql = "INSERT INTO `customer`(`invoice`, `amount`, `fullname`, `email`, `phone`) VALUES (:invoice, :amount, :fullname, :email, :phone)";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindparam(':invoice', $invoice);
                    $stmt->bindparam(':amount', $amount);
                    $stmt->bindparam(':fullname', $fullname);
                    $stmt->bindparam(':email', $email);
                    $stmt->bindparam(':phone', $phone);
                    $stmt->execute();

                    

                    if($stmt)
                    {
                        $_SESSION['success'] = 'Customer successfully added!';
                       // $_SESSION['invoice'] = $invoice;
                        $_SESSION['fullname'] = $fullname;

                       

                        $customer_status_sql = "INSERT INTO `customer_status`(`customer_invoice`) VALUES (:customer_invoice)";
                        $customer_status_stmt = $conn->prepare($customer_status_sql);
                        $customer_status_stmt->bindParam(':customer_invoice', $invoice);
                        $customer_status_stmt->execute();
                        

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
                   
                    echo '<script>
                    alert("Invalid Amount | The amount should be atleast ₱1000.00 and up.");
                    window.location = "customer_input.php";
                    </script>';
                    
                }
        }
        else
        {

        }
    }
    $conn =null;
}

?>