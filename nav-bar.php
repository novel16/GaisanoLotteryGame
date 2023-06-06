<?php
include('connect.php');
       $sql1 = "SELECT * FROM store";  
       $stmt1 = $conn->prepare($sql1);
       $stmt1->execute();
       
       $fetch_branch = $stmt1->fetch(PDO::FETCH_ASSOC);
        
?>

<div class="navbar fixed-top">
    <div class="logo">
        <img src="images/gaisano.png" alt="">
            <h2 style="text-transform:capitalize;">
                GCAP SLOTS - <?php echo $fetch_branch['branch'] ?>
            </h2>   
    </div>
    <nav>
        <ul>
            <li><a href="customer_input.php">Customer Input</a></li>
            <li><a href="index.php">Gcap Slot</a></li>
            <li><a href="user_logout.php">Logout</a></li>
        </ul>
    </nav>
</div>



<script src="js/sweetalert/sweetalert2@11.js"></script>