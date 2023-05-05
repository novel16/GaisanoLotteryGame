<?php
session_start();

if(!isset($_SESSION['user']) || trim($_SESSION['user'])== '')
{
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Game | Website</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="images/gaisano.png" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    

    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome/all.min.css">
    <script src="fontawesome/6fc1f0eac0.js"></script>
</head>
<body>

<?php include('nav-bar.php'); ?>

<div class="customer-content">
    <h2>Customer Input</h2>
    <span class="text-danger">Note : the amount needed to avail the lottery is atleast ₱1000 and up.</span>

    <div class="container-box">
        <form action="check_invoice.php" method = "POST">
            <div class="input-content">
                <div class="left-input">
                    <input type="text" name = "invoice" value ="<?php echo isset($_POST['invoice']) ? $_POST['invoice'] : ''; ?>" placeholder = "Enter your invoice no." onkeyup = "checkInvoice(this.value)" required>
                    <input type="text" id="amount" name = "amount"  placeholder = "Enter amount (₱1000) and up."  required>
                    
                    <input type="text" name = "fullname" placeholder ="Enter your fullname" required>
                </div>
                <div class="right-input">
                    <input type="text" name = "email" placeholder= "Enter your E-mail (Optional)">
                    <input type="text" name = "phone" maxlength = "11" placeholder = "Enter your phone no. (Optional)" id="phone">
                </div>  
            </div>
             <button id = "submit-btn" type = "submit" name ="save">Save</button>
             <span id = "invoice-error"></span>
            
        </form>
    </div>
    <!-- customer table -->
    <div class="customer-table">
        <h2>Customer</h2>
        
        <div class="table-container">
            <table class = "table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID NO.</th>
                        <th>Amount</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connect.php');

                    $sql = "SELECT * FROM customer ORDER BY date_created DESC LIMIT 10";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if($stmt->rowCount()>0)
                    {
                        while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                            ?>
        
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo date('F j, Y', strtotime($row['date_created'])); ?></td>
                                    
                                </tr>
                            <?php
                             }
                    }
                    else
                    {
                        echo '<div class ="no-record">No record found</div>';
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>

    </div>
    
</div>

        <?php
            if(isset($_SESSION['success'])){
                ?>
                    <div id="success-message" class="alert-msg">
                        <div class="icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="msg">
                            <span>Customer Added</span>
                            <p><?php echo $_SESSION['success']; ?></p>
                        </div>
                    </div>
                <script>
                    setTimeout(function() {
                        var successMessage = document.getElementById('success-message');
                        successMessage.style.right = '-110%';
                    }, 5000); // hide the success message after 5 seconds
                </script>

            <?php }
            unset($_SESSION['success']);
             ?>

            
        <?php   
            if(isset($_SESSION['user-success'])){
                ?>
                    <div id="success-message" class="alert-msg">
                        <div class="icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="msg">
                            <span>Login Successfully</span>
                            <p><?php echo $_SESSION['user-success']; ?></p>
                        </div>
                    </div>
                <script>
                    setTimeout(function() {
                        var successMessage = document.getElementById('success-message');
                        successMessage.style.right = '-110%';
                    }, 5000); // hide the success message after 5 seconds
                </script>

            <?php }
            unset($_SESSION['user-success']);
        ?>


    <div class="footer">
        <p>© Created by <span>Gaisano corp. programmers </span> | all right reserved.</p>
    </div>
    

    <script src="js/sweetalert/sweetalert2@11.js"></script>

        
    <script>
    document.getElementById("phone").addEventListener("input", function (event) {
    if (!/^[0-9]+$/.test(event.target.value)) {
        event.target.value = event.target.value.slice(0, -1);
    }
    });
    document.getElementById("amount").addEventListener("input", function (event) {
    if (!/^[0-9]+(\.[0-9]*)?$/.test(event.target.value)) {
        event.target.value = event.target.value.slice(0, -1);
    }
    });
    </script>


    <script>
        function checkInvoice(invoice) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var errorMessage = this.responseText;
                    document.getElementById("invoice-error").innerHTML = errorMessage;
                    var submitButton = document.getElementById("submit-btn");
                    if (errorMessage.trim()) {
                        submitButton.disabled = true;
                        
                    } else {
                        submitButton.disabled = false;
                    }
                }
                
            };
            xhttp.open("POST", "check_invoice.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("invoice=" + invoice);
        }
    </script>

    
</body>
</html>