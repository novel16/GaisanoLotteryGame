<?php include('includes/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Game | Website</title>
    <!-- <link rel="stylesheet" href="../css/datatable.css"> -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>
<body>
    
    <?php include('includes/sidebar.php'); ?>


    <!-- main -->
    <section id="interface">
       
    <?php include('includes/navbar.php'); ?>

        <h3 class="i-name">
            Customer
        </h3>

        <!-- <div class="dash-home">
        <i class="fa-solid fa-gauge"></i><a href="#">Home</a>
            <span>></span>
            <span>Lottery result</span>
        </div> -->
        
        <div class="table-container" id="table-container">
            <form action="" method = "GET">
                <div class="date-picker">
                    <div class="date-box">
                        <input type="search" id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"  placeholder = "Search">
                        <button type = "submit" name = "btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    </form>
                
                    <div class="date-box">
                    <form action="" method = "GET">
                        <input type="date" id="from" name="from" value="<?php echo isset($_GET['from']) ? $_GET['from'] : ''; ?>">
                    </div>
                    <span>-</span>
                    <div class="date-box">
                        <input type="date" id="to" name="to" value="<?php echo isset($_GET['to']) ? $_GET['to'] : ''; ?>">
                    </div>
                    <button class="btn-date" type= "submit" name = "submit" >Apply</button>
                </div>
            </form>
            
            <!-- <a href="#" class= "btn btn-success"><i class="fa-solid fa-circle-plus me-1"></i>New</a> -->
            <hr>
            <table class = "table table-bordered table-striped" id = "mydatatable">
                <thead>
                    <tr>
                        <th>Invoice #</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <!-- <th>Prize</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../connect.php');

                    if(isset($_GET['from']) && isset($_GET['to'])){
                    
                    $from = $_GET['from'];
                    $to = $_GET['to'];

                    $sql = "SELECT * FROM customer WHERE date_created BETWEEN :from AND :to ORDER BY date_created DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindparam(':from', $from);
                    $stmt->bindparam(':to', $to);
                    $stmt->execute();

                    if($stmt->rowCount()>0)
                    {
                        while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                            ?>
        
                                <tr>
                                    <td><?php echo $row['invoice']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    
                                </tr>
        
                            <?php
                             }
                    }
                    else
                    {
                        echo '<div class ="no-record">No record found</div>';
                    }
                    }

                     if(isset($_GET['search']))
                    {
                        $search = $_GET['search'];

                        if($search != "")
                        {
                            $sql = "SELECT * FROM customer WHERE CONCAT(invoice, fullname, email) LIKE '%$search%'";
                            $stmt = $conn->prepare($sql);
                            // $stmt->bindparam(':search', $search);
                            $stmt->execute();

                            if($stmt->rowCount()>0)
                            {
                                while($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
                                    ?>
                
                                        <tr>
                                            <td><?php echo $row['invoice']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            
                                        </tr>
                
                                    <?php
                                    }
                            }
                            else
                            {
                                echo '<div class ="no-record">No record found</div>';
                            }
                        }

                        
                    }
                    else
                    {
                        
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>


    </section>


    <!-- <script>
        function searchCustomer() {
        var search = document.getElementById("search").value;

        if(search != "") {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    //document.getElementById("result").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "customer.php?search=" + search, true);
            xmlhttp.send();
        }
        }
    </script> -->

   

     <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>                   
     <script type="text/javascript">
            $(document).ready(function() {
            $('#mydatatable').DataTable();
            });
     </script>

    <!-- <?php include('includes/script.php'); ?> -->
</body>
</html>