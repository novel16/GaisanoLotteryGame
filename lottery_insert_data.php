<?php
include('connect.php');
session_start();

//$invoice = isset($_SESSION['invoice']) ? $_SESSION['invoice'] : null;

// if($invoice)
// {
    // do something with $invoice
    $invoice = $_SESSION['invoice'];
    $one = $_POST['one'];
    $two = $_POST['two'];
    $three = $_POST['three'];
    $input_one = $_POST['input_one'];
    $input_two = $_POST['input_two'];
    $input_three = $_POST['input_three'];

    $status = "";
    $prizes = "";

    if(preg_match('/^[0-9]+$/', $input_one) && preg_match('/^[0-9]+$/', $input_two) && preg_match('/^[0-9]+$/', $input_three))
    {
        if($one === $input_one && $two === $input_two && $three === $input_three)
        {
            $status = "Grand Prize";
            $prizes = "Grand Prize";
        }
        else if($one === $input_one && $two === $input_two)
        {
            $status = "Win";
            $prizes = "Consolation-2";
        }
        else if($one === $input_one && $three === $input_three)
        {
            $status = "Win";
            $prizes = "Consolation-2";
        }
        else if($two === $input_two && $three === $input_three)
        {
            $status = "Win";
            $prizes = "Consolation-2";
        }
        else if($one === $input_one || $two === $input_two || $three === $input_three)
        {
            $status = "Win";
            $prizes = "Consolation-1";
        }
        else
        {
            $status = "Lose";
        }
        $sql = "INSERT INTO `lottery`(`c_invoice`, `lottery_a`, `lottery_b`, `lottery_c`, `result_a`, `result_b`, `result_c`,`status`, `prize`) VALUES (:invoice,:input_one,:input_two,:input_three, :result_a, :result_b, :result_c,:status,:prize)";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(':invoice', $invoice);
        $stmt->bindparam(':input_one',$input_one);
        $stmt->bindparam(':input_two',$input_two);
        $stmt->bindparam(':input_three',$input_three);
        $stmt->bindparam(':result_a',$one);
        $stmt->bindparam(':result_b',$two);
        $stmt->bindparam(':result_c',$three);
        $stmt->bindparam(':status',$status);
        $stmt->bindparam(':prize',$prizes);
        $stmt->execute();

        if($stmt)
        {
            echo '200';
            header('location:index.php');
        }
    }
    else
    {
        echo '<script>
            alert("Invalid input");
        </script>';
        // header('location:index.php?error=invalidinput');
    }
// }
// else
// {
   
//     echo '<script>
//           alert("Please enter customer data to play lottery game!");
//        </script>';
// }




?>






